<?php

App::uses('Job', 'Model');

class CreateJobsTable extends CakeMigration {

    /**
     * Migration description
     *
     * @var string
     */
    public $description = 'create_jobs_table';

    /**
     * Actions to be performed
     *
     * @var array $migration
     */
    public $migration = array(
        'up' => array(
            'create_table' => array(
                'jobs' => array(
                    'id' => array(
                        'type' => 'integer',
                        'null' => false,
                        'default' => null,
                        'length' => 36,
                        'key' => 'primary',
                    ),
                    'title' => array(
                        'type' => 'string',
                        'null' => false,
                        'default' => null
                    ),
                    'description' => array(
                        'type' => 'text',
                        'null' => false,
                        'default' => null
                    ),
                    'categori_id' => array(
                        'type' => 'integer',
                        'null' => false,
                        'default' => null,
                        'length' => 36,
                        'key' => 'foreign',
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
                'jobs',
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
                    'title' => 'デザイナー募集',
                    'description' => '株式会社シマウマでは､以下の要項でデザイナーを'
                    . '募集いたします｡年収800万円 募集人数１名 スキルセット◯◯◯◯◯◯',
                    'categori_id'=>1,
                    'created' => '2016-08-27'
                ],
                [
                    'title' => 'エンジニア募集',
                    'description' => '株式会社まるい政策研究所では､'
                    . '以下の要項でエンジニアを募集いたします｡年収800万円 '
                    . '募集人数１名 スキルセット◯◯◯◯◯◯',
                    'categori_id'=>2,
                    'created' => '2016-08-28'
                ],
                [
                    'title' => 'クリエイター募集',
                   'description' => '株式会社ぱんだメディアでは､'
                    . '以下の要項でクリエイターを募集いたします｡'
                    . '年収800万円 募集人数１名 スキルセット◯◯◯◯◯◯',
                    'categori_id'=>3,
                    'created' => '2016-08-29'
                ],
                 [
                    'title' => 'クリエイター募集',
                   'description' => '株式会社ぱんだメディアでは､'
                    . '以下の要項でクリエイターを募集いたします｡'
                    . '年収800万円 募集人数１名 スキルセット◯◯◯◯◯◯',
                     'categori_id'=>4,
                    'created' => '2016-08-27'
                ],
                [
                    'title' => 'エンジニア募集',
                    'description' => '株式会社まるい政策研究所では､'
                    . '以下の要項でエンジニアを募集いたします｡年収800万円 '
                    . '募集人数１名 スキルセット◯◯◯◯◯◯',
                    'categori_id'=>1,
                    'created' => '2016-08-26'
                ],
                 [
                    'title' => 'デザイナー募集',
                    'description' => '株式会社シマウマでは､以下の要項でデザイナーを'
                    . '募集いたします｡年収800万円 募集人数１名 スキルセット◯◯◯◯◯◯',
                     'categori_id'=>2,
                    'created' => '2016-08-25'
                ],
                 [
                    'title' => 'アーキテクト募集',
                    'description' => '株式会社カピパラでは､以下の要項でデザイナーを'
                    . '募集いたします｡年収800万円 募集人数１名 スキルセット◯◯◯◯◯◯',
                     'categori_id'=>3,
                    'created' => '2016-08-23'
                ],
                ];
                foreach ($datas as $data){
                    $job = new Job();
                    $job->save($data);
                }
        }
        return true;
    }

}
