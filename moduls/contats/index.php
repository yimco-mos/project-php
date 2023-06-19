<?php

include("../../conection.php");

$stm = $conection->prepare("SELECT * FROM contactos");
$stm->execute();
$contact = $stm->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['id'])) {
    $txtid = (isset($_GET['id']) ? $_GET['id'] : "");
    $stm = $conection->prepare("DELETE FROM contactos WHERE id=:txtid");
    $stm->bindParam(":txtid", $txtid);
    $stm->execute();
    header("location:index.php");
}


?>



<?php include("../../template/header.php") ?>


<div class="table-responsive m-5 ">

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
        Nuevo
    </button>
    <table class="table ">
        <thead class="table table-dark ">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre 2</th>
                <th scope="col">telefono 3</th>
                <th>fecha 3</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contact as $contacto) { ?>
                <tr class="">
                    <td scope="row">
                        <?php echo $contacto['id']; ?></td>
                    <td><?php echo $contacto['nombre']; ?></td>
                    <td><?php echo $contacto['telefono']; ?></td>
                    <td><?php echo $contacto['fecha']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $contacto['id'] ?>;" class="btn btn-success">editar</a>

                        <a href="index.php?id=<?php echo $contacto['id'] ?>;" class="btn btn-danger">eliminar</a>

                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php include("create.php") ?>

<?php include("../../template/footer.php") ?>