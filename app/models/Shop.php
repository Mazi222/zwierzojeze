<?php
class Shop {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function GetAllShops()
    {
        $this->db->query("SELECT * FROM sklepy order by 3");
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
    public function GetShopsOfUser($userId)
    {
        $this->db->query("SELECT * from preferencje p natural join sklepy s where p.idUser=:id");
        $this->db->bind(':id',$userId);
        $results = $this->db->resultSet();

        return $results;
    }
    public function CheckIfShopAdded($userId,$shopId)
    {
        $this->db->query("SELECT * from preferencje where idUser=:id and idSklepu = :id2");
        $this->db->bind(':id',$userId);
        $this->db->bind(':id2',$shopId);
        $r = $this->db->resultSet();
        $results = $this->db->rowCount();
        return $results;
    }
    public function AddShopToPreferences($userId,$shopId)
    {
        $this->db->query("INSERT into preferencje values(:id,:id2)");
        $this->db->bind(':id',$userId);
        $this->db->bind(':id2',$shopId);
        if($this->db->execute())
            return true;
        return false;

    }
    public function DeleteShopFromPreferences($userId,$shopId)
    {
        $this->db->query("DELETE from preferencje where idUser = :id and idSklepu=:id2");
        $this->db->bind(':id',$userId);
        $this->db->bind(':id2',$shopId);
        if($this->db->execute())
            return true;
        return false;

    }



}