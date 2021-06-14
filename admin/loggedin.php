<?php session_start();
if (isset($_GET["require"])) {$require = $_GET["require"];}
else {$require = "";}

if (isset($_SESSION["username"]) && isset($_SESSION["password"]))
{
    if ($_SESSION["username"] == "Admin" && $_SESSION["password"] == "GQ-jWzm37gPdx"){}
    else {header("Location index.php");}
}
else {header("Location index.php");}
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
                <li><a href="loggedin.php?require=Reservering">Reserveringen</a></li>
            </ul>
        </div>
    </header>
    <div class="page-wrapper">
        <?php 
            if ($require == "Corona")
            {
                require("corona-edit.php");
            }
            else if ($require == "Foto")
            {
                require("foto-edit.php");
            }
            else if ($require == "Reservering")
            {
                require("reserveringen.php");
            }
           
        ?>
    </div>
</body>
</html>
