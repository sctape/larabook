<?php namespace Codeception\Module;

Use Laracasts\TestDummy\Factory as TestDummy;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class FunctionalHelper extends \Codeception\Module
{
    public function haveAnAccount($overrides = [])
    {
        return $this->have('Larabook\Users\User', $overrides);
    }

    public function signIn()
    {
        $email = 'foo@example.com';
        $password = 'demo';

        $this->haveAnAccount(['email'=> $email, 'password' => $password]);
        $I= $this->getModule('Laravel4');


        $I->amOnPage('/login');
        $I->fillField('email', $email);
        $I->fillField('password', $password);
        $I->click('Sign In');
    }

    public function postAStatus($body)
    {
        $I = $this->getModule('Laravel4');

        $I->fillField('Status:', $body);
        $I->click('Post Status');
    }

    public function have($model, $overrides = [])
    {
        return TestDummy::create($model, $overrides);
    }

}