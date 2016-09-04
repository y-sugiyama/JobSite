<?php

App::uses('AppModel', 'Model');
App::uses('Job', 'Model');

/**
 * Post Model
 *
 */
class Area extends AppModel {

    public $validate = array(
        //フィールド名
        'name' => array(
            //バリデーションの名前
            'Blank' => array(
                //バリデーションのルール
                'rule' => array('notBlank'),
                //データ配列にkey(この場合はname)が存在することを必要とする
                'required' => 'true',
                'message' => '入力されていません',
            ),
        ),
        
        
    );
    
       //$hasmany プロパティに アソシエーション先のモデルのクラス名の文字列を指定する
    //  Areaモデルから Jobにアクセスできるように
       public $hasMany = [
           'Job'=>[
               'className' => 'Job',
                'foreignKey' => 'area_id'
           ]];



    /**
     * Display field
     *
     * @var string
     */
    //データベースのnameフィールドをレコードの表題 (label) として 使う
    public $displayField = 'name';

   

}
