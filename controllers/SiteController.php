<?php
/**
 * Created by PhpStorm.
 * User: glebkalachev
 * Date: 2019-03-17
 * Time: 23:57
 */

class SiteController
{
    public function actionIndex()
    {

        include_once(ROOT . '/view/main/index.php');
        return true;
    }
}