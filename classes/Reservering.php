<?php 
class Reservering
{
    public $name;
    public $phone;
    public $email;
    public $remark;
    public $wandel_datum;
    public $aantal_personen;
    public $bevestigd; 
    public $pdo;
    
    function __construct()
    {
        require("pdo.php");
        $this->pdo = $pdo;
    }
    
    function set_name($value)
    {
        $this->name = $value;
    }
    function set_phone($value)
    {
        $this->phone = $value;
    }
    function set_email($value)
    {
        $this->email = $value;
    }
    function set_wandel_datum($value)
    {
        $this->wandel_datum = $value;
    }
    function set_aantal_personen($value)
    {
        $this->aantal_personen = $value;
    }
    function set_remark($value)
    {
        $this->remark = $value;
    }
    function set_bevestigd($value)
    {
        $this->bevestigd = $value;
    }
    
    function fetch_wandel_datum()
    {
        
        $sth = $this->pdo->prepare("SELECT wandel_datum FROM contact_reservering WHERE bevestigd = 1");
        $sth->execute();

        return $sth->fetchAll();
    }
    function fetch_schema()
    {
        
        $sth = $this->pdo->prepare("SELECT extra_datum FROM reserverings_schema WHERE bevestigd = 1");
        $sth->execute();

        return $sth->fetchAll();
    }
    function fetch_wandel_datum_onder6()
    {
        
        $sth = $this->pdo->prepare("SELECT wandel_datum FROM contact_reservering WHERE bevestigd = 1 AND aantal_personen <= 6");
        $sth->execute();

        return $sth->fetchAll();
    }
    function fetchAll_bevestigdNo()
    {
        $sth = $this->pdo->prepare("SELECT * FROM contact_reservering WHERE bevestigd = 0");
        $sth->execute();

        return $sth->fetchAll();
    }
    function fetch_date()
    {
        $sth = $this->pdo->prepare("SELECT SUM(aantal_personen), wandel_datum FROM `contact_reservering` WHERE bevestigd = 1 GROUP BY wandel_datum");
        $sth->execute();

        return $sth->fetchAll();
        
    }
    function change_bevestigd()
    {
        $date = date("Y-m-d", strtotime($this->wandel_datum));

        $parameters = array(':naam'=>$this->name ,':bevestigd'=>$this->bevestigd, ':wandel_datum'=>$date);
        $sth = $this->pdo->prepare("UPDATE contact_reservering SET bevestigd = :bevestigd WHERE naam = :naam AND wandel_datum = :wandel_datum");
        $sth->execute($parameters);
        //SELECT *, COUNT(wandel_datum) FROM `contact_reservering` GROUP BY wandel_datum HAVING COUNT(wandel_datum) > 1
    }
    function add()
    {
        
        $date = date("Y-m-d", strtotime($this->wandel_datum));

        $parameters = array(':naam'=>$this->name, ':email'=>$this->email, ':phone'=>$this->phone, ':wandel_datum'=>$date, 
        ':aantal_personen'=>$this->aantal_personen, ':remark'=>$this->remark);
         
        $sth = $this->pdo->prepare("INSERT INTO contact_reservering (naam, email, telefoonnummer, wandel_datum, aantal_personen, opmerking) VALUES
        (:naam, :email, :phone, :wandel_datum, :aantal_personen, :remark)");

        $sth->execute($parameters);

    }
}

?>