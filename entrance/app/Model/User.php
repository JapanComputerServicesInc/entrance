<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
    
    public $useTable = 'users';
    public $primaryKey = 'ID';
    
    /**
     * ユーザー情報登録前にパスワードをハッシュ化する。
     * @see Model::beforeSave()
     */
    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new SimplePasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
        }
        return true;
    }

    //ログイン・新規ユーザー追加画面のバリデーション
    public $validate = array(
        'username' => array(
            'rule' => 'notBlank',
            'required' =>true,
            'message' =>'ユーザー名は必須です。'
    ),

        'password' => array(
            'rule' => 'notBlank',
            'required' =>true,
            'message' =>'パスワードは必須です。'
        )
    );
}