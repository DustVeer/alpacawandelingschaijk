<?php 
class Contact
{
    public $name;
    public $phone;
    public $email;
    public $question;
    public $pdo;
    
    function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=ernstandereogen_alpacawandelingschaijk", "ernstandereogen_ernstandereogen", "GQ-jWzm37gPdx");
    }
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
        
        $parameters = array(':naam'=>$this->name, ':phone'=>$this->phone, ':email'=>$this->email, ':vraag'=>$this->question);
        $sth = $this->pdo->prepare("INSERT INTO contact_vraag (naam, telefoonnummer, email, vraag) VALUES
        (:naam, :phone, :email, :vraag)");
        $sth->execute($parameters);
        
    }
}

?>