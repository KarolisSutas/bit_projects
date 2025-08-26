<?php

class Page {
    
    static public $score = '225';
    protected $url; //nematomas isoreje bet matomas seimoje
    public $title = 'Delfis 6';
    // public $score = '25';

    public function __construct() 
    {
        $this->url = 'http://localhost/bit_projects/objektinis2/page/' . rand(1000, 9999);
        // $this->render();

        // $this->score = '100';
    }

    public function render()
    {
        // echo '<h2>PAGE rendering...'. self::$score . ' ' . $this->title . '</h2>'; // self tik savo klases duomenis grazina
        echo '<h2>PAGE rendering...'. static::$score . ' ' . $this->title . '</h2>'; // iesko php per klases paveldejimus ir grazina duomenis paskutinius vaiko
    }

}