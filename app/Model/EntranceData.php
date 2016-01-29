<?php
App::uses('AppModel', 'Model');

class EntranceData extends AppModel {
    
    public $useTable = 'entrance_datas';
    public $primaryKey = 'ID';
    
    //出社・退社情報入力画面のバリデーション
    public $validate = array(
        'ENT_NAME'=>array(
            'ENT_NAMERule-1'=>array(
                'rule' => 'notBlank',
                'required' =>true,
                'message' =>'必ず入力してください。'
            ),
            'ENT_NAMERule-2'=>array(
                'rule' => array('maxLength',40),
                'required' =>true,
                'message' =>'40文字以内で入力してください。'
            )
        ),
        'ENT_TIME'=>array(
            'rule' => 'notBlank',
            'required' =>true,
            'message' =>'必ず入力してください。'
        ),
        'ENT_COMMENT'=>array(
            'rule' => array('maxLength',400),
            'required' =>true,
            'message' =>'400文字以内で入力してください。'
        ),        
        'LEAVE_NAME'=>array(
            'LEAVE_NAMERule-1'=>array(
                'rule' => 'notBlank',
                'required' =>true,
                'message' =>'必ず入力してください。'
            ),
            'LEAVE_NAMERule-2'=>array(
                'rule' => array('maxLength',40),
                'required' =>true,
                'message' =>'40文字以内で入力してください。'
            )
        ),
        'LEAVE_TIME'=>array(
            'rule' => 'notBlank',
            'required' =>true,
            'message' =>'必ず入力してください。'
        ),
        'LEAVE_COMMENT'=>array(
            'LEAVE_COMMENTRule-1'=>array(
            'rule' => 'notBlank',
            'required' =>true,
            'message' =>'必ず入力してください。'
            ),
            'LEAVE_COMMENTRule-2'=>array(
            'rule' => array('maxLength',100),
            'required' =>true,
            'message' =>'100文字以内で入力してください。'
            )
        ),
        'LEAVE_CLEAR' => array(
            'rule'     => array('comparison', '!=', 0),
            'required' => true,
            'message' => '必ず選択してください。'      
        ),
        'LEAVE_WINDOW' => array(
            'rule'     => array('comparison', '!=', 0),
            'required' => true,
            'message' => '必ず選択してください。'      
        ),
        'LEAVE_PRINTER' => array(
            'rule'     => array('comparison', '!=', 0),
            'required' => true,
            'message' => '必ず選択してください。'      
        ),
        'LEAVE_HUMID' => array(
            'rule'     => array('comparison', '!=', 0),
            'required' => true,
            'message' => '必ず選択してください。'      
        ),
        'LEAVE_FAX' => array(
            'rule'     => array('comparison', '!=', 0),
            'required' => true,
            'message' => '必ず選択してください。'      
        ),
        'LEAVE_AIRCON' => array(
            'rule'     => array('comparison', '!=', 0),
            'required' => true,
            'message' => '必ず選択してください。'      
        ),
        'LEAVE_SEAIRCON' => array(
            'rule'     => array('comparison', '!=', 0),
            'required' => true,
            'message' => '必ず選択してください。'      
        ),
        'LEAVE_LIGHT' => array(
            'rule'     => array('comparison', '!=', 0),
            'required' => true,
            'message' => '必ず選択してください。'      
        ),
        'LEAVE_KEY'=>array(
            'rule' => 'notBlank',
            'required' => true
        )
    );
}