<?php

include_once "DB.php";
class ProductModel
{
    private $table;
    private $dbConnect;

    public function __construct()
    {
        $this->table = "products";
        $db= new DB();
        $this->dbConnect= $db->connect();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM $this->table";
        $stmt = $this->dbConnect->query($sql);
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = $id";
        $stmt = $this->dbConnect->query($sql);
        return $stmt->fetch();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE id=:id";
        $stmt = $this->dbConnect->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }

    public function create($data)
    {
        $sql = "INSERT INTO $this->table(`name`,`price`,`description`) VALUE(?,?,?)";
        $stmt = $this->dbConnect->prepare($sql);
        $stmt->bindParam(1,$data["name"]);
        $stmt->bindParam(2,$data["price"]);
        $stmt->bindParam(3,$data["description"]);
        $stmt->execute();
    }

    public function edit($data)
    {
        try {
            $sql = "UPDATE $this->table SET `name`  = ?,`price`=?,`description`=? WHERE `id` = ?";
            $stmt = $this->dbConnect->prepare($sql);
            $stmt->bindParam(1,$data["name"]);
            $stmt->bindParam(2,$data["price"]);
            $stmt->bindParam(3,$data["description"]);
            $stmt->bindParam(4,$data["id"]);
            $stmt->execute();
        }catch (Exception $exception){
            echo $exception->getMessage();
        }
    }
}