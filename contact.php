<?php 
session_start();
if (isset($_GET["error"]))
{   $error = $_GET["error"]; }
else { $error = null; }

if (isset($_GET["succes"]))
{ $succes =  $_GET["succes"];}
else { $succes = null; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- s<script src='https://www.google.com/recaptcha/api.js'></script>  -->
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
            else if ($succes == "succes_res")
            {
                echo "<p style='font-size: 1.5rem; margin-top: 20px; color: green;' class='page-text'>Let op, uw reservering is pas definitief als wij deze bevestigd hebben per e-mail.</p>";
            }
        ?>
        <div class="form-wrapper">
            <div class="contact-form">
                <div class="top-form">
                    <p style="font-size: 2rem;" class="titels">Neem contact met ons op</p>
                    <p style="font-family: Arial, Helvetica, sans-serif; margin-top:5px;">* verplichte velden</p></br><hr>
                </div>
                <div class="mid-form">
                    <form action="actions/contact-form.php" method="POST">

                    <!-- RADIOS -->
                    <div class="radios">
                        <label>Reservering:</label>
                        <input class="radio" name="Reservation" value="Reservering" type="radio" onclick="DisplayRes(1)" <?php if ($error == "vraag") {} else {echo "checked";} ?>>
                        <label>Vraag:</label>
                        <input class="radio"  name="Reservation" value="Vraag" type="radio" onclick="DisplayRes(0)" <?php if ($error == "vraag") {echo "checked";} ?>>
                    </div>

                    <!-- NAAM -->
                    <label>Naam *</label><?php
                    if ($error == "name")
                    {
                        echo "<p class='page-text' style='color:red;'>Naam is te lang</p>";
                    }
                    ?>
                    <input class="form-input" value="<?php  
                    if (isset($_SESSION["name"]) && isset($error)) {echo $_SESSION["name"];} ?>" type="text" name="name" required>

                    <!-- TELEFOON NUMMERS -->
                    <label class="vraag">Telefoon nummer</label> 
                    <input class="form-input vraag" value="<?php  
                    if (isset($_SESSION["phone_vraag"]) && isset($error)) {echo $_SESSION["phone_vraag"];} ?>" type="number" name="phone_vraag">

                    <label class="reservering">Telefoon nummer *</label><?php if ($error == "phone") 
                    { echo "<p class='page-text' style='color:red;'>Voer een telefoon nummer in</p>"; } ?> 
                    <input class="form-input reservering" value="<?php  
                    if (isset($_SESSION["phone_reservering"]) && isset($error)) {echo $_SESSION["phone_reservering"];} ?>"  type="number" name="phone_reservering">

                    <!-- E-MAIL -->
                    <label>E-mail *</label>
                    <input class="form-input" value="<?php if (isset($_SESSION["email"]) && isset($error)) {echo $_SESSION["email"];} ?>" type="email" name="email" required>

                    <!-- VRAAG -->
                    <label class="vraag">Vraag *</label> <p class="vraag" style='font-family: Arial, Helvetica, sans-serif;'>Maximaal 5000 karakters</p>
                    <?php if ($error == "vraag") 
                    { echo "<p class='page-text' style='color:red;'>Voer een vraag in</p>"; } ?>
                    <textarea class="form-questions vraag"  value="<?php  
                    if (isset($_SESSION["question"]) && isset($error)) {echo $_SESSION["question"];} ?>" name="question"></textarea>

                    <!-- DATUM -->
                    <label class="reservering">Datum van de wandeling *</label><?php if ($error == "date") 
                    { echo "<p class='page-text' style='color:red;'>Voer een datum in</p>"; } ?>
                    <input type="date" value="<?php  
                    if (isset($_SESSION["date"]) && isset($error)) {echo $_SESSION["date"];} ?>" name="date">

                    <!-- AANTAL PERSONEN -->
                    <label class="reservering">Aantal personen *</label><?php if ($error == "people") 
                    { echo "<p class='page-text' style='color:red;'>Voer het aantal personen in</p>"; } ?>
                    <input style="width: 10%;" value="<?php  
                    if (isset($_SESSION["number_people"]) && isset($error)) {echo $_SESSION["number_people"];} ?>" class="form-input reservering"  type="number" name="number_people" max="20" min="1">
                    
                    <!-- OPMERKINGEN -->
                    <label class="reservering">Opmerkingen</label> <p class="reservering" style='font-family: Arial, Helvetica, sans-serif;'>Maximaal 5000 karakters</p>
                    <textarea class="form-questions reservering" value="<?php  
                    if (isset($_SESSION["remark"]) && isset($error)) {echo $_SESSION["remark"];} ?>" name="remark"></textarea>
                    

                    

                    <!-- SUBMIT -->
                    <div class="form-submit">
                        <input value="Verzenden" type="submit">
                    </div>

                    <script>
                    function ScrollPos(n)
                    {
                        window.scrollTo(0, n);
                    }
                    function DisplayRes(n)
                    {
                        date = document.getElementsByName("date");
                        vraag = document.getElementsByClassName("vraag");
                        res = document.getElementsByClassName("reservering");
                        if (n == 1)
                        {
                            date[0].style.display = "block";
                            for (i = 0; i < res.length; i++)
                            {
                                res[i].style.display = "block";
                            }
                            for (i = 0; i < vraag.length; i++)
                            {
                                vraag[i].style.display = "none";
                            }
                        }
                        else
                        {
                            date[0].style.display = "none";
                            for (i = 0; i < vraag.length; i++)
                            {
                                vraag[i].style.display = "block";
                            }
                            for (i = 0; i < res.length; i++)
                            {
                                res[i].style.display = "none";
                            }
                        }
                    }
                    DisplayRes(<?php if ($error == "vraag") {echo 0;} else {echo 1;} ?>)
                    <?php if ($error != "") {echo "ScrollPos(1000)";} ?>
                    </script>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>