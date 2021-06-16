<?php require("../classes/Reservering.php"); 
$reservering = new Reservering();

$row = $reservering->fetchAll_bevestigdNo();

if (isset($_GET["aantal_beschikbaar"]) && isset($_GET["datum"])&& $_GET["aantal_beschikbaar"] != "0")
{
    $toInt = intval($_GET["aantal_beschikbaar"]);
    $reservering->set_wandel_datum($_GET["datum"]);
    
    $reservering->set_aantal_personen($toInt);

    $reservering->add_dummy();
    header("Location: loggedin.php?require=Reservering");
}
else if (isset($_GET["remove_datum"]))
{
    $reservering->set_wandel_datum($_GET["remove_datum"]);
    $reservering->delete_dummy();
    header("Location: loggedin.php?require=Reservering");
}

if (isset($_POST["bevestig"]))
{
    $date = substr($_POST["bevestig"], -10);
    $name = substr($_POST["bevestig"], 0 ,-12);
    
    $reservering->set_bevestigd(1);
    $reservering->set_name($name);
    $reservering->set_wandel_datum($date);

    $reservering->change_bevestigd();
}

if (isset($_POST["add_date"]))
{
    $reservering->set_datum($_POST["add_date"]);
    $reservering->add_datum();
}

if (isset($_POST["delete_date"]))
{
    $reservering->set_datum($_POST["delete_date"]);
    $reservering->delete_datum();
}

?>
<form action="" method="POST">
    <label for="bevestig">Reservering:</label>
    <input class="form-input" list="bevestig" name="bevestig">
        <datalist id="bevestig">
        <?php 
            $array = $reservering->fetchALL_capaciteit();
            for ($i = 0; $i < count($row); $i++)
            {
                echo "<option value='" . $row[$i]["naam"] . ": " .  $row[$i]["wandel_datum"] . "'>";
            }
        ?>
        </datalist>
    <input type="submit" value="Bevestig">
</form>

<form action="" method="POST">
    <label for="add_date">Datum toevoegen</label>
    <input class="form-input" type="date" name="add_date">
    <input type="submit" value="Voeg toe">
</form>

<form action="" method="POST">
    <label for="delete_date">Datum Verwijderen</label>
    <input class="form-input" type="date" name="delete_date">
    <input style="background-color: rgb(134, 35, 35);" type="submit" value="Verwijder">
</form>

<form action="" method="POST">
<input style="margin-top: 20px;" type="submit" name="reservering_toevoegen" value="Reservering toevoegen">
</form>

<?php if (isset($_POST["reservering_toevoegen"])): ?>
<form action="todatabase.php" method="POST">


    <!-- NAAM -->
    <label for="name">Naam *</label>
    <input class="form-input" name="name" type="text" required>


    <!-- E-MAIL -->
    <label for="email">E-mail</label>
    <input class="form-input" name="email" type="text">


    <!-- TELEFOONNUMMER --> 
    <label for="phone">Telefoonnummer *</label>
    <input class="form-input" name="phone" type="text">

    <!-- DATUM -->
    <label for="date">Datum *</label>
    <input class="form-input" name="date" type="date" required>

    <!-- AANTAL PERSONEN -->
    <label for="number_people">Aantal personen *</label>
    <input style="width: 10%;" class="form-input" name="number_people" type="number" min="1" max="20" required>

    <!-- OPMERKING -->
    <label for="remark">Opmerking</label>
    <textarea class="form-input" name="remark" type="text"></textarea>

    <!-- SUBMIT EN TERUG -->
    <div class="form-submit">
        <input class="button" value="Terug" type="button" onclick="window.location.href='loggedin.php?require=Reservering'">
        <input value="Verzenden" type="submit">
    </div>
                    
</form>
<?php $_POST["reservering_toevoegen"] = null?>

<?php endif ?>


<table>

    <thead>
        <tr>
            <td class="headers">Datum</td>
            <td class="headers">Aantal beschikbaar</td>
            <td class="headers">Aantal reserveringen</td>
        </tr>
    </thead>

    <tbody>
        <?php 
        
        for ($j = 0; $j < min(count($array),40); $j++)
        {
            if (strtotime($array[$j][1]) > strtotime(date("Y-m-d")))
            {
                //BUTTON
                $buttonEmpty = "<button class='table-button' onclick='window.location.href=\"loggedin.php?require=Reservering&remove_datum=".$array[$j][1]."\"'>Leeg dag</button>";
                $buttonFull = "<button class='table-button' onclick='window.location.href=\"loggedin.php?require=Reservering&aantal_beschikbaar=" .  $array[$j][2] . "&datum=".$array[$j][1]."\"'>Volle dag</button>";

                //RED, BUTTON DISABLED
                if ($array[$j][2] <= 1) {$color = "rgb(134, 35, 35)"; $buttonFull = "";}

                //ORANGE
                else if ($array[$j][2] == 2) {$color = "rgb(255, 123, 0)";}

                //GREEN
                else {$color = "var(--green1)";$buttonEmpty = "";}

                
                //TABEL
                echo "<tr>";
                echo "<td class='cell'>".$array[$j][1]."</td>";
                echo "<td style='background-color:$color' class='cell'>".$array[$j][2]." $buttonFull</td>";
                echo "<td style='background-color:$color' class='cell'>".$array[$j][3]."$buttonEmpty</td>";
                echo "</tr>";
                
            }
            

        }
        ?>    
    </tbody>
</table>
<style>
table {
    margin-top: 20px;
    border: 2px black solid;
    border-radius: 10px;
    border-spacing: 10px;
    background-color: rgb(185, 185, 185);
}
.headers {
    font-size: 1.2rem;
    font-family: Arial, Helvetica, sans-serif;
}
.cell {
    width: 150px;
    height: 80px;
    text-align: center;
    background-color: white;
    font-size: 1.2rem;
    font-family: Arial, Helvetica, sans-serif;
    border-radius: 10px;
    border: 1px black solid;
    
}
label {
    font-size: 1.3rem;
    font-family: Arial, Helvetica, sans-serif;
    display: block;
}
.form-input {
    width: 400px;
    height: 50px;
    font-size: 1.3rem;
}
.table-button {
    width: 90px;
    height: 40px;
    font-size: 1rem;
    background-color: var(--green4);
    color: whitesmoke;
}
input[type=submit], input[type=button] {
    padding: 3px 8px;
    height: 50px;
    font-size: 1.3rem;
    background-color: var(--green1);
    color: whitesmoke;
}
input[type=button] {
    background-color: rgb(134, 35, 35);
}

</style>
