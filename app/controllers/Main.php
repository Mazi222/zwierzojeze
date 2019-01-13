<?php
  class Main extends Controller {
    public function __construct(){
        $this->userModel = $this->model("Shop");
    }

      public function index(){
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $data =
                [
                    'shops'=>'',
                    'location_err' =>'',
                    'empty_address' =>''

                ];
            $beer = $_POST['type'];
            $where =$_POST['adres'];

            if(empty($where))
            {
                $data['empty_address']='Please enter an address';
            };

            if(empty($data['empty_address'])) {
                $xml=simplexml_load_file("https://maps.googleapis.com/maps/api/geocode/xml?address=$where&key=AIzaSyBHrs8loLJHTSomw3Cj3XecWBeAB5qvdpU");
                $lat = floatval($xml->result->geometry->location->lat);
                $lon = floatval($xml->result->geometry->location->lng);
                $shops = $this->userModel->GetShopsWithBeer($beer);
                foreach ($shops as $shop) {
                    $shop->dist = round(haversine($lat, $lon, $shop->szerokoscGeograficzna, $shop->dlugoscGeograficzna)/1000,3);
                }

              function cmp($shopa, $shopb)
              {
                   return $shopa->dist <=> $shopb->dist;
               }
                usort($shops, 'cmp' );
                $shops = array_slice($shops,0,9);

                $xml = '<markers>';
                $xml .= '<marker ';
                $xml .= "id = '".-1;
                $xml.="' name='".'Wyszukiwane miejsce';
                $xml.="' adres='".$where." Kraków";
                $xml.="' webpage='".URLROOT.'#';
                $xml.="'".'/>';
                foreach ($shops as $shop)
                {
                    $xml.=XML_serializer::serialize((array)$shop);
                }
                $xml.='</markers>';
                file_put_contents('data.xml',$xml);
                if($shops[0]->dist>100)
                {
                    $data['location_err'] = 'Please enter a valid location in Krakow';
                }
                if(empty($data['location_err'])) {
                    $data['shops'] = $shops;
                    $this->view('main/address', $data);
                } else
                {
                    $this->view('main/index',$data);
                }
            }
            else
            {
                $this->view('main/index',$data);
            }
        }
        else {

            $this->view('main/index');
        }
      }



    public function about(){
      $data = [
        'title' => 'About Us',
        'description' => ''
      ];

      $this->view('main/about', $data);
    }
  }