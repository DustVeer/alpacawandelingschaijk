<!DOCTYPE html>
<html lang="nl">
<head>
    <link rel="stylesheet" href="CSS/Style.css">
    <link rel="stylesheet" href="CSS/Reservering.css">
    <link rel="stylesheet" href="CSS/Contact.css">
    <title>AlpacaWandelingSchaijk</title>
    <link rel="icon" href="IMG/Alpaca_Logo.png" type="image/icon type">
</head>
<body>
    <header>
        <header>
        <img style="height: 100%; width: 100%;" src="IMG/border.jpg">
        <a href="index.php"><img class="small-logo" src="IMG/Alpaca_Logo.png"></a>
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
                <li><a href="contact.php">Contact</a></li>
                <li><a href="Reservering.php" style="background-color: var(--green1);">Reservering</a></li>
                <li><a href="fotos.php">Foto's</a></li>
                <li><a href="corona-update.php">Corona update</a></li>
            </ul>
        </div>
    </header>
    <?php if (isset($_GET["reservering"])):?>
    <div class="reservering">
        <div class="form-wrapper">
            <p style="font-size: 1.9rem;" class="titels">Reservering</p>
            <p class="page-text">* verplichte velden</p>
            </br><hr></br>
            <form action="actions/contact-form.php" method="POST">


                <!-- NAAM -->
                <label for="name">Naam *</label>
                <input class="form-input" name="name_res" type="text" required>


                <!-- E-MAIL -->
                <label for="email">E-mail</label>
                <input class="form-input" name="email" type="text">


                <!-- TELEFOONNUMMER --> 
                <label for="phone">Telefoonnummer *</label>
                <input class="form-input" name="phone_reservering" type="text" required>

                <!-- DATUM -->
                <label for="date">Datum *</label>
                <input class="form-input" name="date" type="date" id="myDate" value="<?php $date = date("Y-m-d", strtotime($_GET["reservering"])); echo $date;?>" required>

                <!-- AANTAL PERSONEN -->
                <label for="number_people">Aantal personen *</label>
                <input style="width: 10%;" class="form-input" name="number_people" type="number" min="1" max="20" required>

                <!-- OPMERKING -->
                <label for="remark">Opmerking</label>
                <textarea class="form-input" name="remark" type="text"></textarea>

                <!-- SUBMIT -->
                <div class="form-submit">
                    <input class="button" value="Terug" type="button" onclick="window.location.href='Reservering.php'">
                    <input value="Verzenden" type="submit">
                </div>
                    
            </form>
                
            
            
        </div>
        
    </div>
    <?php endif ?>
    <div class="page-wrapper">
        <div class="tabel-wraper">
            <table class="calender">
                <thead>
                    <tr>
                        <td class="weekdays">Ma</td>
                        <td class="weekdays">Di</td>
                        <td class="weekdays">Wo</td>
                        <td class="weekdays">Do</td>
                        <td class="weekdays">Vr</td>
                        <td class="weekdays">Za</td>
                        <td class="weekdays">Zo</td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        require("classes/Reservering.php");
                        $getdate = getdate();
                        if ($getdate["wday"] == 0) {$getdate["wday"] = 7;}
                        $calcDate = "-" . ($getdate["wday"] - 1) . " day";
                        $date = date("d-m-Y",strtotime($calcDate));
                        $day = date("d", strtotime($date));
                        $monthName = date("F", strtotime($date));
                        $color;
                        $fullDate = 0;
                        $extraDate = 0;
                        $under6Person = 0;

                        
                        $reservering = new Reservering;
                        $row = $reservering->fetch_wandel_datum();

                        $schema = $reservering->fetch_schema();
                        $date_under6 = $reservering->fetch_wandel_datum_onder6();
                        $double_date = $reservering->fetch_date();

                        echo "<pre>";
                        print_r($double_date);
                        echo "</pre>";


                        // Weeks
                        for ($i = 0; $i < 7; $i++)
                        {
                            echo "<tr>";

                            // Days of the week
                            for ($j = 0; $j < 7; $j++)
                            {

                                

                                // Extra datum door de week
                                for ($h = 0; $h < count($schema); $h++)
                                {
                                    if (date("Y-m-d",strtotime($date)) == $schema[$h][0])
                                    {
                                        $extraDate = 1;
                                        break;
                                    }
                                    else {$extraDate = 0;}
                                }

                                // Wandel datum onder 6 personen
                                for ($u = 0; $u < count($date_under6); $u++)
                                {
                                    if (date("Y-m-d",strtotime($date)) == $date_under6[$u][0])
                                    {
                                        $under6Person = 1;
                                        $extraDate = 0;
                                        break;
                                    }
                                    else {$under6Person = 0;}
                                }

                                // Als er een reservering is boven de 6 personen
                                for ($l = 0; $l < count($double_date); $l++)
                                {
                                    if (date("Y-m-d",strtotime($date)) == $double_date[$l][1] && $double_date[$l][0] >= 7)
                                    {
                                        $fullDate = 1;
                                        $under6Person = 0;
                                        break;
                                    }
                                    else
                                    {
                                        $fullDate = 0;
                                    }
                                }
                                
                                // Button
                                $button = "<button class='table-button' onclick='window.location.href=\"reservering.php?reservering=" .  $date . "\"'>Reserveer</button>";
                                

                                // Green, Button = True
                                if ($j >= 5 && $fullDate == 0 && $under6Person == 0|| $extraDate == 1 && $fullDate == 0) 
                                {$color ="var(--green1)"; } 

                                // Red, Button = False
                                else if ($fullDate == 1) 
                                {$color ="rgb(134, 35, 35)"; $button = "";} 

                                // Orange, Button = True
                                else if ($under6Person == 1) 
                                {$color ="rgb(255, 123, 0)";}

                                // Gray, Button = False
                                else 
                                {$color ="gray"; $button = "";}
                                

                                // Month Name
                                if ($day != "01") 
                                {$monthName = "";}
                                
                                // Date-Block
                                echo "<td style='background-color: " . $color . "' class='date-block'><p class='date'>". $monthName . " " . $day . "</p>" . $button . "</td>";
                                
                                // Date +1 day
                                $date = date('d-m-Y', strtotime($date . ' +1 day'));
                                
                                // Day (01)-01-2021
                                $day = date("d", strtotime($date));
                                
                                // Month Name
                                $monthName = date("F", strtotime($date));

                            }
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function DisableTable()
        {
            x = document.getElementsByClassName("date-block");
            for (i = 0; i < x.length; i++)
            {
                x[i].style.display = "none";
            } 
        }
    </script>
    <?php if (isset($_GET["reservering"])): ?>
    <script type="text/javascript">DisableTable();</script>
    <?php endif ?>
</body>
</html>