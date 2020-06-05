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

Route::get('/', 'UserController@index')->middleware('auth');
Route::post('users', 'UserController@store')->name('users.store')->middleware('auth');
Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')->middleware('auth');

Route::resource('Page', 'PageController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Use App\Post;

Route::get('queryPosts', function () {

    $posts = Post::get();

    foreach ($posts as $post) {

        echo " 
        $post->id 
        {$post->User->name}
        $post->title <br>";

    }
    
});

Use App\User;

Route::get('queryUsers', function () {

    $users = User::get();

    foreach ($users as $user) {

        echo " 
        $user->id 
        $user->name
        {$user->Posts->count()} <br>";

    }
    
});

Route::get('colecciones', function () {

    $users = User::get();

    //dd($users);
    //dd($users->contains(4)); //muestra si existe coleccion #4 return true / false
    //dd($users->except([1,2,3])); //muestra todas las colecciones excepto
    //dd($users->only(4)); //muestra solo las colecciones
    //dd($users->find(4)); // muestra el id de la coleccion
    //dd($users->load('posts')); // muestra la relacion de usuarios con la tabla posts

    /* crea un json con la coleccion seleccionada
    $serialize = $users->find(4);
    dd($serialize->toJson());
    */
    
});

Route::get('getAttributeUsers', function () {

    $users = User::get();

    foreach ($users as $user) {

        echo " 
        $user->id 
        $user->get_name
        {$user->Posts->count()} <br>";

    }
    
});

Route::get('getAttributePosts', function () {

    $posts = Post::get();

    foreach ($posts as $post) {

        echo " 
        $post->id 
        {$post->User->name}
        $post->get_title <br>";

    }
    
});