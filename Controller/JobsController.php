<?php

App::uses('AppController', 'Controller');

/**
 * Posts Controller
 *
 * @property Post $Post
 * @property PaginatorComponent $Paginator
 * @property SequirityComponent $Sequirity
 * @property AuthComponent $Auth
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class JobsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session', 'Flash');

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function isAuthorized($user) {
        // action配列の中に以下のアクションが含まれていたら
        if (in_array($this->action, ['index', 'view', 'add', 'delete'])) {
//            trueを返す(roleがadminでもuserでもそのactionにアクセスできる)
            return true;
        }
        //それ以外のactionの場合は､管理者adminだけがアクセスできる
        if ($user['role'] === 'admin') {
            return true;
        }

        return false;
    }

    /**
     * index method
     *
     * @return void
     */
      public $paginate = array(
//        'limit' => 6,
//        'contain' => array('Post')
    );
    
    
    public function index() {
        $this->Job->recursive = 0;

        $this->paginate = $this->Job->getRecent(); // paginateプロパティ　
        $jobs = $this->paginate('Job'); // こっちはpaginateメソッド
       
        
        $this->set('jobs' , $jobs);
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Job->exists($id)) {
            throw new NotFoundException(__('Invalid post'));
        }
        $options = array('conditions' => array('Job.' . $this->Job->primaryKey => $id));
        $this->set('job', $this->Job->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        //フォームが送信されたら
        if ($this->request->is('post')) {
            //空にして
            $this->Job->create();

            //正しくデータが保存されたら
            if ($this->Job->save($this->request->data)) {
                $this->Flash->success('求人案件が新規追加されました.');
                return $this->redirect(array('action' => 'index'));
            } else {
                //正しくデータが保存されなかったら
            }
            $this->Flash->danger('求人案件が正常に保存されませんでした､再度追加をしてください.');
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {

        //JobモデルのDBにそのidが存在しなかったら
        if (!$this->Job->exists($id)) {
            throw new NotFoundException(__('Invalid post'));
        }
        
        
        
        //JobモデルのDBにそのidが存在して
        //フォームがpostかputで送信されて
        if ($this->request->is(array('post', 'put'))) {
            //$idをidに代入します
            $this->Job->id = $id;

            //フォームからの送信データがDBに保存されたら
            if ($this->Job->save($this->request->data)) {
                $this->Flash->success('編集内容は正常に保存されました');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->danger('編集内容は保存されませんでした｡再度編集しなおしてください');
            }
            //GETで来たときは
        } else {
            $options = array('conditions' => array('Job.' . $this->Job->primaryKey => $id));
            $this->request->data = $this->Job->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Job->id = $id;
        if (!$this->Job->exists()) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Job->delete()) {
            $this->Flash->success('求人案件が削除されました｡');
        } else {
            $this->Flash->danger(__('求人案件は削除されませんでした｡もう一度実行してください｡'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
