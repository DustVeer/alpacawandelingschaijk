<?php 
class Image
{
    public $image_path;
    public $pdo;

    function __construct()
    {
        require("pdo.php");
        $this->pdo = $pdo;
    }

    function set_image_path($value)
    {
        $this->image_path = $value;
    }
    function add()
    {
        $parameters = array(':image_path'=>$this->image_path);
        $sth = $this->pdo->prepare("INSERT INTO image (image_path) VALUES (:image_path)");
        $sth->execute($parameters);  
    }
    function delete()
    {
        $parameters = array(':image_path'=>$this->image_path);
        $sth = $this->pdo->prepare("DELETE FROM image WHERE image_path = :image_path");
        $sth->execute($parameters);
    }
    function fetchAll()
    {
        $sth = $this->pdo->prepare("SELECT image_path FROM image");
        $sth->execute();

        return $sth->fetchAll();
    }
}

?>