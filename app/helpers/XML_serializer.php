<?php
class XML_serializer
{
    public function __construct()
    {
    }
    public static function serialize($array)
    {
        $xml = '<marker ';
        $xml .= "id = '".$array['idSklepu'];
        $xml.="' name='".$array['przedsiebiorca'];
        $xml.="' adres='".$array['ulicaNrLokalu']." Kraków";
        $xml.="' webpage='".URLROOT.'/shops/getshop/'.$array['idSklepu'];
        $xml.="'".'/>';
        return $xml;

    }
}