<?php
class Todo
{
  protected $_dbTable;

  public function __construct()
  {
    $this->_dbTable = new Zend_Db_Table('todos');
  }

  // Todoリスト取得
  public function fetchAllTodos()
  {
    return $this->_dbTable->fetchAll();
  }

  // Todo保存
  public function save($data)
  {
    $this->_dbTable->insert($data);
  }

  // Todo削除
  public function delete($id)
  {
    $this->_dbTable->delete('id = ' . (int)$id);
  }

  // Todo更新
  public function update($id, $data)
  {
    $this->_dbTable->update($data, 'id = ' . (int)$id);
  }

  // Todo完了
  public function markCompleted($id)
  {
    return $this->_dbTable->update(['completed' => 1], 'id = ' . (int)$id);
  }

  // Todo未完了
  public function markIncomplete($id)
  {
    return $this->_dbTable->update(['completed' => 0], 'id = ' . (int)$id);
  }
}
