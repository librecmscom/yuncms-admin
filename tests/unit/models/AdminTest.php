<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace tests\models;

use yuncms\admin\models\Admin;

class AdminTest extends \Codeception\Test\Unit
{
    public function testFindUserByUsername()
    {
        expect_that($user = Admin::findByUsername('admin'));
        expect_not(Admin::findByUsername('not-admin'));
    }

    /**
     * @depends testFindUserByUsername
     */
    public function testValidateUser($user)
    {
        $user = Admin::findByUsername('admin');
        expect_that($user->validateAuthKey('0B8C1dRH1XxKhO15h_9JzaN0OAY9WprZ'));
        expect_not($user->validateAuthKey('test102key'));
        expect_that($user->validatePassword('123456'));
        expect_not($user->validatePassword('admin'));
    }
}