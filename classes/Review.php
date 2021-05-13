<?php 
class Review
{
    public $naam;
    public $email;
    public $datum;
    public $score;
    public $content;
    
    function set_naam($value) 
    {
        $this->naam = $value;
    }
    function set_email($value) 
    {
        $this->email = $value;
    }
    function set_datum($value) 
    {
        $this->datum = $value;
    }
    function set_score($value) 
    {
        $this->score = $value;
    }
    function set_content($value) 
    {
        $this->content = $value;
    }
    function add()
    {
        require("pdo.php");
        $parameters = array(':naam'=>$this->naam, ':email'=>$this->email, ':score'=>$this->score, ':content'=>$this->content);
        $sth = $pdo->prepare("INSERT INTO review (naam, email, score, content) VALUES (:naam, :email, :score, :content)");
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