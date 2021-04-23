<?php 
    if (isset($_POST["username"]) && isset($_POST["password"])) 
    {
        if ($_POST["username"] == "Admin" && $_POST["password"] == "GQ-jWzm37gPdx")
        {
            header("Location: loggedin.php"); 
        }
    }
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
            </ul>
        </div>
    </header>
    <div class="page-wrapper">
        <form action="" method="POST">
            <input type="text" name="username" required>
            <input type="password" name="password" required>
            <input type="submit">
        </form>
        
    </div>
</body>
</html>

