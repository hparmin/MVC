<?php
namespace application\model;
use PDO;
use Exception;

class Products extends Model
{
    public function all()
    {
        $query="SELECT * FROM products_tbl";
        return $this->query($query)->fetchAll(PDO::FETCH_OBJ);
    }

    public function find($id)
    {
        $query="SELECT * FROM products_tbl WHERE id=?";
        return $this->query($query,[$id])->fetch(PDO::FETCH_OBJ);
    }

    public function insert($values)
    {
        $query="INSERT INTO products_tbl (title,text,price) VALUES (?,?,?)";
        $this->execute($query,array_values($values));
    }

    public function update($values,$id)
    {
        $query="UPDATE products_tbl SET title=? ,text=? ,price=? WHERE id=?";
        $this->execute($query,array_merge(array_values($values),[$id]));
    }

    public function delete($id)
    {
        $query="DELETE FROM products_tbl WHERE id=?";
        $this->execute($query,[$id]);
    }
}
