<?php 
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
    if ($_POST["Reservation"] == "Reservering")
    {
        $reservering->set_name($_POST["name"]);

        //Email
        if (empty($_POST["email"])) {
            $check = 1;
            header("Location: ../contact.php?error=email");
        }
        else { $reservering->set_email($_POST["email"]); }

        //Phone
        if (empty($_POST["phone_reservering"])) {
            $check = 1;
            header("Location: ../contact.php?error=phone");
        }
        else { $reservering->set_phone($_POST["phone_reservering"]); }

        //Date
        if (empty($_POST["date"])) {
            $check = 1;
            header("Location: ../contact.php?error=date");
        }
        else { $reservering->set_wandel_datum($_POST["date"]); }
        
        //People
        if (empty($_POST["number_people"])) {
            $check = 1;
            header("Location: ../contact.php?error=people");
        }
        else { $reservering->set_wandel_datum($_POST["number_people"]); }

        $reservering->set_remark($_POST["remark"]);
        if ($check == 0)
        {
            $reservering->add();
            mail("info@alpacawandelingschaijk.nl", "RESERVERING Naam: " . $_POST["name"] . " Email: " . $_POST["email"], "Telefoon nummer: " . $_POST["phone_reservering"] .   
            "\nDatum wandeling: " . $_POST["date"] . "\nAantal personen: " . $_POST["number_people"] . "\nOpmerkingen: " . $_POST["remark"], "Form: info@alpacawandelingschaijk.nl");

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
            header("Location: ../contact.php?error=vraag");
        }
        else { $vraag->set_question($_POST["question"]); }
        
        if ($check == 0)
        {
            $vraag->add();

            mail("info@alpacawandelingschaijk.nl", "VRAAG Naam: " . $_POST["name"] . " Email: " . $_POST["email"], "Telefoon nummer: " . $_POST["phone_vraag"] . "\n Vraag: " .  $_POST["question"], "Form: info@alpacawandelingschaijk.nl");

            header("Location: ../contact.php?succes=succes");
        }
    }
    else
    {
        header("Location: ../contact.php?error=failed");
    }
}
?>