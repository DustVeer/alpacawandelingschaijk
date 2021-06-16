<?php 
require("../classes/Review.php");

$review = new Review();

$review->set_naam($_POST["name"]);
$review->set_email($_POST["email"]);
$review->set_score($_POST["rate"]);
$review->set_content($_POST["content"]);

if (strlen($_POST["name"]) <= 45)
{
    $review->add();
    header("Location: ../reviews.php");
}
header("Location: ../reviews.php");

?>