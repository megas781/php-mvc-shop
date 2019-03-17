<?php
/**
 * Created by PhpStorm.
 * User: glebkalachev
 * Date: 2019-03-17
 * Time: 23:58
 */

class ProductsController
{
    public function __construct()
    {

    }

    public function actionView($productId)
    {


        echo $productId;

        include_once ROOT . '/view/product-details/product-details.php';

        return true;
    }
}