<?php 
class Review
{
    public $naam;
    public $email;
    public $datum;
    public $score;
    public $content;
    
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
    function add()
    {
        require("pdo.php");
        $date = date("Y/m/d");
        $parameters = array(':naam'=>$this->naam, ':email'=>$this->email, ':datum'=>$date, ':score'=>$this->score, ':content'=>$this->content);
        $sth = $pdo->prepare("INSERT INTO review (naam, email, datum, score, content) VALUES (:naam, :email, :datum, :score, :content)");
        $sth->execute($parameters);
       
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