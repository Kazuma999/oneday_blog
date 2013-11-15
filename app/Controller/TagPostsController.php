<?php
App::uses('AppController', 'Controller');
/**
 * TagPosts Controller
 *
 * @property TagPost $TagPost
 * @property PaginatorComponent $Paginator
 */
class TagPostsController extends AppController {

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
		$this->TagPost->recursive = 0;
		$this->set('tagPosts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TagPost->exists($id)) {
			throw new NotFoundException(__('Invalid tag post'));
		}
		$options = array('conditions' => array('TagPost.' . $this->TagPost->primaryKey => $id));
		$this->set('tagPost', $this->TagPost->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TagPost->create();
			if ($this->TagPost->save($this->request->data)) {
				$this->Session->setFlash(__('The tag post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tag post could not be saved. Please, try again.'));
			}
		}
		$tags = $this->TagPost->Tag->find('list');
		$posts = $this->TagPost->Post->find('list');
		$this->set(compact('tags', 'posts'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TagPost->exists($id)) {
			throw new NotFoundException(__('Invalid tag post'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TagPost->save($this->request->data)) {
				$this->Session->setFlash(__('The tag post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tag post could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TagPost.' . $this->TagPost->primaryKey => $id));
			$this->request->data = $this->TagPost->find('first', $options);
		}
		$tags = $this->TagPost->Tag->find('list');
		$posts = $this->TagPost->Post->find('list');
		$this->set(compact('tags', 'posts'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->TagPost->id = $id;
		if (!$this->TagPost->exists()) {
			throw new NotFoundException(__('Invalid tag post'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TagPost->delete()) {
			$this->Session->setFlash(__('The tag post has been deleted.'));
		} else {
			$this->Session->setFlash(__('The tag post could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
