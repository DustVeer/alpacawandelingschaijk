<?php 
require("../classes/Image.php");

$image = new Image();
?>

<form action="" method="POST" enctype="multipart/form-data">
    <label>Upload Foto</label>
    <input type="file" name="file[]" multiple>
    <input type="submit" name="submitFile">
</form>
<form action="" method="POST">
    <label>Delete Foto</label>
    <input list="delete" name="deleteImage">
    <datalist id="delete">
    <?php 
        $row = $image->fetchAll();

        for ($i = 0; $i < count($row); $i++)
        {
            $subImage = substr($row[$i]["image_path"], 16);
            echo "<option value='" .  $subImage . "'>";
        }

    ?>
    </datalist>
    <input type="submit" name="submitDelete">
</form>
<?php 

if(isset($_POST["deleteImage"]))
{
    $delete = "../IMG-fotoPage/" . $_POST["deleteImage"];
    $image->set_image_path($delete);
    $image->delete();
}

?>
<?php

if(isset($_POST["submitFile"])) {

    for ($i = 0; $i < count($_FILES["file"]["name"]); $i++)
    {
        $target_dir = "../IMG-fotoPage/";
        $target_file = $target_dir . basename($_FILES["file"]["name"][$i]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        for ($j = 0; $j < count($row); $j++)
        {
            if ($row[$j]["image_path"] == $target_file)
            {
                $uploadOk = 0;
            }
        }
        
        if (move_uploaded_file($_FILES["file"]["tmp_name"][$i], $target_file) && $uploadOk == 1) 
        {
            $image->set_image_path($target_file);
            $image->add();
            echo "</br>";
            echo "The file <p class='font-weight'>". htmlspecialchars(basename( $_FILES["file"]["name"][$i])). "
            </p> has been uploaded.";
            
        } 
        else 
        {
            echo "<p class='font-weight' >There was an error please contact an admin.</p>";
        }
    }
}
?>
<style>
label {
    display: block;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 1.3rem;
    margin-top: 20px
}
.font-weight {
    font-weight: 900;
    font-family: Arial, Helvetica, sans-serif;
}

</style>