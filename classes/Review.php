<?php 
class Review
{
    public $naam;
    public $email;
    public $datum;
    public $score;
    public $content;
    public $pdo;
    //GQ-jWzm37gPdx

    function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=ernstandereogen_alpacawandelingschaijk", "ernstandereogen_ernstandereogen", "GQ-jWzm37gPdx");
    }

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
    function get_all()
    {
        $sth = $this->pdo->prepare("SELECT * FROM review");
        $sth->execute();

        return $sth->fetchAll();
    }

}



?>