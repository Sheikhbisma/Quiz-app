<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\Admin;
use App\Models\Categories;
use App\Models\addQuiz;
use App\Models\Mcq;

class AdminloginController extends Controller
{
    //
    public function showlogin()
    {
        return view('AdminLogin');
    }
    public function login(Request $request)
    {
        $validates = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $admin = Admin::where([
            'username' => $request->username,
            'password' => $request->password,

        ])->first();
        if (!$admin) {
            return back()->with('nouser', 'User Does not Exist');
        }
        Session::put('admin', $admin);
        return redirect('dashboard');
    }
    public function dashboard()
    {
        $admin = Session::get('admin');
        if ($admin) {
            return view('admin', ['admin' => $admin]);
        }
        return redirect('login');
    }
    public function category()
    {
        $admin = Session::get('admin');
        $categories = Categories::all();
        if ($admin) {
            return view('Categories', ['admin' => $admin, 'categories' => $categories]);
        }
        return redirect('login');
    }
    public function logout()
    {
        Session::forget('admin');
        return redirect('login');
    }
    public function addCategory(Request $request)
    {
        $admin = Session::get('admin');
        $request->validate([
            'category' => 'required|min:3|unique:categories,category'
        ]);
        Categories::create([
            'category' => Str::slug($request->category),
            'creator' => $admin->username
        ]);
        return redirect()->route('category')->with('success', "Category " . $request->category . " Added!");
    }
    public function delete($id)
    {
        $isDeleted = Categories::find($id)->delete();
        if ($isDeleted) {
            return redirect()->route('category')->with('success', "Category deleted Successfully");
        }
        return redirect()->back()->with('');
    }
    public function deleteQuiz($id)
    {
        $isDeleted = addQuiz::find($id)->delete();
        if ($isDeleted) {
            return redirect()->back()->with('success', "Category deleted Successfully");
        }
        return redirect()->back()->with('');
    }
    public function quiz($id = null)
    {
        $admin = Session::get('admin');

        if (!$admin) {
            return redirect('login');
        }

        if ($id) {
            $quiz = addQuiz::findOrFail($id);
            $TotalMcqs = Mcq::where('quiz_id', $id)->count();

            return view('Quiz', [
                'admin' => $admin,
                'quiz' => $quiz,
                'totalmcqs' => $TotalMcqs
            ]);
        }

        $categories = Categories::all();

        return view('Quiz', [
            'admin' => $admin,
            'categories' => $categories
        ]);
    }

    public function addquiz(Request $request)
    {
        $request->validate([
            'quiz' => 'required|min:2',
            'category_id' => 'required'
        ]);
        $quiz = addQuiz::create([
            'quiz_name' => Str::slug($request->quiz),
            'category_id' => $request->category_id,
        ]);
        return redirect()->route('quiz', $quiz->id);
    }
    public function addmcqs(Request $request)
    {
        $request->validate([
            'question' => 'required|min:5',
            'A' => 'required',
            'B' => 'required',
            'C' => 'required',
            'D' => 'required',
            'correctoption' => 'required',
        ]);
        $admin = Session::get('admin');
        $TotalMcqs = 0;
        $quiz = addQuiz::find($request->quiz_id);
        $mcq = new Mcq();
        $mcq->mcqs = $request->question;
        $mcq->Option_A = $request->A;
        $mcq->Option_B = $request->B;
        $mcq->Option_C = $request->C;
        $mcq->Option_D = $request->D;
        $mcq->Correct_Answer = $request->correctoption;
        $mcq->admin_id = $admin->id;
        $mcq->category_id = $quiz->category_id;
        $mcq->quiz_id = $request->quiz_id;
        if ($mcq->save()) {
            if ($request->addmore == 'add-more') {

                return redirect(url()->previous());
            } else {
                Session::forget('Quiz');
                return redirect()->route('category');
            }
        }
        // return $request;
    }
    public function viewmcqs($id, $quiz_name)
    {
        $admin = Session::get('admin');

        if (!$admin) {
            return redirect('login');
        }
        $view = Mcq::where('quiz_id', $id)->get();
        return view('showMcqs', ['view' => $view, 'qName' => $quiz_name]);
    }
    public function quizList($id, $category)
    {

        $admin = Session::get('admin');
        $quizz = addQuiz::where('category_id', $id)->get();
        if ($admin) {
            return view('showQuiz', ['admin' => $admin, 'quiz' => $quizz, 'category' => $category,'id'=>$id]);
        }
        return redirect('login');
    }
    public function viewPage($id){
        $findCategory = Categories::find($id);
        return view('Quiz',compact('findCategory'));
    }
   
}
