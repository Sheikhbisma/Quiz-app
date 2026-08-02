<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminloginController;
use App\Http\Controllers\UserController;
Route::get('/', [UserController::class , 'welcome']);

Route::get('admin' , function () {
    return view('AdminLogin');
});
Route::get('/user-signup' , function () {
    
    return view('UserSignup');
})->name('usersignup');
Route::post('login',[AdminloginController::class , 'login']);
Route::post('userlogin',[UserController::class , 'userlogin']);
Route::post('addcategory',[AdminloginController::class , 'addCategory'])->name('addcategory');
Route::get('/login',[AdminloginController::class , 'showlogin']);
Route::get('/user-categories',[UserController::class , 'categoryPage'])->name('userCategoryPage');
Route::get('/userlogin',function(){
    if(!session()->has('userdetails')){
        return view('UserLogin');
    }else{
        return redirect('/');
    }
})->name('userlogin');
Route::get('/dashboard',[AdminloginController::class , 'dashboard'])->name('dashboard');
Route::get('/category',[AdminloginController::class , 'category'])->name('category');
Route::get('/usersignup-quiz',[UserController::class , 'SignFromQuiz'])->name('quizsign');
Route::get('/userlogin-quiz',[UserController::class , 'LogFromQuiz'])->name('quizlogin');
Route::get('/Quiz/{id?}',[AdminloginController::class , 'quiz'])->name('quiz');
Route::get('/logout' , [UserController::class , 'logoutuser'])->name('logoutuser');
Route::post('/addquiz',[AdminloginController::class , 'addquiz'])->name('addquiz');
Route::post('/addmcqs',[AdminloginController::class , 'addmcqs'])->name('addmcqs');
Route::post('/usersign',[UserController::class , 'usersign'])->name('usersign');
Route::post('/userlog',[UserController::class , 'login'])->name('userlog');
Route::delete('/category/deleteCategoryId/{id}',[AdminloginController::class , 'delete'])->name('category.delete');
Route::delete('/quiz/deletequizId/{id}',[AdminloginController::class , 'deleteQuiz'])->name('quiz.delete');
Route::get('/quiz-list/{id}/{category}',[AdminloginController::class , 'quizList'])->name('quiz-list');
Route::get('/viewmcqs/{id}/{quiz_name}',[AdminloginController::class , 'viewmcqs'])->name('viewmcqs');
Route::get('/user-quiz-lists/{id}/{category}',[UserController::class , 'userQuizList'])->name('userquizlist');
Route::get('/startquiz/{id}/{quizname}',[UserController::class , 'startquiz'])->name('startquiz');
Route::middleware('CheckUserAuth')->group(function(){
    Route::get('/Mcqs/{id}/{name}' , [UserController::class , 'usermcqs'])->name('usermcqs');
    Route::get('/user-quiz-details' , [UserController::class , 'quizdetails'])->name('quizdetails');
    Route::post('/submitandnext/{name}/{id}',[UserController::class , 'submitandnext'])->name('submitandnext');
    Route::get('/resume-quiz/{record_id}',[UserController::class , 'resumequiz'])->name('resumequiz');
    Route::get('/resultUi/{record_id}' , [UserController::class , 'viewResult'])->name('result');
    Route::get('/certificate/{id}' , [UserController::class , 'certificate'])->name('certificate');
    Route::get('/download-certificate/{id}' , [UserController::class , 'dcertificate'])->name('dcertificate');

});
Route::get('/addQuiz-from-Category/{categoryId}',[AdminloginController::class , 'viewPage'])->name('viewpage');
Route::get('/search-quiz',[UserController::class , 'searchQuiz'])->name('searchQuiz');
Route::get('/userverification/{email}',[UserController::class , 'userverify'])->name('userverification');
Route::view('user-forgot-password','forgetPassword')->name('forgot');
Route::post('/forgotPassword',[UserController::class , 'forgotPassword'])->name('forgotPassword');
Route::post('/user-forgot-password',[UserController::class , 'resetPassword'])->name('resetPassword');
Route::get('/user-forgot-password/{token}',[UserController::class , 'userforgot'])->name('userforgot');