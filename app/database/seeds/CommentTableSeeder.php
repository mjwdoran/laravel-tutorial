<?php

class CommentTableSeeder extends Seeder {

	public function run()
	{
		DB::table('comments')->delete();

		Comment::create(array(
			'author' => 'Chris Sevilleja',
			'text' => 'Look I am a test comment.'
		));

		Comment::create(array(
			'author' => 'Marcus Doran',
			'text' => 'This is going to be great.'
		));
	}
}