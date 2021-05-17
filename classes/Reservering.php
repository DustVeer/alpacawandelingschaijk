<?php 
class Reservering
{
    public $name;
    public $phone;
    public $email;
    public $remark;
    public $wandel_datum;
    public $aantal_personen;
    
    
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
    
    function add()
    {
        require("pdo.php");
        $date = date("Y-m-d", strtotime($this->wandel_datum));

        $parameters = array(':naam'=>$this->name, ':email'=>$this->email, ':phone'=>$this->phone, ':wandel_datum'=>$date, 
        ':aantal_personen'=>$this->aantal_personen, ':remark'=>$this->remark);
         
        $sth = $pdo->prepare("INSERT INTO contact_reservering (naam, email, telefoonnummer, wandel_datum, aantal_personen, opmerking) VALUES
        (:naam, :email, :phone, :wandel_datum, :aantal_personen, :remark)");

        $sth->execute($parameters);

    }
}

?>