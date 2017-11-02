<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */


class LoginFormCest
{
    public function _before(\FunctionalTester $I)
    {
        $I->wantTo('ensure that login works');
        $I->haveFixtures([
            'admin' => [
                'class' => \tests\_fixtures\AdminFixture::className(),
                'dataFile' => codecept_data_dir() . 'admin.php'
            ]
        ]);
        $I->amOnRoute('/admin/security/login');
    }

    public function openLoginPage(\FunctionalTester $I)
    {
        $I->see('Y+', 'h1');
    }

    // demonstrates `amLoggedInAs` method
    public function internalLoginByInstance(\FunctionalTester $I)
    {
        $user = $I->grabFixture('admin', 'admin');
        $I->amLoggedInAs($user);
        $I->amOnPage('/');
        $I->see('Logout');
    }

    public function loginWithEmptyCredentials(\FunctionalTester $I)
    {
        $I->submitForm('#login-form', []);
        $I->expectTo('see validations errors');
        $I->see('Account cannot be blank.');
        $I->see('Password cannot be blank.');
        $I->see('Verify Code cannot be blank.');
    }

    public function loginWithWrongCredentials(\FunctionalTester $I)
    {
        $user = $I->grabFixture('admin', 'admin');
        $I->submitForm('#login-form', [
            'LoginForm[login]' => $user->username,
            'LoginForm[password]' => 'wrong',
            'LoginForm[verifyCode]' => 'test',
            'LoginForm[rememberMe]' => 1
        ]);
        $I->expectTo('see validations errors');
        $I->see('Incorrect username or password.');
    }

    public function loginSuccessfully(\FunctionalTester $I)
    {
        $user = $I->grabFixture('admin', 'admin');
        $I->submitForm('#login-form', [
            'LoginForm[login]' => $user->username,
            'LoginForm[password]' => '123456',
            'LoginForm[verifyCode]' => 'test',
            'LoginForm[rememberMe]' => 1
        ]);
        $I->amOnPage('/');
        $I->see('Logout');
        $I->dontSeeElement('form#login-form');
    }
}