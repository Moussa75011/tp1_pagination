<?php

    //On configure les paramettre de connexion a notre base de données
    $con = mysqli_connect("localhost","root","root","pagination");

    //On test la connxion a la base de données
    if(!$con){
        echo "Erreur de onnexion. Essayez a nouveau ";
    }


?>