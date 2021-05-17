<?php 
class Vraag
{
    public $name;
    public $phone;
    public $email;
    public $question;
    
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
    function set_question($value)
    {
        $this->question = $value;
    }
    function add()
    {
        require("pdo.php");
        $parameters = array(':naam'=>$this->name, ':phone'=>$this->phone, ':email'=>$this->email, ':vraag'=>$this->question);
        $sth = $pdo->prepare("INSERT INTO contact_vraag (naam, telefoonnummer, email, vraag) VALUES
        (:naam, :phone, :email, :vraag)");
        $sth->execute($parameters);
    }
}

?>