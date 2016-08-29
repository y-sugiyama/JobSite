<?php

App::uses('AppModel', 'Model');

/**
 * Post Model
 *
 */
class Category extends AppModel {

    public $validate = array(
        //フィールド名
        'name' => array(
            //バリデーションの名前
            'Blank' => array(
                //バリデーションのルール
                'rule' => array('notBlank'),
                //データ配列にkey(この場合はname)が存在することを必要とする
                'required' => 'true',
                'message' => 'タイトルが入力されていません',
            ),
        ),
        
        
    );

    /**
     * Display field
     *
     * @var string
     */
    //データベースのnameフィールドをレコードの表題 (label) として 使う
    public $displayField = 'name';

   

}
