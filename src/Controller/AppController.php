<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');

        // 認証用　追加
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            // コントローラーで isAuthorized を使用します
            'authorize' => ['Controller'],
            // 未認証の場合、直前のページに戻します
            'unauthorizedRedirect' => $this->referer()
        ]);

        // ここに定義したものはログインなしでも閲覧可能
        //$this->Auth->allow(['display', 'view', 'index']);

        // ログインしてたらユーザ名
        $login_user_name = $this->Auth->user('name') ?? 'no user';
        $this->set(compact('login_user_name'));

    }

    // 認証用の関数（細かい確認が必要なところはこちらを利用）
    public function isAuthorized($user) : bool
    {
        return true;
    }

    // view切り替え
    public function beforeRender(Event $event)
    {    
        // PC／スマホのview切り替え
        if ($this->request->isMobile()) {
            // plugins/Sp/Template内のviewが読み込まれる
            $this->viewBuilder()->setTheme('Sp');
        }
    }

    public function my_dump($value) : void 
    {
        echo '<pre>';
        print_r($value);
        echo '</pre>';
    }
}
