<?php

require("./Image.php");
class ImagesManager{
    private $db;


    public function __construct()
    {
        /*$dbName = "mysql://pg5vb9547j5p7ewi:chjijzyrqpkmjzbh@d3y0lbg7abxmbuoi.chr7pe7iynqr.eu-west-1.rds.amazonaws.com:3306/ejta5rbv6riwb80b";
        $port = 3306;
        $username = "pg5vb9547j5p7ewi";
        $password = "chjijzyrqpkmjzbh";
        try{
            $this->db = new PDO("mysql:host=localhost;dbname=$dbName;port=$port", $username, $password) ;
        }catch(PDOException $exception){
            echo $exception->getMessage();
        }*/

        $dbName = "studi-pokedex";
        $port = 3306;
        $username = "root";
        $password = "root";
        try{
            $this->db = new PDO("mysql:host=localhost;dbname=$dbName;port=$port", $username, $password) ;
        }catch(PDOException $exception){
            echo $exception->getMessage();
        }
    }

    public function create(Image $image)
    {
        $req = $this->db->prepare("INSERT INTO `image` (name, path) VALUE (:name, :path)");

        $req->bindValue(":name", $image->getName(),PDO::PARAM_STR);
        $req->bindValue(":path", $image->getPath(),PDO::PARAM_STR);

        $req->execute();
    }

    public function get(int $id)
    {
        $req = $this->db->query("SELECT * FROM `image` WHERE id = $id");
        //$req->bindValue(":id",$id, PDO::PARAM_STR);
        //$req->execute([":id" => $id]);
        $data = $req->fetch();
        $image = new Image($data);
        return $image;
    }

    public function getLastImageId()
    {
        $req = $this->db->query("SELECT * FROM `image` ORDER BY id DESC");
        return $req->fetch()["id"];
    }

    public function update(Image $image)
    {
        $req = $this->db->prepare("UPDATE 'image' SET name = :name, path = :path");

        $req->bindValue(":name", $image->getName(),PDO::PARAM_STR);
        $req->bindValue(":description", $image->getPath(),PDO::PARAM_STR);

        $req->execute();
    }

    public function delete(int $id)
    {
        //code
        $req = $this->db->prepare("DELETE FROM `image` WHERE id = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT );
        $req->execute();
    }
}

