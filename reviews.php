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
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/ReviewsStyle.css">
    <link rel="stylesheet" href="CSS/Style.css">
    <link rel="stylesheet" href="CSS/Stars.css">
    <title>AlpacaWandelingSchaijk</title>
    <link rel="icon" href="IMG/Alpaca_Logo.png" type="image/icon type">
    
</head>
<body>
<?php 
    if (isset($newreview))
    {
        echo "<div class='dimmer'></div>";
    }
     
    if (isset($newreview))
    {
        echo 
        "<div class='new-review'>
            <input value='Back' type='button' onclick=\"window.location.href='reviews.php'\">
            <div class='star-wrapper'>
                <div class='form-titel'>
                    <p class='titels'>Review achterlaten</p>
                    <p style='font-family: Arial, Helvetica, sans-serif;'>* verplichte velden</p>
                </div>
                <hr>
                <form action='actions/review-form.php' method='POST'>
                    <div class='form-wrapper'>
                        <label>Naam</label>
                        <input class='form-input' type='text' name='name' required>
                        <label>E-mail</label>
                        <input class='form-input' type='email' name='email' required>
                        <label>Score</label>
                            <div class='rate'>
                                <input type='radio' id='star5' name='rate' value='5' />
                                <label for='star5' title='text'>5 stars</label>
                                <input type='radio' id='star4' name='rate' value='4' />
                                <label for='star4' title='text'>4 stars</label>
                                <input type='radio' id='star3' name='rate' value='3' />
                                <label for='star3' title='text'>3 stars</label>
                                <input type='radio' id='star2' name='rate' value='2' />
                                <label for='star2' title='text'>2 stars</label>
                                <input type='radio' id='star1' name='rate' value='1' />
                                <label for='star1' title='text'>1 star</label>
                            </div>
                        
                        <label>Review</label>
                        <textarea class='form-input' name='content'></textarea>
                    </div>
                    <input type='submit' value='Review verzenden'>
                </form>
            </div>
        </div>";
    }
?>
    <header>
    <header>
    <img style="height: 100%; width: 100%;" src="IMG/border.jpg">
    <img class="small-logo" src="IMG/Alpaca_Logo.png">
        <div class="top-header-content">
            <p class="main-titel">AlpacaWandelingSchaijk</p>
            <a href="https://www.facebook.com/alpacawandelingschaijk" target="_blank"><img  class="icon" src="IMG/FB.png" ></a>
            <a href="https://www.instagram.com/alpacawandelingschaijk/" target="_blank"><img style="left: calc(80% + 55px)" class="icon" src="IMG/IG.png" ></a>
        </div>
    </header>
        <div class="content">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="evenvoorstellen.php">Even voorstellen</a></li>
                <li><a href="activiteiten.php">Activiteiten</a></li>
                <li><a href="reviews.php" style="background-color: var(--green1);">Reviews</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="fotos.php">Foto's</a></li>
                <li><a href="corona-update.php">Corona update</a></li>
            </ul>
        </div>
    </header>
    <div class="page-wrapper">
        <div class="page-flex">
            <div class="filters">
                <div class="review-button">
                    <form action="" method="POST">
                    <input type="button" value="Review schrijven" onclick="window.location.href='reviews.php?input=newreview';" >
                    </form>
                </div>
            </div>
            <div class="reviews">
                <?php 
                   $row = (New Review)->fetchAll();
                    

                    if (isset($row))
                    {
                        
                        for($i = count($row) - 1; $i >= 0; $i--)
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
                    else if (empty($message))
                    {
                        echo "<div class='review'><p class='review-content'>Er zijn nog geen reviews geplaatst.</p></div>";
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>


