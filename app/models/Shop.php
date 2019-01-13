<?php
class Shop {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function GetAllShops()
    {
        $this->db->query("SELECT * FROM sklepy limit 10");
        $results = $this->db->resultSet();

        return $results;
    }
    public function GetShopById($id)
    {
        $this->db->query("SELECT * FROM sklepy where idSklepu =:id");
        $this->db->bind(":id",$id);

        $row = $this->db->single();
        return $row;
    }
    public function GetShopsByAddress($address)
    {
        $this->db->query("SELECT * FROM sklepy where ulicaNrLokalu like %:adres%");
        $this->db->bind(":adres",$address);

        $results = $this->db->resultSet();

        return $results;

    }

    public function GetBeersOfShop($id)
    {
        $this->db->query("SELECT p.nazwaPiwa, p.nazwaStylu, p.zawartoscAlkoholu from sklepy s natural join zawartosc natural join piwo p where s.idSklepu = :id");
        $this->db->bind(':id',$id);

        $results = $this->db->resultSet();

        return $results;
    }

    public function GetShopsWithBeer($type)
    {
        $this->db->query("SELECT distinct s.idSklepu, s.ulicaNrLokalu, s.przedsiebiorca, s.szerokoscGeograficzna, s.dlugoscGeograficzna from sklepy s natural join zawartosc natural join piwo p natural join typy t where t.typPiwa=:t");
        $this->db->bind(':t', $type);

        $results = $this->db->resultSet();
        return $results;
    }



}