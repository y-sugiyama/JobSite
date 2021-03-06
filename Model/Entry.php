<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Entry extends AppModel {

    //useTable プロパティでデータベースのテーブル名を指定するが､
    //データベース・テーブルをこのモデルで使いたくないので､false を指定
    public $useTable = false;
    public $_schema = array(
        'name' => array('type' => 'string', 'length' => 255),
        'email' => array('type' => 'string', 'length' => 255),
        'age' => array('type' => 'string', 'length' => 255),
        'tel' => array('type' => 'string', 'length' => 255),
        'address' => array('type' => 'string', 'length' => 255),
        'subject' => array('type' => 'string', 'length' => 255),
        'body' => array('type' => 'text'),
    );
    public $validate = array(
        //フィールド名
        'name' => array(
            //バリデーションの名前
            'notBlank' => array(
                //バリデーションのルール
                'rule' => array('notBlank'),
                'message' => '未入力です。',
                'required' => true,
            ),
            //バリデーションの名前
            'maxLength' => array(
                //バリデーションのルール
                'rule' => array('maxLength', 255),
                'message' => '255文字以内で入力してくだい。',
                'required' => true,
            ),
        ),
        //フィールド名
        'email' => array(
            //バリデーションの名前
            'notBlank' => array(
                //バリデーションのルール
                'rule' => array('notBlank'),
                'message' => '未入力です。',
                'required' => true,
            ),
            //バリデーションの名前
            'email' => array(
                //バリデーションのルール
                'rule' => array('email'),
                'message' => 'メールアドレス以外が入力されています。',
                'required' => true,
            ),
            //バリデーションの名前
            'maxLength' => array(
                //バリデーションのルール
                'rule' => array('maxLength', 255),
                'message' => '255文字以内で入力してくだい。',
                'required' => true,
            ),
        ),
        //フィールド名
        'age' => array(
            //バリデーションの名前
            'notBlank' => array(
                //バリデーションのルール
                'rule' => array('notBlank'),
                'message' => '未入力です。',
                'required' => true,
            ),
            //バリデーションの名前
            'maxLength' => array(
                //バリデーションのルール
                'rule' => array('maxLength', 255),
                'message' => '255文字以内で入力してくだい。',
                'required' => true,
            ),
        ),
        //フィールド名
        'subject' => array(
            //バリデーションの名前
            'notBlank' => array(
                //バリデーションのルール
                'rule' => array('notBlank'),
                'message' => '未入力です。',
                'required' => true,
            ),
            //バリデーションの名前
            'maxLength' => array(
                //バリデーションのルール
                'rule' => array('maxLength', 255),
                'message' => '255文字以内で入力してくだい。',
                'required' => true,
            ),
        ),
        //フィールド名
        'tel' => array(
            //バリデーションの名前
            'notBlank' => array(
                //バリデーションのルール
                'rule' => array('notBlank'),
                'message' => '未入力です。',
                'required' => true,
            ),
            //バリデーションの名前
            'maxLength' => array(
                //バリデーションのルール
                'rule' => array('maxLength', 255),
                'message' => '255文字以内で入力してくだい。',
                'required' => true,
            ),
        ),
        //フィールド名
        'address' => array(
            //バリデーションの名前
            'notBlank' => array(
                //バリデーションのルール
                'rule' => array('notBlank'),
                'message' => '未入力です。',
                'required' => true,
            ),
            //バリデーションの名前
            'maxLength' => array(
                //バリデーションのルール
                'rule' => array('maxLength', 255),
                'message' => '255文字以内で入力してくだい。',
                'required' => true,
            ),
        ),
        //フィールド名
        'body' => array(
            //バリデーションの名前
            'notBlank' => array(
                //バリデーションのルール
                'rule' => array('notBlank'),
                'message' => '未入力です。',
                'required' => true,
            ),
            //バリデーションの名前
            'maxLength' => array(
                //バリデーションのルール
                'rule' => array('maxLength', 3000),
                'message' => '3000文字以内で入力してくだい。',
                'required' => true,
            ),
        ),
    );

}
