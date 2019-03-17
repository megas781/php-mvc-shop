<?php
/**
 * Created by PhpStorm.
 * User: glebkalachev
 * Date: 2019-03-18
 * Time: 00:38
 */

class CategoriesModel
{
    public static function getCategoriesList()
    {


        $pdo = Database::getPdoConnection();
        $categories = $pdo->query("select category_id, category_name, status from mvc_shop_categories order by sort_order asc ")->fetchAll();

        return $categories;
    }
}