<?php
class Shops extends Controller {
    public function __construct(){
        $this->userModel = $this->model("Shop");
    }

    public function index(){

            $shops = $this->userModel->GetAllShops();
            $data = [
                'xml' => $shops
            ];


        $this->view('main/index', $data);
    }

    public function about(){
        $data = [
            'title' => 'About Us',
            'description' => ''
        ];

        $this->view('main/about', $data);
    }

    public function getshop($id)
    {
        $shop = $this->userModel->GetShopByID($id);
        $beers = $this->userModel->GetBeersOfShop($id);
        $data =
            [
                'shop' => $shop,
                'beers' => $beers
            ];

        $this->view('shops/getshop',$data);

    }





}