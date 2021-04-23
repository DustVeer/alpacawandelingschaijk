<?php 
require("../classes/Contact.php");

$contact = new Contact();
if (strlen($_POST["name"]) >= 45)
{
    header("Location: ../contact.php?error=name");
}
else 
{
    $contact->set_name($_POST["name"]);
    $contact->set_phone($_POST["phone"]);
    $contact->set_email($_POST["email"]);
    $contact->set_question($_POST["question"]);

    mail("info@alpacawandelingschaijk.nl", "Contact-form-Email Naam: " . $_POST["name"] . " Email: " . $_POST["email"], $_POST["question"], "Form: info@alpacawandelingschaijk.nl");
    $contact->add();

    header("Location: ../contact.php?succes=succes");
}


?>