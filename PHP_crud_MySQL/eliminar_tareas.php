<?php

    include("db.php");

    if(isset($_GET['ID'])){
        $ID = $_GET['ID'];

        $query = "DELETE FROM tareas WHERE ID = $ID";
        $result = mysqli_query($conn, $query);

        if(!$result){
            die("Fallo la consulta");
        }
        $_SESSION['message'] ='Tarea eliminada correctamente';
        $_SESSION['message_type'] = 'danger';
        header('Location: index.php');
    }

?>