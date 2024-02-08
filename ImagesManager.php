<?php

require("./Image.php");
require(".env");
use Dotenv\Dotenv as Dotenv;
class ImagesManager{
    private $db;
private mixed $hostname;
    /**
     * @var array|string[]
     */
    private array $username;
    private mixed $password;

    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/vendor/autoload.php');
        $dotenv->load();

        $this->hostname = $_ENV['HOSTNAME'];
        $this->username = $_ENV['USERNAME'];
        $this->dbname = $_ENV['DBNAME'];
        $this->password = $_ENV['PASSWORD'];


        try {
            $dbh = new PDO($this->hostname, $this->username, $this->dbname, $this->password);
        } catch (PDOException $e) {
            die('attempt to retry the connection after some timeout for example');
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

