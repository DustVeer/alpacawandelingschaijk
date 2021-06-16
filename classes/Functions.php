<?php 

function translateMonth($value)
{
    switch ($value)
    {
        case ("January"):
            $value = "januari";
            break;
        case ("February"):
            $value = "februari";
            break;
        case ("March"):
            $value = "maart";
            break;
        case ("April"):
            $value = "april";
            break;
        case ("May"):
            $value = "mei";
            break;
        case ("June"):
            $value = "juni";
            break;
        case ("July"):
            $value = "juli";
            break;
        case ("August"):
            $value = "augustus";
            break;
        case ("September"):
            $value = "september";
            break;
        case ("October"):
            $value = "oktober";
            break;
        case ("November"):
            $value = "november";
            break;
        case ("December"):
            $value = "december";
            break;
    }
    
    return $value;
}

?>