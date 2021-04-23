<?php 
session_start();

if (isset($_GET["require"])) {$require = $_GET["require"];}
else {$require = "";}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <link rel="stylesheet" href="../CSS/Style.css">
    <title>AlpacaWandelingSchaijk</title>
    <link rel="icon" href="IMG/Alpaca_Logo.png" type="image/icon type">
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
                <li><a>Admin</a></li>
                <li><a href="loggedin.php?require=Corona">Corona-Update</a></li>
                <li><a href="loggedin.php?require=Foto">Foto's</a></li>
            </ul>
        </div>
    </header>
    <div class="page-wrapper">
        <?php 
        echo "Test";
            if ($require == "Corona")
            {
                require("corona-edit.php");
            }
            else if ($require == "Foto")
            {
                require("foto-edit.php");
            }
           
        ?>
    </div>
</body>
</html>
