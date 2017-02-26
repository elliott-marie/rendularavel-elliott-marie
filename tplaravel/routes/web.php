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

Route::get('/home', 'HomeController@index');

Route::resource('article', 'ArticleController');

Route::get('/contact', 'HomeController@formulaire');

Route::post('takeContact', [
    'as'   => 'contact',
    'uses' => 'HomeController@takeContact'
]);

Route::get('/user', [
    'uses' => 'HomeController@indexUser',
    'as' => 'indexUser'
]);

Route::get('/editProfil', [
    'uses' => 'HomeController@getAccount',
    'as' => 'account'
]);


Route::post('/updateaccount', [
    'uses' => 'HomeController@postSaveAccount',
    'as' => 'account.save'
]);

Route::get('/userimage/{filename}', [
    'uses' => 'HomeController@getSaveAccount',
    'as' => 'account.image'

]);

Route::post('article/{id}/comment', [
    'as'   => 'article.comment',
    'uses' => 'ArticleController@postComment'
]);

Route::get('/sendmail', [
    'uses' => 'HomeController@sendmail',
    'as' => 'email.sendmail'
]);

Route::post('/sendmail', function (\Illuminate\Http\Request $request,
                                   \Illuminate\Mail\Mailer $mailer){
    $mailer
        ->to($request->input('mail'))
        ->send(new \App\Mail\Email($request->input('title')));
    return redirect()->back();
})->name('sendmail');


Route::post('/like', [
    'uses' => 'ArticleController@postLikePost',
    'as' => 'article.like'
]);

Route::get('/admin', [
    'uses' => 'AdminController@index',
]);


