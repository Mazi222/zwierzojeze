<?php
class Rate
{

    private $db;

public function __construct(){
    $this->db = new Database;
}

public function VoteNo($beer,$shopId)
{
    $this->db->query("UPDATE zawartosc SET glosyNaNie = glosyNaNie+1 where idSklepu=:id and nazwaPiwa=:beer");
    $this->db->bind(":id",$shopId);
    $this->db->bind(":beer",$beer);
    if($this->db->execute()){
        return true;
    } else {
        return false;
    }
}

public function VoteYes($beer,$shopId)
{
    $this->db->query("UPDATE zawartosc SET glosyNaTak = glosyNaTak+1 where idSklepu=:id and nazwaPiwa=:beer");
    $this->db->bind(":id",$shopId);
    $this->db->bind(":beer",$beer);
    if($this->db->execute()){
        return true;
    } else {
        return false;
    }
}

public function GetNoVotes($beer,$shopId)
{
    $this->db->query("SELECT glosyNaNie from zawartosc where idSklepu=:id and nazwaPiwa=:beer");
    $this->db->bind(":id",$shopId);
    $this->db->bind(":beer",$beer);
    $row = $this->db->single();

    return $row;
}

    public function GetYesVotes($beer,$shopId)
    {
        $this->db->query("SELECT glosyNaTak from zawartosc where idSklepu=:id and nazwaPiwa=:beer");
        $this->db->bind(":id",$shopId);
        $this->db->bind(":beer",$beer);
        $row = $this->db->single();

        return $row;
    }
    public function RemoveBeerFromPlace($beer,$shopId)
    {
        $this->db->query("DELETE from zawartosc where idSklepu=:id and nazwaPiwa=:beer");
        $this->db->bind(":id",$shopId);
        $this->db->bind(":beer",$beer);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

}