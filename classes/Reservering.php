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
    public $datum;
    public $pdo;
    
    function __construct()
    {
        require("pdo.php");
        $this->pdo = $pdo;
        $this->update_capaciteit();
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
    function set_datum($value)
    {
        $this->datum = $value;
    }

    private function update_capaciteit()
    {
        $sth = $this->pdo->prepare("UPDATE `capaciteit` SET aantal_reserveringen = (SELECT COALESCE(SUM(contact_reservering.aantal_personen), 0) FROM `contact_reservering` WHERE contact_reservering.wandel_datum = capaciteit.datum AND contact_reservering.bevestigd = 1), aantal_beschikbaar = 8 - aantal_reserveringen");
        $sth->execute();
    }

    function fetch_wandel_datum()
    {
        
        $sth = $this->pdo->prepare("SELECT wandel_datum FROM contact_reservering WHERE bevestigd = 1");
        $sth->execute();

        return $sth->fetchAll();
    }
    function fetchALL_capaciteit()
    {
        
        
        $sth = $this->pdo->prepare("SELECT * FROM capaciteit ORDER BY datum");
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
    function delete_dummy()
    {

        $parameters = array(':wandel_datum'=>$this->wandel_datum);
        $sth = $this->pdo->prepare("DELETE FROM `contact_reservering` WHERE wandel_datum = :wandel_datum ");
        $sth->execute($parameters);

        $this->update_capaciteit();
    }
    function delete_datum()
    {

        $date = date("Y-m-d", strtotime($this->datum));

        $parameters = array(':datum'=>$date);
        $sth = $this->pdo->prepare("DELETE FROM `capaciteit` WHERE datum = :datum ");
        $sth->execute($parameters);

        $this->update_capaciteit();
    }
    function add_datum()
    {
        $date = date("Y-m-d", strtotime($this->datum));

        $parameters = array(':datum'=>$date);
        $sth = $this->pdo->prepare("INSERT INTO capaciteit (datum) VALUEs (:datum)");
        $sth->execute($parameters);

    }
    function add_dummy()
    {
        $date = date("Y-m-d", strtotime($this->wandel_datum));

        $parameters = array(':naam'=>"Dummy", ':email'=>"Dummy@dummy.dm", ':phone'=>"06Dummy", ':wandel_datum'=>$date, 
        ':aantal_personen'=>$this->aantal_personen, ':remark'=>"This is a Dummy", ':bevestigd'=>1);
         
        $sth = $this->pdo->prepare("INSERT INTO contact_reservering (naam, email, telefoonnummer, wandel_datum, aantal_personen, opmerking, bevestigd) VALUES
        (:naam, :email, :phone, :wandel_datum, :aantal_personen, :remark, :bevestigd)");

        $sth->execute($parameters);

        $this->update_capaciteit();
    }
    function add()
    {
        
        $date = date("Y-m-d", strtotime($this->wandel_datum));
        $bevestigd = (isset($this->bevestigd)) ? 1 : 0;

        $parameters = array(':naam'=>$this->name, ':email'=>$this->email, ':phone'=>$this->phone, ':wandel_datum'=>$date, 
        ':aantal_personen'=>$this->aantal_personen, ':remark'=>$this->remark, ':bevestigd'=>$bevestigd);
         
        $sth = $this->pdo->prepare("INSERT INTO contact_reservering (naam, email, telefoonnummer, wandel_datum, aantal_personen, opmerking, bevestigd) VALUES
        (:naam, :email, :phone, :wandel_datum, :aantal_personen, :remark, :bevestigd)");

        $sth->execute($parameters);

        $this->update_capaciteit();
    }
}


?>