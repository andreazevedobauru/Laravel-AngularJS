<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('app');
});
Route::post('oauth/access_token', function(){
    return Response::json(Authorizer::issueAccessToken());
});


Route::group(['middleware'=>'oauth'], function(){

    Route::resource('client', 'ClientController', [ 'except' => ['create', 'edit'] ]);

   // Route::group(['middleware'=>'CheckProjectOwner'], function(){

        Route::resource('project', 'ProjectController', [ 'except' => ['create', 'edit'] ]);

   //});

    Route::group(['prefix'=>'project'], function(){

        Route::get('{id}/note', 'ProjectNoteController@index');
        Route::post('{id}/note/', 'ProjectNoteController@store');
        Route::get('{id}/note/{noteId}', 'ProjectNoteController@show');
        Route::put('note/{idNote}', 'ProjectNoteController@update');
        Route::delete('{id}/note/{noteId}', 'ProjectNoteController@destroy');

        Route::post('{id}/file', 'ProjectFileController@store');

    });




});



/*
Route::post('project', 'ProjectNoteController@store');
Route::get('project/{id}', 'ProjectNoteController@show');
Route::delete('project/{id}', 'ProjectNoteController@destroy');
Route::put('project/{id}', 'ProjectNoteController@update');*/