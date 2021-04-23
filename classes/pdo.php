<?php 
if (true)
{
    define("dbname", "ernstandereogen_alpacawandelingschaijk");
    define("dbuser", "ernstandereogen_ernstandereogen");
    define("dbpass", "GQ-jWzm37gPdx");
}
else
{
    define("dbname", "ernstandereogen_alpacawandelingschaijk");
    define("dbuser", "root");
    define("dbpass", "");
}


$pdo = new PDO("mysql:host=localhost;dbname=" . dbname, dbuser, dbpass);

?>