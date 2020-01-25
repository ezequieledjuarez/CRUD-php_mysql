<?php include("db.php") ?>

<?php include ("includes/header.php")?>

<div class="container p-4">

    <div class="row">
    
        <div class="col-md-4">

            <?php if(isset($_SESSION['message'])){ ?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <?php session_unset();}?>
            <div class="card card-body">
                <form action="guardar_tareas.php" method="POST">
                    <div class="formgroup">
                        <input type = "text" name="titulo" class="form-control"
                        placeholder="Titulo de la tarea" autofocus>
                    </div>

                    <div class="form-group">
                        <textarea name="descripcion" rows="2"
                        class="form-control" placeholder="Descripcion de la tarea"
                        ></textarea>

                        <input type="submit" class="btn btn-success btn-block"
                        name="guardar_tarea" value= "Guardar Tarea">
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Creado</th>
                        <th>Acciones</th>
                    </tr>

                </thead>
                <tbody>
                    <?php

                    $query = "SELECT * FROM tareas";
                    $resultado_tareas = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_array($resultado_tareas)){?>
                        <tr>
                            <td><?php echo $row['Titulo']?></td>
                            <td><?php echo $row['Descripcion']?></td>
                            <td><?php echo $row['Fecha de creacion']?></td>
                            <td>
                                <a href="editar.php?id=<?php echo $row['ID']?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="eliminar_tareas.php?id=<?php echo $row['ID']?>" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?php include ("includes/footer.php")?>


    