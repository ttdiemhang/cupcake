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
//-------------------frontend-------------
Route::get('/',['as'=>'trang-chu','uses'=> 'PageController@getIndex']);
Route::get('index',['as'=>'trang-chu','uses'=> 'PageController@getIndex']);
    Route::get('loai-san-pham/{type}',['as'=>'loaisanpham','uses'=> 'PageController@getLoaiSp']);
Route::get('chi-tiet-san-pham/{id}',['as'=>'chitietsanpham','uses'=> 'PageController@getChiTietSp']);
Route::get('lien-he',['as'=>'lienhe','uses'=> 'PageController@getLienHe']);

Route::get('news',['as'=>'news','uses'=> 'PageController@getNews']);

Route::get('add-to-cart/{id}',['as'=>'themgiohang','uses'=> 'PageController@getAddtoCart']);
Route::get('del-cart{id}',['as'=>'xoagiohang','uses'=> 'PageController@getDelItemCart']);
Route::get('dat-hang',['as'=>'dathang','uses'=> 'PageController@getCheckout']);
Route::post('dat-hang',['as'=>'dathang','uses'=> 'PageController@postCheckout']);

Route::get('search',['as'=>'search','uses'=> 'PageController@getSearch']);

//Route::get('dangnhap',['as'=>'login','uses'=> 'PageController@getLogin']);
//Route::post('dangnhap',['as'=>'login','uses'=> 'PageController@postLogin']);
//Route::get('dangxuat',['as'=>'logout','uses'=> 'PageController@logout']);
//Route::get('dangky',['as'=>'signin','uses'=> 'PageController@getSignin']);
//Route::post('dangky',['as'=>'signin','uses'=> 'PageController@postSignin']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('dat-hang',['as'=>'dathang','uses'=> 'PageController@getCheckout']);
    Route::post('dat-hang',['as'=>'dathang','uses'=> 'PageController@postCheckout']);
    Route::get('/profile', 'PageController@profile')->name('profile');

});

Auth::routes();


//------------------backend-------------
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin-'], function () {
    // show form login if not login yet
    Route::get('login', 'LoginController@login')->name('login');
    Route::post('login', 'LoginController@handleLogin')->name('login');
    Route::get('logout', 'LoginController@logout')->name('logout');



    Route::group(['middleware' => 'check_admin_login'], function () {
        Route::get('/', 'AdminController@show_dashboard')->name('home');
        Route::group(['prefix' => 'category', 'as' => 'category-'], function () {
//            Route::get('/', 'CategoryProduct@index')->name('index');
            Route::get('/add', 'CategoryProduct@add_category')->name('add');
            Route::post('/save', 'CategoryProduct@save_category')->name('save');
            Route::get('/edit/{id}', 'CategoryProduct@edit_category')->name('edit');
            Route::post('/update/{id}', 'CategoryProduct@update_category')->name('update');
            Route::get('/all', 'CategoryProduct@all_category')->name('all');
            Route::get('/delete/{id}', 'CategoryProduct@delete_category')->name('delete');
        });
        Route::group(['prefix' => 'product', 'as' => 'product-'], function () {
//            Route::get('/', 'CategoryProduct@index')->name('index');
            Route::get('/add', 'ProductController@add_product')->name('add');
            Route::post('/save', 'ProductController@save_product')->name('save');
            Route::get('/edit/{id}', 'ProductController@edit_product')->name('edit');
            Route::post('/update/{id}', 'ProductController@update_product')->name('update');
            Route::get('/all', 'ProductController@all_product')->name('all');
            Route::get('/delete/{id}', 'ProductController@delete_product')->name('delete');
        });
        Route::group(['prefix' => 'news', 'as' => 'news-'], function () {
            Route::get('/', 'NewsController@index')->name('index');
            Route::get('/add', 'NewsController@add_news')->name('add');
            Route::post('/save', 'NewsController@save_news')->name('save');
            Route::get('/edit/{id}', 'NewsController@edit_news')->name('edit');
            Route::post('/update/{id}', 'NewsController@update_news')->name('update');
            Route::get('/all', 'NewsController@all_news')->name('all');
            Route::get('/delete/{id}', 'NewsController@delete_news')->name('delete');
        });
        Route::group(['prefix' => 'slide', 'as' => 'slide-'], function () {
            Route::get('/', 'SlideController@index')->name('index');
            Route::get('/add', 'SlideController@add_slide')->name('add');
            Route::post('/save', 'SlideController@save_slide')->name('save');
            Route::get('/edit/{id}', 'SlideController@edit_slide')->name('edit');
            Route::post('/update/{id}', 'SlideController@update_slide')->name('update');
            Route::get('/all', 'SlideController@all_slide')->name('all');
            Route::get('/delete/{id}', 'SlideController@delete_slide')->name('delete');
        });
        Route::group(['prefix' => 'bill', 'as' => 'bill-'], function () {
//            Route::get('/', 'BillController@index')->name('index');
            Route::get('/all', 'BillController@all_bill')->name('all');
            Route::get('/delete/{id}', 'BillController@delete_bill')->name('delete');
        });
        Route::group(['prefix' => 'member', 'as' => 'member-'], function () {
//            Route::get('/', 'BillController@index')->name('index');
            Route::get('/all', 'Membercontroller@all_member')->name('all');
            Route::get('/edit/{id}', 'Membercontroller@edit_member')->name('edit');
            Route::post('/update/{id}', 'Membercontroller@update_member')->name('update');
            Route::get('/delete/{id}', 'Membercontroller@delete_member')->name('delete');

        });
    });
});
//Route::get('/admin', 'AdminController@index');
//Route::get('/dashboard', 'AdminController@show_dashboard');


