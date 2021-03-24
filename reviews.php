<?php
require("classes/Review.php");
if (isset($_GET["input"]))
{
    $newreview = $_GET["input"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="CSS/ReviewsStyle.css">
    <link rel="stylesheet" href="CSS/Style.css">
    <title>Home</title>
</head>
<body>
<?php 
    if (isset($newreview))
    {
        echo "<div class='dimmer'></div>";
    }
     
    if (isset($newreview))
    {
        echo "<div class='new-review'>
        <input value='Back' type='button' onclick=\"window.location.href='reviews.php'\">
        </div>";
    }
    
?>
    <header>
    <header>
        <div class="top-header-content">
            <p class="main-titel">AlpacaWandelingSchaijk</p>
        </div>
    </header>
        <div class="content">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="evenvoorstellen.php">Even Voorstellen</a></li>
                <li><a href="activiteiten.php">Activiteiten</a></li>
                <li><a href="reviews.php" style="background-color: var(--green1);">Reviews</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>
    </header>
    <div class="page-wrapper">
        <div class="page-flex">
            <div class="filters">
                <form action="" method="POST">
                <input type="button" value="Review schrijve" onclick="window.location.href='reviews.php?input=Review-window';">
                </form>
            </div>
            <div class="reviews">
                <?php 
                    $review = new Review();
                    $row = $review->get_all();

                    if (isset($row[0]))
                    {
                        for($i = 0; $i< count($row); $i++)
                        {
                            $date = date("d-m-Y", strtotime($row[$i]["datum"]));
                            echo "<div class='review'>
                            <p class='review-name'>" . $row[$i]["naam"] . "</p>
                            <img class='review-img' src='IMG/" . $row[$i]["score"] .  "-Star.png'>
                            <p class='review-datum'>" . $date . "</p><hr>
                            <p class='review-content'>
                                " .  $row[$i]["content"] . "
                            </p>
                            </div>";
                        }     
                    }
                    else
                    {
                        echo "<div class='review'><p class='review-content'>Er zijn nog geen reviews geplaatst.</p></div>";
                    }
                    
                ?>
            </div>
        </div>
    </div>
</body>
</html>


