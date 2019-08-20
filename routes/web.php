<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware'=>'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['prefix'=>'user'], function () {
        Route::get('edit/{id}', 'UserController@edit');
        Route::post('update/{id}', 'UserController@update');
        Route::get('/', 'HomeController@showUsers');
        Route::get('followingList', 'UserController@showFollowing');
        Route::get('followerList', 'UserController@showFollowers');
        Route::get('profile/{id}', 'UserController@showUserProfile');
        Route::get('follow/{id}', 'UserController@follow');
        Route::get('unfollow/{id}', 'UserController@unfollow');
        Route::get('lessons', 'HomeController@showAllLessons');
        Route::get('addLesson/{id}', 'LessonController@addLesson');
        Route::post('storeLesson/{id}', 'LessonController@storeLesson');
        Route::get('editLesson/{id}', 'LessonController@editLesson');    
        Route::post('updateLesson/{lessonId}', 'LessonController@updateLesson');    
        Route::get('delete/{lessonId}', 'LessonController@deleteLesson');    
        Route::get('viewQuizzes/{id}', 'QuizController@viewQuizzes');    
        Route::get('addQuiz/{id}', 'QuizController@addQuiz');    
        Route::get('myLessons/{id}', 'LessonController@showMyLessons');    
    });
    
});
    Route::group(['prefix'=>'admin'], function () {
        Route::get('login', 'AdminController@adminLogin');
        Route::get('register', 'AdminController@adminShowRegister');
        Route::post('register', 'AdminController@adminRegister')->name('admin.register');
    });