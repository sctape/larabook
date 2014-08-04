<?php

use Larabook\Forms\RegistrationForm;

class RegistrationController extends \BaseController {

    /**
     * @var RegistrationForm
     */
    private $registrationForm;

    /**
     * @param RegistrationForm $registrationForm
     */
    public function __construct(RegistrationForm $registrationForm)
    {
        $this->registrationForm = $registrationForm;
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('registration.create');
	}

    /**
     * Create a new Larabook user
     *
     * @return string
     */
    public function store()
    {
        $this->registrationForm->validate(Input::all());

        $user = User::create(
            Input::only('username', 'email', 'password')
        );

        Auth::login($user);

        return Redirect::home();
    }
}
