<?php
/**
 * Created by PhpStorm.
 * User: ficon
 * Date: 13.01.19
 * Time: 06:19
 */

class Rates extends Controller
{
public function __construct()
{
    $this->userModel = $this->model("Rate");
    $this->userModelBeers = $this->model("Beer");
}
public function rateYes()
{
    $beer = $_GET['beer'];
    $shopId = $_GET['shop'];
    if($this->userModel->VoteYes($beer,$shopId))
    {
        flash('vote_added', 'Thank you for your vote!');
    }
    redirect('shops/getshop/'.$shopId);


}
public function rateNo()
{
    $beer = $_GET['beer'];
    $shopId = $_GET['shop'];
    if($this->userModel->VoteNo($beer,$shopId))
    {
        $no = $this->userModel->GetNoVotes;
        $yes = $this->userModel->GetYesVotes;
        if( $no>$yes && $no>5 )
        {
            $this->userModel->RemoveBeerFromPlace($beer,$shopId);
        }
        flash('vote_added', 'Thank you for your vote!');
        redirect('shops/getshop/'.$shopId);
    }

}
public function addBeer()
{
    if($_SERVER['REQUEST_METHOD']=='POST')
    {

    }
    else
    {
        $beers = $this->userModelBeers->GetAllBeers();
        $data =
            [
                'beers' => $beers
            ];
        $this->view('shops/addbeer',$data);
    }
}
}