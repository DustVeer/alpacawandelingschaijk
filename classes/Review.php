<?php 
class Review
{
    public $naam;
    public $email;
    public $datum;
    public $score;
    public $content;
    //GQ-jWzm37gPdx

    
    function set_naam($i) 
    {
        $this->naam = $i;
    }
    function set_email($i) 
    {
        $this->email = $i;
    }
    function set_datum($i) 
    {
        $this->datum = $i;
    }
    function set_score($i) 
    {
        $this->score = $i;
    }
    function set_content($i) 
    {
        $this->content = $i;
    }
    function fetchAll()
    {
        require("pdo.php");
        $sth = $pdo->prepare("SELECT * FROM review");
        $sth->execute();

        return $sth->fetchAll();
    }

}



?>