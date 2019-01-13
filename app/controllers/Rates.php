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
        $no = $this->userModel->GetNoVotes($beer,$shopId)->glosyNaNie;
        print_r($no);
        $yes = $this->userModel->GetYesVotes($beer,$shopId)->glosyNaTak;
        if( $no>2*$yes && $no>5 )
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
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $shop = $_POST['shop'];
        $beer = $_POST['beer'];
        if($_POST['type']==1)
        {

            $style = $_POST['style'];
            $alc = $_POST['alc'];
            try {
                $this->userModelBeers->addBeer($beer, $style, $alc);
            } catch (PDOException $e )
            {

            }

        }
        $this->userModelBeers->addBeerToShop($beer,$shop);
        flash('vote_added', 'Thank you for adding beer!');
        redirect('shops/getshop/'.$shop);

    }
    else
    {
        $beers = $this->userModelBeers->GetAllBeers();
        $styles = $this->userModelBeers->GetAllBeerStyles();
        $data =
            [
                'styles' => $styles,
                'beers'=>$beers
            ];
        $this->view('shops/addbeer',$data);
    }
}
}