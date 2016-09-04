<?php
App::uses('Area', 'Model');

class CreateAreaTable extends CakeMigration {

    /**
     * Migration description
     *
     * @var string
     */
    public $description = 'create_area_table';

    /**
     * Actions to be performed
     *
     * @var array $migration
     */
    public $migration = array(
        'up' => array(
            'create_table' => array(
                'areas' => array(
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
                'areas',
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
        if ($direction === 'up') {

            $datas = [
                [
                    'id' => 1,
                    'name' => '東京都'
                ],
                [
                    'id' => 2,
                    'name' => '神奈川県'
                ],
                [
                    'id' => 3,
                    'name' => '千葉県'
                ],
                [
                    'id' => 4,
                    'name' => '埼玉県'
                ],
            ];

            foreach ($datas as $data) {
                $area = new Area();
                $area->save($data);
            }
        }
        return true;
    }

}
