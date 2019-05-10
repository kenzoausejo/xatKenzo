<?php

if (isset($_POST["enviar"])) {

    include ('conexio.php');

   $nom = mysqli_real_escape_string($conn, $_POST["nombre"]);
   $missatge = mysqli_real_escape_string($conn, $_POST["mensaje"]);
    // $nom = $_POST["nom"];
    // $missatge = $_POST["missatge"];

    if ($nom != '' && $missatge != '') {

    // Aqui executem una insercio 
        $sql = "insert into missatges values (null, '$nom', '$missatge', time (NOW()))";

    // Aqui Obténim el resultat de la consulta com a un array associatiu i proccem
        if (mysqli_query($conn, $sql)) {
            header("Location: index.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
  //A continuacio tenquem la connexio
        mysqli_close($conn);
    } else {
        header("Location: index.php?mensaje=El campo nombre o texto no puede estar vacio, porfavor rellene todos los campos");
// error(header("Location: index.php?mensaje=El campo nombre o texto no puede estar vacio, porfavor rellene todos los campos"));
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}

?>


