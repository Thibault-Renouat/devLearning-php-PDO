<?php include("menu.php"); ?>
    <hr>

<?php
function search($aString,$letter){

    echo substr_count ( $aString,$letter);

}

search('toto', 't');


/*function search($aString, $letter) {

    $arr1 = str_split($aString);
    $i=0;

    while (in_array($letter, $arr1)== true){


        $arr1.search($letter);    }




}*/

