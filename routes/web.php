<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', 'HomeController@index');

// Create a new user
$router->post('/api/exercise/new-user', 'UserController@add');

// Show all users.
$router->get('/api/exercise/users', 'UserController@get');

// Create a new exercise entry
$router->post('/api/exercise/add', 'ExerciseController@add');

// Show a log of entries controlled by query parameters.
$router->get('/api/exercise/log', 'ExerciseController@get');
