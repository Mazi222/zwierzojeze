<?php
class Beer
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllBeers()
    {
        $this->db->query("SELECT * FROM piwo");
        $results = $this->db->resultSet();

        return $results;
    }

    public function checkIfBeerExists($beer)
    {
        $this->db->query("SELECT * FROM piwo where nazwaPiwa=:beer");
        $this->db->bind(":beer",$beer);
        if($this->db->rowCount()>0)
        {
            return true;
        }
        return false;



    }
    public function addBeerToShop($beer,$shopId)
    {
        $this->db->query("INSERT INTO zawartosc values(:shop,:beer,0,0)");
        $this->db->bind(":shop",$shopId);
        $this->db->bind(":beer",$beer);
        if($this->db->execute())
        {
            return true;
        }
        return false;
    }
    public function addBeer($beer,$style,$alc)
    {
        $this->db->query("INSERT INTO piwo values(:beer,:style,:alc)");
        $this->db->bind(":beer",$beer);
        $this->db->bind(":style",$style);
        $this->db->bind(":alc",$alc);
        if($this->db->execute())
        {
            return true;
        }
        return false;
    }

}