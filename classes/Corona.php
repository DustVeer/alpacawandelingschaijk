<?php 

class Corona
{
    public $text;
    public $titel;
    
    function set_titel($i)
    {
        $this->titel = $i;
    }
    function set_text($i)
    {
        $this->text = $i;
    }
    function add_text()
    {
        require("pdo.php");
        $date = date("Y/m/d");
        $parameters = array(':titel'=>$this->titel, ':text'=>$this->text, ':datum'=>$date);
        $sth = $pdo->prepare("INSERT INTO corona (titel, text, datum) VALUES (:titel, :text, :datum)");
        $sth->execute($parameters);
    }
    function delete_corona()
    {
        require("pdo.php");
        $parameters = array(':titel'=>$this->titel);
        $sth = $pdo->prepare("DELETE FROM corona WHERE titel = :titel");
        $sth->execute($parameters);
    }
    function fetchAll() 
    {
        require("pdo.php");
        $sth = $pdo->prepare("SELECT * FROM corona");
        $sth->execute();

        return $sth->fetchAll();
    }
}
?>