<?php 
require("classes/pdo.php");
$date = date('Y-m-d');



for ($i = 0; $i < 104; $i++)
{
    for ($j = 0; $j < 7; $j++)
    {
        $getdate = getdate(strtotime($date));

        if ($getdate["weekday"] == "Saturday" || $getdate["weekday"] == "Sunday")
        {
            $parameters = array(':datum'=>$date);
            $sth = $pdo->prepare("INSERT INTO capaciteit (datum) VALUES (:datum)");
            $sth->execute($parameters);
        }
        $date = date('Y-m-d', strtotime($date . ' +1 day'));
        
    }
}

?>