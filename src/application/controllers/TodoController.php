<?php
class TodoController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $this->view->message = "Todo!";
    }
}
