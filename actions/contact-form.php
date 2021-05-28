<?php session_start();
require("../classes/Vraag.php");
require("../classes/Reservering.php");

// <div class="g-recaptcha" style="margin-top: 10px;" data-sitekey="6LcePAATAAAAAGPRWgx90814DTjgt5sXnNbV5WaW"></div>

$vraag = new Vraag();
$reservering = new Reservering();
$check = 0;
if (strlen($_POST["name"]) >= 45)
{
    header("Location: ../contact.php?error=name");
}
else 
{
    if ($_POST["Reservation"] == "Reservering" || isset($_POST["name_res"]))
    {
        if (isset($_POST["name_res"]))
        {
            $check = 4;
            $reservering->set_name($_POST["name_res"]);
        }
        else {$reservering->set_name($_POST["name"]);}
        

        $reservering->set_email($_POST["email"]); 


       

        //Phone
        if (empty($_POST["phone_reservering"])) {
            $check = 1;
        }
        else { $reservering->set_phone($_POST["phone_reservering"]); }

        //Date
        if (empty($_POST["date"]) || !strtotime($_POST["date"])) {
            $check = 2;
        }
        else { $reservering->set_wandel_datum($_POST["date"]); }
        
        //People
        if (empty($_POST["number_people"]) ||  gettype($_POST["number_people"]) != "integer") {
            $check = 3;
        }
        else { $reservering->set_aantal_personen($_POST["number_people"]); }

        // set_Session_reservering
        if ($check > 0)
        {
            $_SESSION["name"] = $_POST["name"];
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["phone_reservering"] = $_POST["phone_reservering"];
            $_SESSION["date"] = $_POST["date"];
            $_SESSION["number_people"] = $_POST["number_people"];
            $_SESSION["remark"] = $_POST["remark"];
        }

        $reservering->set_remark($_POST["remark"]);

        switch ($check)
        {
            case 1: 
                header("Location: ../contact.php?error=phone");
                break;
            case 2:
                header("Location: ../contact.php?error=date");
                break;
            case 3:
                header("Location: ../contact.php?error=people");
                break;
            case 4:
                $reservering->add();
                mail("info@alpacawandelingschaijk.nl", "RESERVERING Naam: " . $_POST["name_res"] . " Email: " . $_POST["email"], "Telefoon nummer: " . $_POST["phone_reservering"] .  "\nDatum wandeling: " . $_POST["date"] . "\nAantal personen: " . $_POST["number_people"] . "\nOpmerkingen: " . $_POST["remark"], "Form: info@alpacawandelingschaijk.nl");
                header("Location: ../contact.php?succes=succes_res");
            break;
            

        }

        if ($check == 0)
        {
            
            $reservering->add();

            mail("info@alpacawandelingschaijk.nl", "RESERVERING Naam: " . $_POST["name"] . " Email: " . $_POST["email"], "Telefoon nummer: " . $_POST["phone_reservering"] .  "\nDatum wandeling: " . $_POST["date"] . "\nAantal personen: " . $_POST["number_people"] . "\nOpmerkingen: " . $_POST["remark"], "Form: info@alpacawandelingschaijk.nl");

            header("Location: ../contact.php?succes=succes_res");

            
        }
        
    }
    else if ($_POST["Reservation"] == "Vraag")
    {
        $vraag->set_name($_POST["name"]);
        $vraag->set_phone($_POST["phone_vraag"]);
        $vraag->set_email($_POST["email"]);

        //Vraag
        if (empty($_POST["question"])) {
            $check = 1;

            $_SESSION["name"] = $_POST["name"];
            $_SESSION["phone_vraag"] = $_POST["phone_vraag"];
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["question"] = $_POST["question"];

            header("Location: ../contact.php?error=vraag");
        }
        else { $vraag->set_question($_POST["question"]); }
        
        if ($check == 0)
        {
            $vraag->add();

            mail("info@alpacawandelingschaijk.nl", "VRAAG Naam: " . $_POST["name"] . " Email: " . $_POST["email"], 
            "Telefoon nummer: " . $_POST["phone_vraag"] . "\nVraag: " .  $_POST["question"], "Form: info@alpacawandelingschaijk.nl");

            header("Location: ../contact.php?succes=succes");
        }
    }
    else
    {
        header("Location: ../contact.php?error=failed");
    }
}
?>