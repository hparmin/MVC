<?php
namespace application\model;
use PDO;
use Exception;

class User extends Model
{
    public function all()
    {
        $query="SELECT * FROM users_tbl";
        return $this->query($query)->fetchAll(PDO::FETCH_OBJ);
    }

    public function find($id)
    {
        $query="SELECT * FROM users_tbl WHERE username=?";
        return $this->query($query,[$id])->fetch(PDO::FETCH_OBJ);
    }

    public function insert($values)
    {
        $query="INSERT INTO users_tbl (username,password) VALUES (?,?)";
        $this->execute($query,array_values($values));
    }

    public function update($values,$id)
    {
        $query="UPDATE users_tbl SET username=? , password=? WHERE id=?";
        $this->execute($query,array_merge(array_values($values),[$id]));
    }

    public function delete($id)
    {
        $query="DELETE FROM users_tbl WHERE id=?";
        $this->execute($query,[$id]);
    }
}
