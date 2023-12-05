<?php

class PokemonsManager{
    private $db;


    public function __construct()
    {
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

    public function create(Pokemon $pokemon): void
    {
       $req = $this->db->prepare("INSERT INTO 'pokemon'(number, name, description, type1, type2) VALUE(:number, :name, :description, :type1, :type2)");
       $req->bindValue(":number", $pokemon->getNumber(),PDO::PARAM_INT);
       $req->bindValue(":name", $pokemon->getName(),PDO::PARAM_STR);
       $req->bindValue(":description", $pokemon->getDescription(),PDO::PARAM_STR);
       $req->bindValue(":type", $pokemon->getType1(),PDO::PARAM_INT);
       $req->bindValue(":type", $pokemon->getType2(),PDO::PARAM_INT);

       $req->execute();
    }


    public function get(int $id): void
    {
        //return $this->db;
    }

    public function getAllByString(string $input): void
    {

    }


    /*public function getAllByType():
    {
        return $this->db;
    }*/

    public function update(pokemon $pokemon)
    {

    }

    public function delete(int $id)
    {

    }
}