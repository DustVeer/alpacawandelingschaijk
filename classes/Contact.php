<?php 
class Contact
{
    public $name;
    public $phone;
    public $email;
    public $question;
    
    function set_name($i)
    {
        $this->name = $i;
    }
    function set_phone($i)
    {
        $this->phone = $i;
    }
    function set_email($i)
    {
        $this->email = $i;
    }
    function set_question($i)
    {
        $this->question = $i;
    }
    function add()
    {
        require("pdo.php");
        $date = date("Y/m/d");
        $parameters = array(':naam'=>$this->name, ':datum'=>$date, ':phone'=>$this->phone, ':email'=>$this->email, ':vraag'=>$this->question);
        $sth = $pdo->prepare("INSERT INTO contact_vraag (naam, datum, telefoonnummer, email, vraag) VALUES
        (:naam, :datum, :phone, :email, :vraag)");
        $sth->execute($parameters);
    }
}

?>