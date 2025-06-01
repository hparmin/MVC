<?php
namespace application\model;
use PDO;
use Exception;
class Model
{
    protected $pdo;
    public function __construct()
    {
        $server = "mysql:host=localhost;dbname=mvc_db";
        $dbuser = "root";
        $dbpass = "";
        try {
            $this->pdo = new PDO($server, $dbuser, $dbpass);
        } catch (exception $e) {
            echo $e->getMessage();
        }
        $create_db_if_not_exists_query = "CREATE DATABASE IF NOT EXISTS `mvc_db`;";
        $create_db_if_not_exists_prepare = $this->pdo->prepare($create_db_if_not_exists_query);
        $create_db_if_not_exists_prepare -> execute();

        // create users_tbl table (if not exists):
        $create_users_tbl_if_not_exists_query = "CREATE TABLE IF NOT EXISTS users_tbl(
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(100) NOT NULL,
            password VARCHAR(100) NOT NULL
        );";
        $users_query_res = $this->pdo->prepare($create_users_tbl_if_not_exists_query);
        $users_query_res -> execute();

        // create post_tbl table (if not exists):
        $create_post_tbl_if_not_exists_query = "CREATE TABLE IF NOT EXISTS post_tbl(
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(100) NOT NULL,
            text TEXT,
            cat_id VARCHAR(255),
            date DATE
        );";
        //$this->execute($create_post_tbl_if_not_exists_query);
        $query_res = $this->pdo->prepare($create_post_tbl_if_not_exists_query);
        $query_res -> execute();

        // create category_tbl table (if not exists):
        $create_category_tbl_if_not_exists_query = "CREATE TABLE IF NOT EXISTS category_tbl(
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(100) NOT NULL
        );";
        //$this->execute($create_category_tbl_if_not_exists_query);
        $category_query_res = $this->pdo->prepare($create_category_tbl_if_not_exists_query);
        $category_query_res -> execute();

        // create products_tbl table (if not exists):
        $create_products_tbl_if_not_exists_query = "CREATE TABLE IF NOT EXISTS products_tbl(
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(100) NOT NULL,
            text TEXT,
            price VARCHAR(100)
        );";
        //$this->execute($create_category_tbl_if_not_exists_query);
        $products_query_res = $this->pdo->prepare($create_products_tbl_if_not_exists_query);
        $products_query_res -> execute();
    }

    protected function query($sql,$filter=null){
        try {
            if ($filter==null){
                return $this->pdo->query($sql);
            }
            else{
                $res = $this->pdo->prepare($sql);
                $res->execute($filter);
                return $res;
            }
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }


    protected function execute($sql,$filter=null){
        try {
            if ($filter == null){
                $this->pdo->exec($sql);
            }else{
                $res = $this->pdo->prepare($sql);
                $res ->execute($filter);
            }
        }catch (Exception $e){
            echo $e ->getMessage();
        }
    }
}