<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\Post;

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


Route::get('/user/{id}/post', function ($id){
    return User::find($id)->post;
});

//Route::get('read',function (){
//    $posts = Post::all();
//
//    foreach ($posts as $post) {
//        return $post->title;
//    }
//});


Route::get('find/{id}', function ($id){
    $post = Post::find($id);
    return $post->title;
});

Route::get('find-where', function (){
    $posts = Post::where('id', 1)->get();
    return $posts;
});

Route::get('insertdata', function (){
    $post = new Post;
    $post->user_id = 5;
    $post->title = 'new title for post 5 ';
    $post->content= 'content content content content content content content 5555555555';
    $post->save();
});

Route::get('update', function (){
    $post = Post::find(1);
    $post->user_id = 5;
    $post->title = 'This Is Updated Title';
    $post->content= 'Updated Updated Updated Updated Updated Updated Updated Updated Updated ';
    $post->save();
});


Route::get('insert-mass', function (){
    Post::create(['title'=>'The mass creation title', 'content'=>'massinsert content is here','user_id'=>5]);
});


Route::get('update-new', function (){
    Post::where('id', 2)->update(['title'=>'NEwupdated title', 'content'=>'this is the content which is updated']);
});

Route::get('delete-one', function(){
    Post::where('id', 4)->delete();
});

Route::get('destroy', function(){
    Post::destroy(5,7);

//    Post::destroy(5,7); multiple
});


Route::get('soft-delete/{id}/', function ($id){

    Post::find($id)->delete();

});

Route::get('readSoftDelete', function (){
    // can be done with whereNotNull
    return Post::withTrashed()->get() .'</br></br>'. Post::onlyTrashed()->get();

});


Route::get('/restore', function(){
    // all will be restored
    return Post::withTrashed()->whereNotNull('deleted_at')->restore();
});


Route::get('/foreceDelete', function(){
    // all will be restored
    return Post::withTrashed()->whereNotNull('deleted_at')->forceDelete();
});

/*
|--------------------------------------------------------------------------
| relation one to one
|--------------------------------------------------------------------------
|
|
*/


Route::get('user/{id}/post', function ($id){
    return User::find($id)->post;
});
