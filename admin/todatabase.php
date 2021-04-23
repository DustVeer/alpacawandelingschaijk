<?php 
require("../classes/Corona.php");
$corona = new Corona;
if (isset($_POST["add-titel"]))
{   	
    $corona->set_text($_POST["text"]);
    $corona->set_titel($_POST["add-titel"]);
    $corona->add_text();
}
else if (isset($_POST["delete-titel"]))
{
    $corona->set_titel($_POST["delete-titel"]);
    $corona->delete_corona();
}

header("Location: login.php");

?>