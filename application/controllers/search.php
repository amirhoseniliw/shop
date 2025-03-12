<?php

namespace application\controllers;

use Application\Controllers\Controller;
use application\model\Products as ProductsModel;
use application\model\panel\Category as CategoryModel;

class search extends Controller
{
    public function index($type_posts)
    {
        if (!isset($name)) {
            $name = str_replace("%", "", $_SESSION['name']);
        }
        if (isset($_POST['text_search'])) {
            $name = $_POST['text_search'];

            $_SESSION['name'] = "%$name%";
        }
        if ($name == "") {
            $name_status = "ALL_POSTS";
        } else {
            $name_status = "find_POSTS";
        }


        $count_posts = new ProductsModel;
        $count_posts = $count_posts->count_all();
        $category = new ProductsModel();
        $categories = $category->category();
        $search_name =  $_SESSION['name'];
        switch ($type_posts) {
            case 'expensive':
                 // $posts = new ProductsModel();
                // $posts = $posts->find_for_search($search_name);
                break;
            case 'cheap':
                    // $posts = new ProductsModel();
                // $posts = $posts->find_for_search($search_name);
             break;
            case 'Bestseller':
                    // $posts = new ProductsModel();
                // $posts = $posts->find_for_search($search_name);
             break;

            case 'selected':
                // $posts = new ProductsModel();
                // $posts = $posts->find_for_search($search_name);
             break;
            case 'view':
                // $posts = new ProductsModel();
                // $posts = $posts->find_for_search($search_name);
             break;

            default:
                echo "عدد نامشخص است";
        }
        $posts = new ProductsModel();
        $posts = $posts->find_for_search($search_name);
        return $this->view("app.orther.search", compact('posts', 'name', 'name_status', 'count_posts', 'categories'));
    }

    public function search_type()
    {
        $posts = new ProductsModel();
        $posts = $posts->all();
        return $this->view("app.orther.category", compact('posts'));
    }
    public function category()
    {
        $posts = new ProductsModel();
        $posts = $posts->all();
        return $this->view("app.orther.category", compact('posts'));
    }
}
