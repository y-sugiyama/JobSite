<?php

App::uses('AppModel', 'Model');
App::uses('Category', 'Model');

/**
 * Post Model
 *
 */
class Job extends AppModel {

    public $validate = array(
        //フィールド名
        'title' => array(
            //バリデーションの名前
            'Blank' => array(
                //バリデーションのルール
                'rule' => array('notBlank'),
                //データ配列にkey(この場合はtitle)が存在することを必要とする
                'required' => 'true',
                'message' => 'タイトルが入力されていません',
            ),
        ),
        //フィールド名
        'description' => array(
            //バリデーションの名前
            'notBlank' => array(
                //バリデーションのルール
                'rule' => array('notBlank'),
                'required' => 'true',
                'message' => '内容が入力されていません',
            ),
        ),
    );
    
   
 
       
            public $belongsTo = array(
        'Category' => array(
            'className' => 'Category',
             'foreignKey' => 'categori_id'
          
        ),
                 'Area' => array(
            'className' => 'Area',
             'foreignKey' => 'area_id'
          
        )
         );

    /**
     * Display field
     *
     * @var string
     */
     //データベースのtitleフィールドをレコードの表題 (label) として 使う
    public $displayField = 'title';

    //getRecentメソッドは$optionを返します
    public function getRecent($limit=null) {

        $option = array(
            //作成日が新しい順に並べます
            'order' => array('created' => 'desc'),
            
            );
        //
         if($limit!==null){
                $option['limit'] = $limit;
           
            }
  
         
        return $option;
    }

}
