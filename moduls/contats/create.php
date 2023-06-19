<?php
if ($_POST) {


    $nombre = (isset($_POST['nombre']) ? $_POST['nombre'] : "");
    $telefono = (isset($_POST['telefono']) ? $_POST['telefono'] : "");
    $fecha = (isset($_POST['fecha']) ? $_POST['fecha'] : "");

    $stm = $conection->prepare("INSERT INTO contactos(id,nombre,telefono,fecha)
    VALUES(null,:nombre,:telefono,:fecha)");
    $stm->bindParam(":nombre", $nombre);
    $stm->bindParam(":telefono", $telefono);
    $stm->bindParam(":fecha", $fecha);
    $stm->execute();
    header("location:index.php"); 
}


?>


<!-- modal create-->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">agregar contacto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <form method="post">
                        <label for="" class="form-label">nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="ingrese un nombre" value="">

                        <label for="" class="form-label">telefono</label>
                        <input type="text" class="form-control" name="telefono" placeholder="ingrese un telefono" value="">

                        <label for="" class="form-label">fecha</label>
                        <input type="date" class="form-control" name="fecha" value="">

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save new</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>