<?php

use Larabook\Forms\SignInForm;

class SessionsController extends BaseController {

    /**
     * @var SignInForm
     */
    private $signInForm;

    function __construct(SignInForm $signInForm)
    {
        $this->beforeFilter('guest', ['except' => 'destroy']);

        $this->signInForm = $signInForm;
    }

	/**
	 * Show the form for signing in.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}


	/**
	 * Authenticate the user
	 *
	 * @return Response
	 */
	public function store()
    {
        //fetch the form input
        $formData = Input::only('email', 'password');

        //validate the form
        //if invalid, then go back
        $this->signInForm->validate($formData);

        //if is valid, then try to sign in
        if (!Auth::attempt($formData)) {
            Flash::message('We were unable to sign you in. Please try again.');
            return Redirect::back()->withInput();
        } else {
            //redirect to statuses
            Flash::message('Welcome Back!');
            return Redirect::intended('/statuses');
        }
	}

    /**
     * Logout the user
     */
    public function destroy()
    {
        Auth::logout();
        Flash::message('You have now been logged out.');
        return Redirect::home();
    }
}
