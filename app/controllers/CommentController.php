<?php

class CommentController extends \BaseController {

	/**
	 * Send back all comments as JSON
	 *
	 * @return Response
	 */
	public function index()
	{
		return Response::json(Comment::get());
	}


	/**
	 * Save a new comment
	 *
	 * @return Response
	 */
	public function store()
	{
		Comment::create(array(
			'author' => Input::get('author'),
			'text' => Input::get('text')
		));

		return Response::json(array('success' => true));
	}


	/**
	 * Delete a comment
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Comment::destroy($id);

		return Response::json(array('success' => true));
	}


}
