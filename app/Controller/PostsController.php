<?php
App::uses('AppController', 'Controller');
/**
 * Posts Controller
 *
 * @property Post $Post
 * @property PaginatorComponent $Paginator
 */
class PostsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		// recursiveは関連付けのあるテーブルの情報をどこまで取ってくるかの数値
		// 0 だと hasOne, belongsToのテーブル情報まで取得
		// Postの場合、Category, User情報まで取ってくる
		$this->Post->recursive = 0;
		// ページャ付き記事一覧を、$postsという変数名としてViewに渡す
		$posts = $this->Paginator->paginate(); //page情報あり
		$this->set('posts', $posts);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		// Modelクラスのfindメソッドを呼ぶときのオプション
		// 「Postのプライマリーキー(サロゲートキー)が$idと一致する」という条件を表す
		// find: Modelクラスで実際にDBからレコードを取得するときのメソッド
		// 第一引数はどんな形で取ってくるか指定する引数で、主に以下のものがある
		// - first: 条件に該当する最初にヒットしたレコードを返す (単数)
		// - all: 条件に該当するレコード全てを返す (複数)
		// - list: idとnameだけを返す (複数)
		// recursive = 1
		// hasManyも呼ぶ ()
		$post = $this->Post->find('first', array(
			'conditions' => array(
				'Post.' . $this->Post->primaryKey => $id
			)
		));
		$this->set('post', $post);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			// フォームでデータを送った場合 (POSTデータがある場合) 初回表示ではここは実行されない
			// モデルにデータを格納する前に行なう初期化 (毎回やってください。特にループでsaveする場合)
			$this->Post->create();
			// $this->request->data: Cakephpでフォームを使って送られたデータはこの変数に格納される
			if ($this->Post->save($this->request->data)) { // 成功した場合
				// セッションメッセージを確保
				$this->Session->setFlash(__('The post has been saved.'));
				// 一覧ページにリダイレクト
				return $this->redirect(array('action' => 'index'));
			} else { // 保存に失敗した場合
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
			}
		}
		// 全てのカテゴリリストを取得
		$categories = $this->Post->Category->find('list');
		// 全てのユーザーリストを取得
		$users = $this->Post->User->find('list');
		// $categories, $usersをそのまま、Viewに渡す
		$this->set(compact('categories', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		// $idのレコードがなかった場合
		if (!$this->Post->exists($id)) {
			// これはおかしいという例外を投げて処理終了
			throw new NotFoundException(__('Invalid post'));
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			// もし POST もしくは PUTでデータが送信されていたら (フォーム経由)
			if ($this->Post->save($this->request->data)) {
				// 送信されたデータの保存に成功した場合
				// saveメソッドは、Create, Update両方に対応
				// $this->request->data['Post']['id']が設定されている場合はレコード上書き(update)
				// id指定がなければ、新規作成(create)
				$this->Session->setFlash(__('The post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
			}
		} else {
			// 初回表示であれば、$idに一致するレコードを取得し、$this->request->dataに格納
			$this->request->data = $this->Post->find('first', array(
				'conditions' => array(
					'Post.' . $this->Post->primaryKey => $id
				)
			));
		}
		$categories = $this->Post->Category->find('list');
		$users = $this->Post->User->find('list');
		$this->set(compact('categories', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		// そのレコードホントに存在する？
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		// POST, DELETEしか受け付けない (HTTPメソッド)
		$this->request->onlyAllow('post', 'delete');
		// 削除
		if ($this->Post->delete()) {
			// 成功した場合
			$this->Session->setFlash(__('The post has been deleted.'));
		} else {
			// 失敗した場合
			$this->Session->setFlash(__('The post could not be deleted. Please, try again.'));
		}
		// 一覧へリダイレクト
		return $this->redirect(array('action' => 'index'));
	}}
