<?php

class Article extends Page {
    
    static public $score = '5';
    public $title;

    public function __construct($title = 'Nera pavadinimo')
    {
        parent::__construct(); // taip paleidziamas tevinis PAGE construct kitaip bus nematomas
        
        $this->title = $title;

        $this->render(); // overaidina tevo renderi
        // parent::render(); // paima tevini render

    }

    // public function render()
    // {
    //     // echo '<h2>Article rendering...'. $this->url .'</h2>'; // url deklaruotas Page, yra public ir paleidziamas article
    //     // echo '<h2>Article rendering...'. self::$score .'</h2>'; // taip matome statinius dalykus
    //     // echo '<h2>Article rendering...'. parent::$score .'</h2>'; 
    // }

}