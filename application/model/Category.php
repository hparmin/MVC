<?php
namespace application\model;
use PDO;
use Exception;

class Category extends Model
{
    public function all()
    {
        $query="SELECT * FROM category_tbl";
        return $this->query($query)->fetchAll(PDO::FETCH_OBJ);
    }

    public function find($id)
    {
        $query="SELECT * FROM category_tbl WHERE id=?";
        return $this->query($query,[$id])->fetch(PDO::FETCH_OBJ);
    }

    public function insert($values)
    {
        $query="INSERT INTO category_tbl (title) VALUES (?)";
        $this->execute($query,array_values($values));
    }

    public function update($values,$id)
    {
        $query="UPDATE category_tbl SET title=? WHERE id=?";
        $this->execute($query,array_merge(array_values($values),[$id]));
    }

    public function delete($id)
    {
        $query="DELETE FROM category_tbl WHERE id=?";
        $this->execute($query,[$id]);
    }
}
