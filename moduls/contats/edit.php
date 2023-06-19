<?php

include("../../conection.php");

if (isset($_GET['id'])) {
    $txtid = (isset($_GET['id']) ? $_GET['id'] : "");
    $stm = $conection->prepare("SELECT * FROM contactos WHERE id=:txtid");
   
   $stm->bindParam(":txtid",$txtid);
    $stm->execute();
    $registro = $stm->fetch(PDO::FETCH_LAZY);
    $nombre = $registro['nombre'];
    $telefono = $registro['telefono'];
    $fecha = $registro['fecha'];
}



if ($_POST) {

    $txtid = (isset($_POST['txtid']) ? $_POST['txtid'] : "");
  
    $nombre = (isset($_POST['nombre']) ? $_POST['nombre'] : "");
    $telefono = (isset($_POST['telefono']) ? $_POST['telefono'] : "");
    $fecha = (isset($_POST['fecha']) ? $_POST['fecha'] : "");

    $stm = $conection->prepare("UPDATE contactos SET nombre=:nombre,telefono=:telefono,fecha=
    :fecha WHERE id=:txtid");
    $stm->bindParam(":nombre", $nombre);
    $stm->bindParam(":telefono", $telefono);
    $stm->bindParam(":fecha", $fecha);
    $stm->bindParam(":txtid", $txtid);
    $stm->execute();
    header("location:index.php"); 
}


?>


<?php include("../../template/header.php") ?>
<form class="display-flex p-5  m-9" method="post">


    <input type="hidden" class="form-control" name="txtid" placeholder="ingrese un nombre" value="<?php echo $txtid; ?>">


    <label for="" class="form-label">nombre</label>
    <input type="text" class="form-control" name="nombre" placeholder="ingrese un nombre" value="<?php echo $nombre; ?>">

    <label for="" class="form-label">telefono</label>
    <input type="text" class="form-control" name="telefono" placeholder="ingrese un telefono" value="<?php echo $telefono; ?>">

    <label for="" class="form-label">fecha</label>
    <input type="date" class="form-control" name="fecha" value="<?php echo $fecha; ?>">

    <div class="modal-footer">
        <a href="index.php"   class="btn btn-danger">cancelar</a>
        <button type="submit" class="btn btn-primary">actualizar</button>
    </div>
</form>

<?php include("../../template/footer.php") ?>