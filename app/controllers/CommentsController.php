<?php

use Larabook\Statuses\LeaveCommentOnStatusCommand;
use Laracasts\Commander\CommanderTrait;

class CommentsController extends \BaseController {

    use CommanderTrait;

	/**
	 * Store a newly created resource in storage.
	 * POST /comments
	 *
	 * @return Response
	 */
	public function store()
	{
		//fetch the input
        $input = array_add(Input::all(), 'user_id', Auth::id());

        //execute command
        $this->execute(LeaveCommentOnStatusCommand::class, $input);

        //go back
        return Redirect::back();
	}

}