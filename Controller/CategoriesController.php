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
class CategoriesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Session', 'Flash');

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function isAuthorized($user) {
        // action配列の中に以下のアクションが含まれていたら
        if (in_array($this->action, ['index', 'view'])) {
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
    public function index() {
        //Group のデータとそのドメインを取得します
        $this->Category->recursive = 0;

        $categories = $this->Category->find('all');
        $this->set('categories', $categories);
       
//
//        $this->paginate = $this->Post->getRecent(); // paginateプロパティ　
//        $posts = $this->paginate('Post'); // こっちはpaginateメソッド
//        $this->set('categories' , $categories);
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
//    public function view($id = null) {
//        if (!$this->Post->exists($id)) {
//            throw new NotFoundException(__('Invalid post'));
//        }
//        $options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
//        $this->set('category', $this->Category->find('first', $options));
//    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        //フォームが送信されたら
        if ($this->request->is('post')) {
            //空にして
            $this->Category->create();

            //正しくデータが保存されたら
            if ($this->Category->save($this->request->data)) {
                $this->Flash->success('カテゴリが新規追加されました.');
                return $this->redirect(array('action' => 'index'));
            } else {
                //正しくデータが保存されなかったら
            }
            $this->Flash->danger('カテゴリが正常に保存されませんでした､再度追加をしてください.');
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

        //CategoryモデルのDBにそのidが存在しなかったら
        if (!$this->Category->exists($id)) {
            throw new NotFoundException(__('Invalid post'));
        }
        //CategoryモデルのDBにそのidが存在して
        //フォームがpostかputで送信されて
        if ($this->request->is(array('post', 'put'))) {
            //$idをidに代入します
            $this->Category->id = $id;

            //フォームからの送信データがDBに保存されたら
            if ($this->Category->save($this->request->data)) {
                $this->Flash->success('編集内容は正常に保存されました');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->danger('編集内容は保存されませんでした｡再度編集しなおしてください');
            }
            //GETで来たときは
        } else {
            //検索条件をidに指定する｡ 
            $options = array('conditions' => array('Category.' . $this->Post->primaryKey => $id));
            $this->request->data = $this->Category->find('first', $options);
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
        $this->Category->id = $id;
        if (!$this->Category->exists()) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Category->delete()) {
            $this->Flash->success('カテゴリが削除されました｡');
        } else {
            $this->Flash->danger(__('カテゴリは削除されませんでした｡もう一度実行してください｡'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
