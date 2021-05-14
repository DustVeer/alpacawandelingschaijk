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
    if ($_POST["Reservation"] == "Reservering")
    {
        $reservering->set_name($_POST["name"]);
        $reservering->set_email($_POST["email"]);
        $reservering->set_phone($_POST["phone_reservering"]);
        $reservering->set_wandel_datum($_POST["date"]);
        $reservering->set_aantal_personen($_POST["number_people"]);
        $reservering->set_remark($_POST["remark"]);

        $reservering->add();

        mail("info@alpacawandelingschaijk.nl", "RESERVERING Naam: " . $_POST["name"] . " Email: " . $_POST["email"], "Telefoon nummer: " . $_POST["phone_reservering"] .   
        "Datum wandeling: " . $_POST["date"] . "\n Aantal personen: " . $_POST["number_people"] . "\n Opmerkingen: " . $_POST["remark"], "Form: info@alpacawandelingschaijk.nl");

        header("Location: ../contact.php?succes=succes_res");
    }
    else if ($_POST["Reservation"] == "Vraag")
    {
        $vraag->set_name($_POST["name"]);
        $vraag->set_phone($_POST["phone_vraag"]);
        $vraag->set_email($_POST["email"]);
        $vraag->set_question($_POST["question"]);


        $vraag->add();

        mail("info@alpacawandelingschaijk.nl", "VRAAG Naam: " . $_POST["name"] . " Email: " . $_POST["email"], "Telefoon nummer: " . $_POST["phone_vraag"] . "\n Vraag: " .  $_POST["question"], "Form: info@alpacawandelingschaijk.nl");

        header("Location: ../contact.php?succes=succes");
    }
    else
    {
        header("Location: ../contact.php?error=failed");
    }
}
?>