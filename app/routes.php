<?php

/*
We will need routes to send users to the Angular frontend since that will have its own routing.
We will also need routes for our backend API so people can access our comment data.

For Angular:
We will need one for the home page and a catch-all route to send users to Angular. 
This ensures that any way a user accesses our site, they will be routed to the Angular frontend.

For the API:
We will be prefixing our API routes with 'api' eg, http://example.com/api/comments
*/

Route::get('/', function()
{
	return View::make('index');
});

//API Routes =================================
Route::group(array('prefix' => 'api'), function() 
{
	Route::resource('comments', 'CommentController',
		array('only' => array('index', 'store', 'destroy')));
});

//CATCH ALL Route ============================
App::missing(function($exception) 
{
	return View::make('index');
});