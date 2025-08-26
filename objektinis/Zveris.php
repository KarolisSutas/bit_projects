<?php

class Zveris {

    public $kasTu = 'Žvėris';
    private $realiaiKasTu1 = 'MI6'; // privaciu pasiekti negalima tik public
    private $realiaiKasTu2 = 'SIA';
    private $realiaiKasTu3 = 'Turkų žvalgyba';
    public $uodega;

    public function __construct($uodega) 
    {// kai panaudojam new tada pasileidzia. konstruktoriaus metodas
        $this->uodega = $uodega;
    }

    public function __get($prop) 
    { // __get pasileidzia kai bandom paimti savybe kurios nera $prop
        
        if($prop == 'realiaiKasTu2') 
        {
            return 'Žvėriukas su uodega';
        }
        
        return $this->$prop;
    } 

    public function __set($prop, $value) 
    {// kai bandom irasyti i savybe kurios nera
       
        if($prop == 'realiaiKasTu2') 
        {
            return;
        }
        
        $this->$prop = $value;
   
    }


}

