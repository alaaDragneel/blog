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

Route::get('/', [
     'uses' => 'postController@getBlogIndex',
     'as' => 'blog.index'
]);

Route::get('/blog', [
     'uses' => 'postController@getBlogIndex',
     'as' => 'blog.index'
]);

Route::get('/blog/{post_id}&{end?}', [
     'uses' => 'postController@getSingleBlogIndex',
     'as' => 'blog.single'
]);

Route::post('/contact/sendmail', [
     'uses' => 'ContactMessageController@postSendMessage',
     'as' =>'contact.send'
]);

/*other route*/

Route::get('/about', function() {
     return view('frontend.other.about');
})->name('about');

Route::get('/contact', [
     'uses' => 'ContactMessageController@getContactIndex',
     'as' => 'contact'
]);
Route::group(['prefix' => '/admin'], function() {
     Route::get('/', [
          'uses' => 'adminController@getIndex',
          'as' => 'admin.index'
     ]);

     Route::get('/blog/post/{post_id}&{end}', [
          'uses' => 'postController@getSingleBlogIndex',
          'as' => 'single.post'
     ]);

     Route::post('/blog/post/add', [
          'uses' => 'postController@postAddPost',
          'as' => 'add.post'
     ]);

     Route::get('/blog/posts', [
          'uses' => 'postController@getPosts',
          'as' => 'posts.show'
     ]);

     Route::get('/blog/post/edit/{post_id}', [
          'uses' => 'postController@getUpdatePost',
          'as' => 'edit.post'
     ]);

     Route::post('/blog/post/update', [
          'uses' => 'postController@postUpdatePost',
          'as' => 'update.post'
     ]);

     Route::get('/blog/post/delete/{post_id}', [
          'uses' => 'postController@getDeletePost',
          'as' => 'delete.post'
     ]);

     /* categories*/

     Route::get('/blog/categories', [
          'uses' => 'categoryController@getCategories',
          'as' => 'cat'
     ]);

     Route::post('/blog/category/create', [
          'uses' => 'categoryController@postAddcategory',
          'as' => 'add.cat'
     ]);

     Route::post('/blog/category/update', [
          'uses' => 'categoryController@postUpdatecategory',
          'as' => 'edit.cat'
     ]);

     Route::get('/blog/category/delete/{category_id}', [
          'uses' => 'categoryController@getDeletecategory',
          'as' => 'delete.cat'
     ]);

});
