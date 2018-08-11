<?php
namespace App\Test\TestCase\Controller;

use App\Controller\UsersController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\UsersController Test Case
 */
class UsersControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    public function testLogin()
    {
        $this->get('/users/login');
        $this->assertResponseOk(); //ステータスが200系である
        $this->assertResponseContains('ログイン'); //ボディにLoginという文字列が含まれている
    }

    public function testLoginOk()
    {
        // ログイン処理の実行
        $ret = $this->post('/users/login', [
            'email' => 'test_mail@gmail.com',
            'password' => 'password'
        ]);

        // ログイン後のユーザー情報(パスワード以外)
        $user = [
          'id' => 1,
          'email' => 'test_mail@gmail.com',
          'name' => 'test_user',
          'password' => 'password'

        ];
       // セッションのユーザー情報と比較
       $this->assertSession($user, 'Auth.User');
       //$this->assertSession(null, 'Auth.User');
    }
}
