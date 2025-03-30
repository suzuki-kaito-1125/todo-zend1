<?php
require_once APPLICATION_PATH . '/models/Todo.php';

class TodoController extends Zend_Controller_Action
{
  protected $todoModel;

  public function init()
  {
    $this->todoModel = new Todo();  // モデルをインスタンス化
  }

  // Todoリストの表示
  public function indexAction()
  {
    $this->view->todos = $this->todoModel->fetchAllTodos();
  }

  // Todo追加
  public function addAction()
  {
    try {
      if ($this->getRequest()->isPost()) {
        $data = [
          'title' => $this->getParam('title'),
          'completed' => 0,
        ];
        $this->todoModel->save($data);
        $this->redirect('/todo');
      }
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  // Todoの更新
  public function updateAction()
  {
    try {
      $id = $this->getParam('id');
      $data = [
        'title' => $this->getParam('title'),
      ];
      $this->todoModel->update($id, $data);
      $this->redirect('/todo');
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  // Todoの削除
  public function deleteAction()
  {
    try {
      $id = $this->getParam('id');
      $this->todoModel->delete($id);
      $this->redirect('/todo');
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  // Todoを完了にする
  public function completeAction()
  {
    try {
      $id = $this->getParam('id');
      $this->todoModel->markCompleted($id);
      $this->redirect('/todo');
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  // Todoを未完了にする
  public function incompleteAction()
  {
    try {
      $id = $this->getParam('id');
      $this->todoModel->markIncomplete($id);
      $this->redirect('/todo');
    } catch (\Throwable $th) {
      throw $th;
    }
  }
}
