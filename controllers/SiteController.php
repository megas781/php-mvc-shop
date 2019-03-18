<?php
/**
 * Created by PhpStorm.
 * User: glebkalachev
 * Date: 2019-03-17
 * Time: 23:57
 */
include_once ROOT . '/models/CategoriesModel.php';

class SiteController
{
    public function actionIndex()
    {

        $categories = CategoriesModel::getCategoriesList();

//        echo "<pre>";
//        print_r($categories);
//        echo "</pre>";

        include_once(ROOT . '/view/site/index.php');
        return true;
    }
}