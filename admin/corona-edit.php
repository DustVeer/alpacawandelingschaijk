<?php 
require("../classes/Corona.php");
if (!isset($_SESSION["admin"]))
{
    header("Location: login.php");
}
?>
<div class="form-divs">
    <div class="toevoeg-form-div">
        <p class="titel">Toevoegen aan Corona Update</p>
        <form action="todatabase.php" method="POST">
            <label>Titel</label>
            <input type="text" name="add-titel">
            <label>Text</label>
            <textarea name="text"></textarea>
            <input value="Voeg toe" type="submit">
            </form>
    </div>
    <div class="verwijder-form-div">
        <p class="titel">Verwijder van Corona Update</p>
        <form action="todatabase.php" method="POST">
            <label>Titel</label>
            <input list="delete" name="delete-titel">
                <datalist id="delete">
                    <?php 
                        $row = (new Corona)->fetchAll();
                        for ($i = 0; $i < count($row); $i++)
                        {
                            echo "<option value='" .  $row[$i]["titel"] . "'>";
                        }
                    ?>
                </datalist>
            <input value="Verwijder" type="submit">
            </form>
    </div>
</div>
<style>
.form-divs {
    width: 100%;
    display: flex;
    margin-top: 20px;
}
.toevoeg-form-div {
    flex: 1;
}
.verwijder-form-div {
    flex: 1;
}
.titel {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 1.5rem;
}
textarea {
    display: block;
    width: 50%;
    height: 300px;
}
label {
    display: block;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 1.3rem;
}
</style>