<?php
class Todo
{
  protected $_dbTable;

  public function __construct()
  {
    $this->_dbTable = new Zend_Db_Table('todos');
  }

  public function fetchAllTodos()
  {
    return $this->_dbTable->fetchAll();
  }

  public function save($data)
  {
    $this->_dbTable->save($data);
  }

  public function delete($id)
  {
    $this->_dbTable->delete('id = ' . (int)$id);
  }

  public function update($id, $data)
  {
    $this->_dbTable->update($data, 'id = ' . (int)$id);
  }
}
