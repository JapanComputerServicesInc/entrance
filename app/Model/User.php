<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
    
    public $useTable = 'users';
    public $primaryKey = 'id';
    
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
            'rule1'=> array(
                'rule' => 'notBlank',
                'allowEmpty' => false,
                'message' => 'ユーザー名を入力してください。',
            ),
            'rule2' => array(
                'rule' => array('alphaNumeric'),
                'message' => '半角英数字で入力して下さい。'
            )
        ),
        
        'password' => array(
            'rule1'=> array(
                'rule' => 'notBlank',
                'allowEmpty' => false,
                'message' => 'パスワードを入力してください。',
            ),
            'rule2' => array(
                'rule' => array('alphaNumeric'),
                'message' => '半角英数字で入力して下さい。'
            ),
            'rule3' => array(
                'rule' => array('minLength', 6),
                'message' => '6文字以上で入力して下さい。'
            )
        )
        
    );
}