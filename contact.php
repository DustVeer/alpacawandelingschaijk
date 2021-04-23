<?php 
session_start();
if (isset($_GET["error"]))
{ $error = $_GET["error"]; }
else { $error = ""; }

if (isset($_GET["succes"]))
{ $succes =  $_GET["succes"];}
else { $succes = ""; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="CSS/Contact.css">
    <link rel="stylesheet" href="CSS/Style.css">
    <title>AlpacaWandelingSchaijk</title>
    <link rel="icon" href="IMG/Alpaca_Logo.png" type="image/icon type">
</head>
<body>
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
                <li><a href="reviews.php">Reviews</a></li>
                <li><a href="contact.php" style="background-color: var(--green1);">Contact</a></li>
                <li><a href="fotos.php">Foto's</a></li>
                <li><a href="corona-update.php">Corona update</a></li>
            </ul>
        </div>
    </header>
    <div class="page-wrapper">
        </br>
        <p class="titels">
            Alpacawandeling Schaijk
        </p><hr>
        <p class="page-text">Lage Baan 12</p>
        <p class="page-text">5374 NN Schaijk</p> 
        <p class="page-text">06 – 52 084 580</p>  
        <p class="page-text"></br>
            Voor reserveringen en ander vragen kunt u contact met ons opnemen via het contactformulier of u kunt ons bellen.
        </p>
        <?php 
            if ($succes == "succes")
            {
                echo "<p style='font-size: 1.5rem; margin-top: 20px; color: green;' class='page-text'>Uw bericht is met succes verstuurd.</p>";
            }
        ?>
        <div class="form-wrapper">
            <div class="contact-form">
                <div class="top-form">
                    <p style="font-size: 2rem;" class="titels">Uw vraag</p>
                    <p style="font-family: Arial, Helvetica, sans-serif; margin-top:5px;">* verplichte velden</p></br><hr>
                </div>
                <div class="mid-form">
                    <form action="actions/contact-form.php" method="POST">
                    <label>Naam *</label><?php
                    if ($error == "name")
                    {
                        echo "<p class='page-text' style='color:red;'>Naam is te lang</p>";
                    }
                    ?>
                    <input class="form-input" type="text" name="name" required>
                    <label>Telefoon nummer</label>
                    <input class="form-input"  type="number" name="phone">
                    <label>E-mail *</label>
                    <input class="form-input"  type="email" name="email" required>
                    <label>Vraag *</label> <p style='font-family: Arial, Helvetica, sans-serif;'>Maximaal 5000 karakters</p>
                    <textarea class="form-questions" name="question" required></textarea>
                    <div class="form-submit">
                        <input value="Verzenden" type="submit">
                    </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>