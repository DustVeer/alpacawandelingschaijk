<?php 

class Corona
{
    public $text;
    public $titel;
    
    function set_titel($value)
    {
        $this->titel = $value;
    }
    function set_text($value)
    {
        $this->text = $value;
    }
    function add_text()
    {
        require("pdo.php");
        
        $parameters = array(':titel'=>$this->titel, ':text'=>$this->text);
        $sth = $pdo->prepare("INSERT INTO corona (titel, text) VALUES (:titel, :text)");
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