<?php
App::uses('Category', 'Model');

class CreateCategoriesTable extends CakeMigration {

    /**
     * Migration description
     *
     * @var string
     */
    public $description = 'create_categories_table';

    /**
     * Actions to be performed
     *
     * @var array $migration
     */
    public $migration = array(
        'up' => array(
            'create_table' => array(
                'categories' => array(
                    'id' => array(
                        'type' => 'integer',
                        'null' => false,
                        'default' => null,
                        'length' => 36,
                        'key' => 'primary',
                    ),
                    'name' => array(
                        'type' => 'string',
                        'null' => false,
                        'default' => null
                    ),
                      'created' => array(
                        'type' => 'datetime'
                    ),
                    'modified' => array(
                        'type' => 'datetime'
                    ),
                    'tableParameters' => array(
                        'engine' => 'InnoDB',
                        'charset' => 'utf8',
                        'collate' => 'utf8_general_ci'
                    ),
                ),
            ),
        ),
        'down' => array(
            'drop_table' => array(
                'categories',
            ),
        ),
    );

    /**
     * Before migration callback
     *
     * @param string $direction Direction of migration process (up or down)
     * @return bool Should process continue
     */
    public function before($direction) {
        return true;
    }

    /**
     * After migration callback
     *
     * @param string $direction Direction of migration process (up or down)
     * @return bool Should process continue
     */
    public function after($direction) {
        if($direction === 'up'){
            $datas = [
                [
                    'id'=>1,
                    'name' => 'Web/システム開発'
                ],
                [
                    'id'=>2,
                    'name' => 'アプリ開発'
                ],
                [
                    'id'=>3,
                    'name' => '運用・保守'
                ],
                [
                    'id'=>4,
                    'name' => 'デザイン'
                ],
                [
                    'id'=>5,
                    'name' => 'ゲーム'
                ],
            ];
            
            foreach ($datas as $data){
                $category = new Category();
                $category->save($data);
            }
        }
        return true;
    }

}
