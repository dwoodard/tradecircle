<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*Install*/
Route::get('/', array('as' => 'home', function(){
	if(file_exists(base_path() . '/app/config/database.php')) {
		return View::make('home');
	} else {

		return Redirect::route('install');
	}
}));

Route::get('/install', array( 'as' => 'install', function() {
	echo "<a href='/install/index.php'>Install Me!</a>";
}));

//Run Laravel Commands after Setup
Route::post('/app/install', array( 'as' => 'app/install', function() {
	$result =  Artisan::call('app:install');
	if ($result == 0 ) {
		echo '{"status" : "success"}';
	} else {
		echo '{"status" : "error"}';
	}
}));
/**/

