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
        $this->db->query("SELECT * FROM piwo where nazwaPiwa=:");

    }
}