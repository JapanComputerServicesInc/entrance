<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    
    //使用するコンポーネント
    public $components = array('Session','RequestHandler','Common',
        //ログイン機能を利用する設定
        'Auth' => array(
            //ログイン後の移動先
            'loginRedirect' => array('controller' => 'EntranceDatas', 'action' => 'adminlist'),
            //ログアウト後の移動先
            'logoutRedirect' => array('controller' => 'Users', 'action' => 'login'),
            //ログインページのパス
            'loginAction' => array('controller' => 'Users', 'action' => 'login'),
            //未ログイン時のメッセージ
            'authError' => 'ユーザー名とパスワードを入力して下さい。',
        )
    );
    
    public $helpers = array(
        'Session',
        'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
        'Form' => array('className' => 'BoostCake.BoostCakeForm'),
        'Paginator' => array('className' => 'BoostCake.BoostCakePaginator'),
    );
    
    //エラー時はindexにリダイレクト
    public function appError($error) {
        $this->Session->setFlash(__('エラーが発生したため、トップページに遷移しました。操作をやり直してください。'), 'alert', array(
            'plugin' => 'BoostCake',
            'class' => 'alert-danger'
        ));
        $this->redirect(array('controller' => 'EntranceDatas', 'action' => 'index'));
    }
    
}

