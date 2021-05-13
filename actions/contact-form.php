<?php 
require("../classes/Vraag.php");
require("../classes/Reservering.php");

$vraag = new Vraag();
$reservering = new Reservering();
if (strlen($_POST["name"]) >= 45)
{
    header("Location: ../contact.php?error=name");
}
else 
{
    echo $_POST["Reservation"]; 
    if ($_POST["Reservation"] == "Reservering")
    {
        $reservering->set_name($_POST["name"]);
        $reservering->set_email($_POST["email"]);
        $reservering->set_phone($_POST["phone_reservering"]);
        $reservering->set_wandel_datum($_POST["date"]);
        $reservering->set_aantal_personen($_POST["number_people"]);
        $reservering->set_remark($_POST["remark"]);

        $reservering->add();

        mail("dveerdonk@gmail.com", "RESERVERING Naam: " . $_POST["name"] . " Email: " . $_POST["email"], 
        "Datum wandeling: " . $_POST["date"] . "\r\n Aantal personen: " . $_POST["number_people"] . "\r\n Opmerkingen: " . $_POST["remark"], "Form: info@alpacawandelingschaijk.nl");

        header("Location: ../contact.php?succes=succes");
    }
    else if ($_POST["Reservation"] == "Vraag")
    {
        $vraag->set_name($_POST["name"]);
        $vraag->set_phone($_POST["phone_vraag"]);
        $vraag->set_email($_POST["email"]);
        $vraag->set_question($_POST["question"]);

        echo $_POST["name"];
        echo $_POST["phone_vraag"];
        echo $_POST["email"];
        echo $_POST["question"];

        $vraag->add();

        mail("dveerdonk@gmail.com", "VRAAG Naam: " . $_POST["name"] . " Email: " . $_POST["email"], $_POST["question"], "Form: info@alpacawandelingschaijk.nl");

        header("Location: ../contact.php?succes=succes");
    }
    else
    {
        header("Location: ../contact.php?error=failed");
    }

    
    

    
}


?>