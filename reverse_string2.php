<?php include("menu.php"); ?>


<?php


function reverse($aString) {

    for($i = strlen($aString)-1; $i>=0; $i--){
        $reversed='';
        $reversed= $reversed.$aString[$i];
        echo $reversed;
    }
}

echo "<hr>"


?>

<html>

</html>




