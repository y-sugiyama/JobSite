<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class EntryController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
        //このアクションではfront.ctpのレイアウトを使います
        $this->layout = 'front';
    }

    public $components = array('Paginator'
    );

    public function isAuthorized($user) {
        // action配列の中に以下のアクションが含まれていたら
        if (in_array($this->action, ['contact', 'sendContact'])) {
//            trueを返す(roleがadminでもuserでもそのactionにアクセスできる)
            return true;
        }
        //それ以外のactionの場合は､管理者adminだけがアクセスできる
        if ($user['role'] === 'admin') {
            return true;
        }

        return false;
    }

    public function contact() {
        
        //再編集で戻ってきたとき(getできた時)
        //Sessionを読み込んで変数contactにいれる
        $contact = $this->Session->read('Entry');
        //変数contactがNULLでなければ(セッションに値が入っているとき)
        if($contact!==NULL && empty($this->request->data)){
            //変数contactの値をフォームに代入する
            $this->request->data['Entry'] = $contact;
        }

        //postでフォームが送信されたら
        if ($this->request->is('post')) {
            
            //フォームに入力された値をセットして
            $this->Entry->set($this->request->data);
            
       

            //フォームから受け取ったデータをバリデーション
            if ($this->Entry->validates()) {
                  
                //検証がOkならSessionへフォームに入力されたデータを書き込む
                $this->Session->write('Entry', $this->request->data['Entry']);
                $this->redirect(array('action' => 'confirm'));
            }
            $this->Flash->danger('入力内容に不備があります。');
        }
    }

    public function confirm() {
          
        //Sessionを読み込んで変数contactにいれる(getできた時)
        $contact = $this->Session->read('Entry');
        //getできたら値を$contactにセットする
        $this->set('contact', $contact);
      

        if ($this->request->is('post')) {
            //Sessionを渡す
            if ($this->sendContact($contact)) {
                $this->Flash->success('お問い合わせを受け付けました。');
                    //sessionを破棄する
                $this->Session->delete('Entry');
                //それからリダイレクトする
                $this->redirect(array('action' => 'finished'));
            
            } else {
               
                $this->Flash->danger('エラーが発生しました。');
            }
        }
        
    }

    public function finished() {
        
    }

    private function sendContact($content) {
        //オートローダがクラスを発見できるよう､場所を伝える
        App::uses('CakeEmail', 'Network/Email');
        //CakeEmailクラスでnewしてCakeEmailのコンストラクタでcontactを指定して設定をロード
        $email = new CakeEmail('contact');


        //CakeEmailは属性の代わりにセッターメソッドを使用する
        //すべてのセッターメソッドはクラスのインスタンスを返す
        return $email
                        ->from(array($content['email'] => $content['subject']))
                        //ビューで使う変数をセット
                        ->viewVars($content)
                        //メール分で以下のテンプレートを使用
                        ->template('entry', 'entry')
                        ->send();
    }
    
     public function projects() {
        $this->loadModel('Job');

        //else:  クエリストリングがなにもなければ$conditionには何もいれない
        $conditions = null;
        //'categori_id'が配列で送信されてきたら
        if (isset($this->request->query['categori_id'])) {
            //categori_idにその値を代入する
            $conditions = [
                'categori_id' => $this->request->query['categori_id']
            ];
        }

        $this->Paginator->settings = $this->Job->getRecent(6);
        //cookbook paginateのページに第2引数に$conditionsをとるとのこと
        $jobs = $this->Paginator->paginate('Job', $conditions);


        $this->set('jobs', $jobs);
       
        //タイトル検索
        //リクエストがPOSTの場合
        if ($this->request->is('post')) {
            //Formの値を取得
            $title = $this->request->data['Search']['title'];
         
            //POSTされたデータを曖昧検索
              
            $data = $this->Paginator->paginate('Job', [
                'Job.title like' => '%' . $title . '%'
            ]);

            $this->set('jobs', $data);
            
        } 
        //キーワード検索
         //リクエストがPOSTの場合
        if ($this->request->is('post')) {
            //Formの値を取得
            $keyword = $this->request->data['Search']['title'];
         
            //POSTされたデータを曖昧検索
              
            $text = $this->Paginator->paginate('Job', [
                'Job.description like' => '%' . $keyword . '%'
            ]);

            $this->set('jobs', $text);
            
        } 
    }

    public function view($id = null) {
        $this->loadModel('Job');
        //pages/projectsの｢もっと見る>>｣をおしたらviewに遷移するように
        //$idで値を探して拾ってくる
        if ($this->Job->exists($id)) {
            $job = $this->Job->findById($id);
            $this->set('job', $job);
        }
    }

    

}
