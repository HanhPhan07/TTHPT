<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

//admin route
Route::get('/ad', 'Auth\LoginController@index');

Route::group(['prefix' => '/admin'], function () {
    Route::group([
        'middleware' => ['prevent-back-history', 'auth'],
        'namespace' => 'API\Admin',
    ], function () {

        Route::get('/home', 'HomeController@index');
        Route::get('/exam', 'ExamController@index');
        Route::post('/exam/createexam', 'ExamController@store');
        Route::post('/exam/editexam', 'ExamController@update');
        Route::get('/exam/deleteexam/{id}', 'ExamController@delete');

        Route::get('/schedule', 'ScheduleController@index');
        Route::post('/schedule/create', 'ScheduleController@store');
        Route::post('/schedule/editexam', 'ScheduleController@update');
        Route::get('/schedule/delete/{id}', 'ScheduleController@delete');

        Route::get('/examlist', 'ExamlistController@index');
        Route::get('/examlist/createexamlist', 'ExamListController@store');

        Route::get('/student', 'StudentController@index');
        Route::post('/student/import', 'StudentController@import');
        Route::get('/student/export', 'StudentController@export');
        Route::get('/student/{id}', 'StudentController@detail');
        Route::post('/student/changeactive', 'StudentController@changeActive');
        Route::post('/student/update', 'StudentController@update');

        Route::get('/question', 'QuestionController@index');
        Route::post('/question/update', 'QuestionController@update');
        Route::get('/question/detail/{id}', 'QuestionController@detail');
        Route::get('/question/export','ExportExcelController@exportQuestion')->name('exportQuestion');
        Route::post('/question/import', 'QuestionController@import');

        Route::resource('/subject' , 'SubjectController');
        //Route::post('/subject','SubjectController@doUpLoad');
        Route::post('/subject/insert','SubjectController@doInsert');
        Route::get('/subject/delete/{id}', 'SubjectController@doDelete');
        Route::post('/subject/update','SubjectController@doUpdate');


        Route::get('/result','ResultController@index');
        Route::get('/result/calculatemark','ResultController@generateResult');
        Route::get('/result/aftercalculate','AfterCalculateController@index')->name('final');

    });

    Route::group([
        'namespace' => 'Auth',
    ], function () {

        Route::get('/login', 'LoginController@getLogin')->name('login');

        Route::post('/login', 'LoginController@postLogin');

        Route::get('/logout', 'LogoutController@getLogout');

        Route::get('/profile', 'ProfileController@index');
        Route::post('/changeprofile', 'ProfileController@update');

        Route::get('/forgotpassword', 'ForgotPasswordController@showLinkRequestForm');
        Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail');
        // Route::get('/password/email', 'ResetPasswordController@showResetForm');
        Route::post('/password/reset', 'ResetPasswordController@reset');
    });
});

//client
Route::group([
    'middleware' => ['guest'],
    'namespace' => 'API\Client',





], function () {

    Route::get('/task', 'TaskController@index');
    Route::get('/task/question', 'TaskController@getQuestion');
    Route::get('/task/time', 'TaskController@getTime');
    Route::post('/task','TaskController@saveTask');

    Route::get('/result', 'ExamController@index');

    Route::get('/', 'LoginController@index');

    Route::get('/login', 'LoginController@getLogin')->middleware('access');

    Route::get('/logout', 'LoginController@getLogout');

    Route::post('/login', 'LoginController@postLogin');

    Route::get('/home', 'HomeController@index');

    Route::get('/resetcd', 'TaskController@resetcd');

    Route::get('/result', 'ExamController@index');

    //Route::get('/result','ResultController@index');

    //Route::post('/result','ExamController@postdata');
    Route::get('/result', 'ExamController@index')->name('abc');

    Route::post('/result', 'ExamController@postdata');
});

// Route::get('/result', 'ResultController@index');
