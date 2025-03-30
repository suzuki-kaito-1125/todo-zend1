<?php
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initDb()
    {
        try {
            // DBアダプタを取得
            $resource = $this->getPluginResource('db');
            $db = $resource->getDbAdapter();

            // デフォルトアダプタとして設定
            if ($db) {
                Zend_Db_Table::setDefaultAdapter($db);
                error_log("DB アダプタが設定されました。");

                // ✅ 接続確認
                $db->getConnection(); // 明示的に接続を試みる
                error_log("DB 接続成功！");
            } else {
                error_log("DB アダプタが取得できませんでした。");
            }
            return $db;
        } catch (Exception $e) {
            error_log("DB 接続失敗: " . $e->getMessage());
            return null;
        }
    }

    protected function _initView()
    {
        $view = new Zend_View();
        $view->doctype('HTML5');
        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('ViewRenderer');
        $viewRenderer->setView($view);
        $layout = Zend_Layout::startMvc(array(
            'layoutPath' => APPLICATION_PATH . '/layouts/scripts/',
            'layout' => 'layout'
        ));
        return $view;
    }

    protected function _initViewHelpers()
    {
        $view = $this->getResource('view');

        // デフォルトのタイトル設定
        $view->headTitle('TODO');
    }
}
