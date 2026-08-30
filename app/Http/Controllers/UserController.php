<?php

namespace App\Http\Controllers;

use App\Mail\UserForgotPassword;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\addQuiz;
use App\Models\Mcq;
use App\Models\UserDetails;
use App\Models\Records;
use App\Models\Mcqs_records;
use App\Models\Reset_Password;
use App\Models\User;
use App\Mail\UserVerification;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Pluck;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

class UserController extends Controller
{
    //
    public function welcome()
    {
        $categories = Categories::withCount('quizzes')->orderBy('quizzes_count', 'desc')->take(5)->get();
        return view('welcome', ['categories' => $categories]);
    }
    public function categoryPage()
    {
        $categories = Categories::withCount('quizzes')->orderBy('quizzes_count', 'desc')->paginate(4);
        return view('userCategoryPage', ['categories' => $categories]);
    }
    public function userQuizList($id, $category)
    {

        $userQuiz = addQuiz::withCount('mcq')->where('category_id', $id)->get();
        return view('UserQuizList', ['quiz' => $userQuiz, 'category' => $category]);
    }
    public function usersign(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|unique:usersdetails,useremail',
            'password' => 'required'
        ]);
        $user =   UserDetails::create([
            'username' => $request->username,
            'useremail' => $request->email,
            'userpassword' => Hash::make($request->password),
        ]);
        $token = Str::random(64);
        $user->token = $token;
        $user->save();
        $link = url('/userverification/' . $token);
        Mail::to($user->useremail)->send(new UserVerification($link, $user->useremail));
        if ($user) {

            // Ye ek line mein sab kuch kar degi → safe aur clean
            $url = Session::pull('quizsign', '/');
            // pull() = get + forget automatically
            // agar quizsign nahi mila to '/' pe jayega

            return redirect($url)->with('message', 'An verification email has been sent please check and then login');
        }
        return redirect('/')->with('message', 'An verification email has been sent please check and then login');
    }
    public function startquiz($id, $quizname)
    {
        $mcqs = Mcq::where('quiz_id', $id)->count();
        Session::put('quizid',$id);
        return view('StartQuiz', ['quiz_count' => $mcqs, 'name' => $quizname, 'quizid' => $id]);
    }
    public function userverify($token)
    {
        $user = UserDetails::where('token', $token)->first();
        if ($user) {
            $user->is_verified = 1;
            if ($user->save()) {
                return redirect('/');
            }
        }
    }
    public function logoutuser()
    {
        Session::forget('userdetails');
        return redirect('/');
    }
    public function SignFromQuiz()
    {
        Session::put('quizsign', url()->previous());
        return view('UserSignup');
    }
    public function showuserlogin()
    {
        return view('UserLogin');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $user = UserDetails::where('useremail', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->userpassword)) {
            return back()->with('error', 'invalid credentials');
        }
        if ($user) {
            Session::put('userdetails', $user);

            $url = Session::pull('quizsign', '/');

            return redirect($url)->with('message', 'Login successfull now you can attempt mcqs');
        }
        return redirect('/')->with('message', 'Login successfull now you can attempt mcqs');
    }
    public function LogFromQuiz()
    {
        Session::put('quizsign', url()->previous());
        return view('UserLogin');
    }
   public function usermcqs($id, $name)
{
    $userId = Session::get('userdetails')->id;
    $isExist = Session::get('quizid');

    if ($isExist) {
        // --- PEHLI BAAR ANE PAR RECORD BANAO ---
        $records = new Records();
        $records->user_id = $userId;
        $records->quiz_id = $id;
        $records->save();

        // Record ID ko session mein temporarily save kar lo taake refresh par kaam aaye
        Session::put('current_record_id', $records->id);
        Session::forget('quizid');
    } else {
        // --- REFRESH HONE PAR PURANA RECORD DHUNDO ---
        $recordId = Session::get('current_record_id');
        
        // Agar session mein ID hai to wahan se uthao, warna DB se latest uthao
        $records = Records::where('id', $recordId)
                          ->where('user_id', $userId)
                          ->first();

        // Agar phir bhi record na mile (Rare case), to error handle karo
        if (!$records) {
            return redirect()->back()->with('error', 'Session Expired');
        }
    }

    $mcqsData = [];
    $mcqsData['totalMcqs'] = Mcq::where('quiz_id', $id)->count();

    if ($mcqsData['totalMcqs'] > 0) {
        // Note: Yahan dobara $records->save() karne ki zaroorat nahi hai
        $mcqsData['currentMcqs'] = Mcq::where('quiz_id', $id)->first();
        $mcqsData['quizName'] = $name;
        $mcqsData['attemptmcq'] = 1;
        $mcqsData['recordid'] = $records->id; // Ab ye refresh par crash nahi hoga

        return view('UserMcqsUi', ['mcqsData' => $mcqsData]);
        Session::forget('current_record_id');
    }

    return view('errors.404');
}
    public function submitandnext(Request $request, $name, $id)
    {

        $currentMcqId = $request->input('mcqs_id');
        $attemptmcq = $request->input('attempt');
        $recordId = $request->recordid;
        $nextMcq = Mcq::where('quiz_id', $id)
            ->where('id', '>', $currentMcqId)->get()
            ->first();
        $ifMcqExists = Mcqs_records::where('record_id', $recordId)
            ->where('mcq_id', $currentMcqId)
            ->count();
        if ($ifMcqExists < 1) {
            $mcq_records = new Mcqs_records();
            $mcq_records->record_id = $request->recordid;
            $mcq_records->mcq_id = $request->mcqs_id;
            $mcq_records->selected_answer = $request->answer;
            if ($request->answer == Mcq::find($currentMcqId)->Correct_Answer) {
                $mcq_records->is_correct = 1;
            } else {
                $mcq_records->is_correct = 0;
            }
            if (!$mcq_records->save()) {
                return back()->with('error', 'Something Went Wrong');
            }
        }

        if ($nextMcq) {
            $mcqsData = [];
            $mcqsData['currentMcqs'] = $nextMcq;
            $mcqsData['quizName'] = $name;
            $mcqsData['quizId'] = $id;
            $mcqsData['attemptmcq'] = $attemptmcq + 1;
            $mcqsData['totalMcqs'] = Mcq::where('quiz_id', $id)->count();
            $mcqsData['recordid'] = $request->recordid;

            return view('UserMcqsUi', ['mcqsData' => $mcqsData]);
        } else {
            $record = Records::find($request->recordid);
            if ($record) {
                $record->status = 1;
                $record->update();
            }
            return redirect()->route('result', $request->recordid);
        }
    }
    public function viewResult($record_id)
    {
        $checkRecord = Mcqs_records::where('record_id', $record_id)->exists();

        if (!$checkRecord) {
            // Agar ID ghalat ho ya data na mile toh apna 404 page dikhayein
            return view('errors.404');
        }
        $resultData = [];
        $resultData['recordid'] = $record_id;
        $resultData['correctAns'] = Mcqs_records::where([
            ['record_id', '=', $record_id],
            ['is_correct', '=', 1]

        ])->count();
        $resultData['allquest'] = Mcqs_records::where([
            ['record_id', '=', $record_id]

        ])->count();
        $resultData['wrongAns'] = Mcqs_records::where([
            ['record_id', '=', $record_id],
            ['is_correct', '=', 0]

        ])->count();
        $resultData['result'] = Mcqs_records::WithMcqs()->where('record_id', $record_id)->get();
        Session::put('percentage',$resultData['correctAns']/$resultData['allquest']*100);
        return view('resultUi', ['allResults' => $resultData]);
    }
    public function quizdetails()
    {
        $recordsData = [];
        $quizRecords =  Records::WithQuiz()->where('user_id', Session::get('userdetails')->id)->get();
        $recordsData['totalAttempt'] =  Records::WithQuiz()->where('user_id', Session::get('userdetails')->id)->count();
        $recordsData['completed'] =  Records::WithQuiz()->where([
            ['user_id', Session::get('userdetails')->id],
            ['status', '=', 1]
        ])->count();
        $recordsData['incomplete'] =  Records::WithQuiz()->where([
            ['user_id', Session::get('userdetails')->id],
            ['status', '=', 0]
        ])->count();
        return view('UserQuizDetails', ['quizrecords' => $quizRecords, 'recordscount' => $recordsData]);
    }
    public function searchQuiz(Request $request)
    {
        $searchQuiz = addQuiz::withCount('mcq')->with('category')->where('quiz_name', 'Like', '%' . $request->input('query') . '%')->get();
        $searchcount = addQuiz::withCount('mcq')->where('quiz_name', 'Like', '%' . $request->input('query') . '%')->count();
        return view('searchQuiz', ['searchQuiz' => $searchQuiz, 'searchName' => $request->input('query'), 'searchResultCount' => $searchcount]);
    }
    public function forgotPassword(Request $request)
    {

        $user = UserDetails::where('useremail', $request->email)->first();
        if (!$user) {
            return redirect()->route('forgot', ['error' => 'email doesnot existts']);
        }
        $token = Str::random(64);
        Reset_Password::create([
            'email' => $request->email,
            'token' => $token,
        ]);
        $link = url('/user-forgot-password/' . $token);
        Mail::to($request->email)->send(new UserForgotPassword($link, $request->email));
        return redirect('/')->with('message', 'An Email Has been sent');
    }
    public function userforgot($token)
    {
        $email = Reset_Password::where('token', $token)->first();
        return view('reset-password-page', ['email' => $email->email]);
    }
    public function resetPassword(Request $request)
    {
        $user = UserDetails::where('useremail', $request->email)->first();
        if ($user) {
            $user->userpassword = Hash::make($request->password);
            if ($user->save()) {
                return redirect()->route('userlogin')->with('message', 'Your Password is changed now login!');
            } else {
                return  back()->with('error', 'there is an error try again with new link');
            }
        }
        return  back()->with('errors', 'email not found');
    }
    public function resumequiz($record_id)
    {
        $records = Records::find($record_id);
        $quiz_id = $records->quiz_id;
        $name = addQuiz::where('id', $quiz_id)->first();
        $solvedMcqs = Mcqs_records::where('record_id', $record_id)->pluck('mcq_id');
        $mcqs = Mcq::where('quiz_id', $quiz_id)->whereNotIn('id', $solvedMcqs)->first();
        if ($mcqs) {
            $mcqsData = [];
            $mcqsData['currentMcqs'] = $mcqs;
            $mcqsData['quizName'] = $name->quiz_name;
            $mcqsData['quizId'] = $record_id;
            $mcqsData['attemptmcq'] = count($solvedMcqs) + 1;
            $mcqsData['totalMcqs'] = Mcq::where('quiz_id', $quiz_id)->count();
            $mcqsData['recordid'] = $record_id;

            return view('UserMcqsUi', ['mcqsData' => $mcqsData]);
        } else {
            $record = Records::find($record_id);
            if ($record) {
                $record->status = 1;
                $record->update();
            }
            return redirect()->route('result', $record_id);
        }
    }
    public function certificate($id)
    {
        $quizRecords =  Records::WithQuiz()->where([
            ['user_id', Session::get('userdetails')->id],
            ['records.id', $id]
            ])->first();
            $data = [];
            $data['quizName'] = $quizRecords->quiz_name;
            $data['username'] = Session::get('userdetails')['username'];
            $data['date'] = $quizRecords->created_at->format('d F , Y');
            $data['percentage'] = Session::get('percentage');
        return view('certificate', ['data' => $data,'id'=>$id]);
    }
    public function dcertificate($id)
    {
        $quizRecords =  Records::WithQuiz()->where([
            ['user_id', Session::get('userdetails')->id],
            ['records.id', $id]
        ])->first();
        $data = [];
        $data['quizName'] = $quizRecords->quiz_name;
        $data['username'] = Session::get('userdetails')['username'];
        $data['date'] = $quizRecords->created_at->format('d F , Y');
        $data['percentage'] = Session::get('percentage');
        $html= view('downloadCertificate', ['data' => $data])->render();
        return Pdf::loadHTML($html)
            ->setPaper('a4', 'landscape')
            ->download('certificate.pdf');
    }
}
