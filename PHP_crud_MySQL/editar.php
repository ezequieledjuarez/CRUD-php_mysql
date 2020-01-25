<?php

    include("db.php");
    $titulo = '';
    $descripcion= '';

    if(isset($_GET['ID'])){
        $ID = $_GET['ID'];
        $query = "SELECT * FROM tareas WHERE ID = $ID";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_row($result) == 1){
            $row = mysqli_fetch_array($result);
            $titulo = $row['Titulo'];
            $descripcion = $row['Descripcion'];

        }
    }
if(isset($POST['Actualizar'])){
    $ID = $_GET['ID'];
    $titulo = $_POST['Titulo'];
    $descripcion = $_POST['Descripcion'];

    $query = "UPDATE tareas set Titulo = '$titulo', Descripcion = '$descripcion WHERE ID = $ID";
    mysqli_query($conn, $query);
    
    $_SESSION['message'] = 'Tarea actualizada correctamente';
    $_SESSION['message_type'] = 'warning';
    header('Location: index.php');
}   
?>

<?php include("includes/header.php")?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class= "card card-body">
                <form action="editar.php?id?<?php echo $_GET['ID'];?> method = "POST">
                    <div class="form-group">
                        <input  name="titulo" type="text" class="form-control" value="<?php echo $titulo;?>"
                         placeholder="Actualiza el titulo">
                    </div>  
                    <div class="form-group">
                        <textarea name="descripcion" rows="2" class="form-control" 
                        placeholder="Actualiza la descripcion"><?php echo $descripcion;?></textarea>
                    </div>
                    <button class="btn btn-success" name="Actualizar">    
                        Actualizar
                    </button>
                </form>         
            </div>

        </div>

    </div>

</div>
<?php include("includes/footer.php")?>