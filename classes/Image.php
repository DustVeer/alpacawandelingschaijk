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

    function set_image_path($i)
    {
        $this->image_path = $i;
    }
    function add()
    {
        $date = date("Y/m/d");
        $parameters = array(':image_path'=>$this->image_path, ':datum'=>$date);
        $sth = $this->pdo->prepare("INSERT INTO image (image_path, datum) VALUES (:image_path, :datum)");
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