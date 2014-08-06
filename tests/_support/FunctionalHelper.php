<?php namespace Codeception\Module;

Use Laracasts\TestDummy\Factory as TestDummy;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class FunctionalHelper extends \Codeception\Module
{
    public function haveAnAccount($overrides = [])
    {
        TestDummy::create('Larabook\Users\User', $overrides);
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

}