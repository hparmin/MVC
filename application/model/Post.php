<?php
namespace application\model;
use PDO;
use Exception;

class Post extends Model
{
    public function all()
    {
        $query="SELECT * FROM post_tbl";
        return $this->query($query)->fetchAll(PDO::FETCH_OBJ);
    }

    public function find($id)
    {
        $query="SELECT * FROM post_tbl WHERE id=?";
        return $this->query($query,[$id])->fetch(PDO::FETCH_OBJ);
    }

    public function category_find($id)
    {
        $query="SELECT * FROM post_tbl WHERE FIND_IN_SET(?, cat_id)";
        return $this->query($query,[$id])->fetchAll(PDO::FETCH_OBJ);
    }

    public function insert($values)
    {
        $query="INSERT INTO post_tbl (title,text,cat_id,date) VALUES (?,?,?,now())";
        $this->execute($query,array_values($values));
    }

    public function update($values,$id)
    {
        $query="UPDATE post_tbl SET title=? , text=? , cat_id=? WHERE id=?";
        $this->execute($query,array_merge(array_values($values),[$id]));
    }

    public function delete($id)
    {
        $query="DELETE FROM post_tbl WHERE id=?";
        $this->execute($query,[$id]);
    }
}

