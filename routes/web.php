<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace'=>"Auth",'prefix'=>'auth'],function(){
	Route::get('/login', "AuthController@getLogin");
	Route::post('/login', "AuthController@postLogin");
	
	
});

Route::get('/auth/logout', 'Auth\AuthController@getLogout');


Route::group([],function(){
	Route::get('/', "IndexController@index");
	Route::get("/about-us","PageController@about");
	Route::get("/contact","PageController@contact");
	Route::get("/search","ProductController@search");
	Route::post("/post-contact","PageController@postcontact");
	Route::get("/news","NewsController@index");
	Route::get("/product","ProductController@product");
	Route::get("/news/{alias}","NewsController@detail");
	Route::get('/{alias}', "ProductController@cate");
	Route::get('/{cate}/{alias}', "ProductController@detail");

});

//BACKEND 

Route::group(['namespace'=>"Admin","prefix"=>"admin",'middleware'=>'auth'],function(){
	Route::group(['prefix'=>'index'],function(){
		Route::any("/index","IndexController@index");
		
	});
	Route::group(['prefix'=>'cate'],function(){
		Route::any('/add','CateController@add');
		Route::any("/lists","CateController@lists");
		Route::any("/edit","CateController@edit");
		Route::post("/remove","CateController@remove");
	});
	Route::group(['prefix'=>'product'],function(){
		Route::any('/add','ProductController@add');
		Route::any("/lists","ProductController@lists");
		Route::any("/edit","ProductController@edit");
		Route::post("/remove","ProductController@remove");
		Route::get("/removepicture","ProductController@removepicture");
		Route::get("/export","ProductController@export");
		Route::get("/subcate","ProductController@subcate");
	});

	Route::group(['prefix'=>'contact'],function(){
		Route::any('/index','ContactController@index');
		Route::post('/remove','ContactController@remove');
		Route::any('/edit','ContactController@edit');

	});
	
	Route::group(['prefix'=>'news'],function(){
		Route::any('/add','NewsController@add');
		Route::any("/lists","NewsController@lists");
		Route::any("/edit","NewsController@edit");
		Route::post("/remove","NewsController@remove");
		Route::get("/removepicture","NewsController@removepicture");
	});
	Route::group(['prefix'=>'page'],function(){
		Route::any('/add','PageController@add');
		Route::any("/lists","PageController@lists");
		Route::any("/edit","PageController@edit");
		Route::post("/remove","PageController@remove");
	});
	
	Route::group(['prefix'=>'customer'],function(){
		Route::any('/add','UserController@add');
		Route::any("/lists","UserController@lists");
		Route::any("/edit","UserController@edit");
		Route::post("/remove","UserController@remove");
	});


	Route::group(["prefix"=>"upload_user"],function(){
		Route::any("/index","IndexController@uploaduser");
	});
});

