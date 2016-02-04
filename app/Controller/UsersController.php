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
        
        //ページ名
        $this->set('title_for_layout', '新規ユーザー登録');
        
        //POSTの場合
        if ($this->request->is('post')) {
            
            //モデルの状態をリセットする
            $this->User->create();
            
            //データを登録する
            if($this->User->save($this->request->data)){

            //完了メッセージを設定
            $this->Session->setFlash(__('ユーザーを作成しました。'), 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-info'
            ));
            
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

                //一覧ページへ移動
               return $this->redirect(array('controller' => 'EntranceDatas', 'action' => 'adminlist'));
                
            //ログイン失敗なら
            }else{
                //エラー文言を表示
                
                //メッセージの表示を変える
                //エラーメッセージを表示
                $this->Session->setFlash(__('ユーザー名かパスワードが違います。'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-danger'
                ));
            }
        }
    }
    
    
    /* 
     * アクション名：logout
     * 概要：ログアウト処理
     */
    public function logout(){
        
        //ログアウトメッセージの表示
        $this->Session->setFlash(__('ログアウトしました。'), 'alert', array(
            'plugin' => 'BoostCake',
            'class' => 'alert-info'
        ));

        //ログアウトし、Auth指定のログアウト後のページへ移動
        $this->redirect($this->Auth->logout());
        
        }   
    
    /* 
     * アクション名：password
     * 概要：パスワード変更処理
     */
    public function password(){
       
        //ページ名
        $this->set('title_for_layout', 'パスワード変更');

        $id = $this->Auth->user('id');
        $user = $this->User->findById($id);

        // POST送信の場合
        if($this->request->is('post') || $this->request->is('put')) {
            $this->User->set($this->data);
            //バリデーションをハッシュ化前にチェック
            if ($this->User->validates()) {
                $this->User->create();
               
                if ($this->User->save($this->request->data)) {
                    //完了メッセージの表示
                    $this->Session->setFlash(__('パスワードを変更しました。'), 'alert', array(
                        'plugin' => 'BoostCake',
                        'class' => 'alert-info'
                    ));
                } else {
                    $this->Session->setFlash(__('パスワードを変更できませんでした。やり直して下さい。'), 'alert', array(
                        'plugin' => 'BoostCake',
                        'class' => 'alert-danger'
                    ));
                }
            }
        }
        //指定プライマリーキーのデータをリクエストデータにセット
        $this->request->data = $user;
    }
}