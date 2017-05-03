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

//RUTAS DEL FRONT

Route::get('/',[
    'as'=>'front.index',
    'uses'=>'FrontController@index'
    ]);

Route::get('subcategories/{name}',[
    'as'=>'front.search.subcategory',
    'uses'=>'FrontController@searchSubCategory'
    ]);

Route::get('tags/{name}',[
    'as'=>'front.search.tag',
    'uses'=>'FrontController@searchTag'
    ]);

Route::get('articles/{slug}',[
    'as'=>'front.article',
    'uses'=>'FrontController@viewArticle'
    ]);

// RUTAS DEL PANEL DE ADMINISTRACION

    Route::group(['prefix' => 'admin','middleware'=>'auth'], function () {

    //HOME ADMIN

    Route::get('/',[ 'as'=>'admin.index', function () {
    return view('admin.index');
    }]);

    Route::group(['middleware'=>'admin'],function(){

        //USUARIO

        Route::resource('users','UsersController');

        Route::get('users/{id}/destroy',[
        'uses'=>'UsersController@destroy',
        'as'=>'admin.users.destroy'
        ]);

    });

    //CATEGORIA

    Route::resource('categories','CategoriesController');

    Route::get('categories/{id}/destroy',[
        'uses'=>'CategoriesController@destroy',
        'as'=>'admin.categories.destroy'
    ]);

    //TAGS

    Route::resource('tags','TagsController');

    Route::get('tags/{id}/destroy',[
        'uses'=>'TagsController@destroy',
        'as'=>'admin.tags.destroy'
    ]);

    //ARTICLES

    Route::resource('articles','ArticlesController');

    Route::get('articles/{id}/destroy',[
        'uses'=>'ArticlesController@destroy',
        'as'=>'admin.articles.destroy'
    ]);

    //GALERIA DE IMAGEN

    Route::get('images',[
        'uses'=>'ImagesController@index',
        'as'=>'admin.images.index'
    ]);

    Route::get('user/pdf',[
        'uses'=>'PDFController@getUsers',
        'as'=>'admin.pdf.user'
    ]);

    //PAISES

    Route::resource('countries','CountriesController');

    Route::get('countries/{id}/destroy',[
        'uses'=>'CountriesController@destroy',
        'as'=>'admin.countries.destroy'
    ]);

    //SUBCATEGORIA

    Route::resource('subcategories','SubCategoriesController');

    Route::get('subcategories/{id}/destroy',[
        'uses'=>'SubCategoriesController@destroy',
        'as'=>'admin.subcategories.destroy'
    ]);

    //USUARIO - TELEFONOS

    Route::get('users/{users}/phones',[
        'uses'=>'PhonesController@index',
        'as'=>'admin.phones.index'
    ]);

    Route::get('users/{users}/phones/create',[
        'uses'=>'PhonesController@create',
        'as'=>'admin.phones.create'
    ]);

    Route::post('users/{users}/phones',[
        'uses'=>'PhonesController@store',
        'as'=>'admin.phones.store'
    ]);

    Route::get('users/{users}/phones/{phones}/destroy',[
        'uses'=>'PhonesController@destroy',
        'as'=>'admin.phones.destroy'
    ]);

    Route::get('users/{users}/phones/{phones}/edit',[
        'uses'=>'PhonesController@edit',
        'as'=>'admin.phones.edit'
    ]);

    Route::put('users/{users}/phones/{phones}',[
        'uses'=>'PhonesController@update',
        'as'=>'admin.phones.update'
    ]);

    //COMENTARIOS

    Route::resource('comments','CommentsController');

    Route::get('comments/{id}/destroy',[
        'uses'=>'CommentsController@destroy',
        'as'=>'admin.comments.destroy'
    ]);

});


Route::auth();

Route::get('/home', 'HomeController@index');
