<?php 
require("../classes/Corona.php");
require("../classes/Reservering.php");

$reservering = new Reservering();
$corona = new Corona();

if (isset($_POST["add-titel"]))
{   	
    $corona->set_text($_POST["text"]);
    $corona->set_titel($_POST["add-titel"]);
    $corona->add_text();
    header("Location: loggedin.php?require=Corona");
}
else if (isset($_POST["delete-titel"]))
{
    $corona->set_titel($_POST["delete-titel"]);
    $corona->delete_corona();
    header("Location: loggedin.php?require=Corona");
}

if(isset($_POST["name"]))
{
    $reservering->set_name($_POST["name"]);
    $reservering->set_phone($_POST["phone"]);
    $reservering->set_email($_POST["email"]);
    $reservering->set_aantal_personen($_POST["number_people"]);
    $reservering->set_wandel_datum($_POST["date"]);
    $reservering->set_remark($_POST["remark"]);
    $reservering->set_bevestigd(1);

    $reservering->add();

    header("Location: loggedin.php?require=Reservering");

}

?>