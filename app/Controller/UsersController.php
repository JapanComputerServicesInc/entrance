<?php

class UsersController extends AppController {
    
    //使用するモデル
    var $uses = array('User');
    
    public function beforeFilter(){
        //ログインしないでアクセス出来るアクションを登録する
        $this->Auth->allow('login','add');
        $this->set('auth',$this->Auth);
    }
    
    
    /* 
     * アクション名：add
     * 概要：新規ユーザー登録処理
     */
    public function add() {
        
    	//POSTの場合
        if ($this->request->is('post')) {
            
            //モデルの状態をリセットする
            $this->User->create();
            
            //データを登録する
            if($this->User->save($this->request->data)){
                //完了メッセージを設定
                $this->Session->setFlash('*～*～*～*～*～*～*～*～*'."<br />".'　ユーザー登録が完了しました。'."<br />".'*～*～*～*～*～*～*～*～*');
                //ログイン画面に移動する
                $this->redirect(array('controller' => 'Users', 'action' => 'login'));
            
            }
        }
    }
    
    
    /* 
     * アクション名：login
     * 概要：ログイン処理
     */
    public function login(){
        
        //ページ名
        $this->set('title_for_layout', 'ログイン');
        
        //POST送信なら
        if($this->request->is('post')){
            
            //ログイン成功なら
            if($this->Auth->login()){
                
                //Auth指定のログインページへ移動
                $this->redirect($this->Auth->redirect());
            
            //ログイン失敗なら
            }else{
                //エラー文言を表示
                
                //メッセージの表示を変える
                
                $this->Session->setFlash('ユーザー名かパスワードが違います。'."<br />");
            }
        }
    }
    
    
    /* 
     * アクション名：logout
     * 概要：ログアウト処理
     */
    public function logout(){
        
        //ページ名
        //$this->set('title_for_layout', '出社情報登録');
        
        $this->Auth->logout();
        //ログアウトメッセージの表示変更
        $this->Session->setFlash(__('ログアウトしました。'), 'alert', array(
            'plugin' => 'BoostCake',
            'class' => 'alert-primary'
        ));
        //$this->Session->setFlash('*～*～*～*～*～*～*'."<br />".'　ログアウトしました。'."<br />".'*～*～*～*～*～*～*');
        //Auth指定のログアウト後のページへ移動
        $this->redirect($this->Auth->redirect());
        
        }   
}