<?php

include("db.php");

if (isset($_POST['guardar_tarea'])){

    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    
    $query  = "INSERT INTO tareas(Titulo, Descripcion) VALUES ('$titulo', '$descripcion')";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("Fallo la consulta");

    }

    $_SESSION['message'] = 'Tarea Guardada Satisfactoriamente';
    $_SESSION['message_type'] = 'success';
    //Para color rojo, danger
    header("Location: index.php");
}

?>