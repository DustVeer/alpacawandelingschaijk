<!DOCTYPE html>
<html lang="nl">
<head>
    <link rel="stylesheet" href="CSS/Style.css">
    <link rel="stylesheet" href="CSS/Fotos.css">
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
                <li><a href="contact.php">Contact</a></li>
                <li><a href="fotos.php" style="background-color: var(--green1);">Foto's</a></li>
                <li><a href="corona-update.php">Corona update</a></li>
            </ul>
        </div>
    </header>
    <div class="page-wrapper">
        <div class="fotos-div">
        <?php 
            require("classes/Image.php");
            $images = (new Image)->fetchAll();
            
            for ($i = 0; $i < count($images); $i++)
            {
                $j = (count($images) - 1) - $i;
                $image = substr($images[$j][0], 3);
                echo "<img class='fotos' src='" . $image . "'>";
            }
        ?>
        </div>
    </div>
</body>
</html>