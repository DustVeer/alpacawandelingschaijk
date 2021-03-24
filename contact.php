<?php 
if (isset($_GET["error"]))
{ $error = $_GET["error"]; }
else { $error = ""; }

if (isset($_GET["succes"]))
{ $sucess =  $_GET["succes"];}
else { $sucess = ""; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="CSS/Contact.css">
    <link rel="stylesheet" href="CSS/Style.css">
    <title>Home</title>
</head>
<body>
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
                <li><a href="reviews.php">Reviews</a></li>
                <li><a href="contact.php" style="background-color: var(--green1);">Contact</a></li>
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
        <?php if ($sucess == "succes")
        {
            echo "<p style='color: green;' class='page-text'>Uw vraag is met succes verstuurd.</p>";
        } ?>
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
                    <label>Vraag *</label>
                    <textarea class="form-questions" name="question" required></textarea>
                    <input value="Verzenden" type="submit">
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>