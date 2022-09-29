<?php

include_once "config.php";
include_once "entidades/cliente.php";
include_once "entidades/genero.php";
include_once("index.php");

$cliente = new Cliente();
$cliente->cargarFormulario($_REQUEST);

$pg = "cliente nuevo";

if ($_POST) {
    if (isset($_POST["btnGuardar"])) {
        if (isset($_GET["id"]) && $_GET["id"] > 0) {
            //Actualizo un cliente existente
            $cliente->actualizar();
        } else {
            //Es nuevo
            $cliente->insertar();
        }
        /* $msg["texto"] = "Guardado correctamente";
        $msg["codigo"] = "alert-success"; */
    } else if (isset($_POST["btnBorrar"])) {
        $cliente->eliminar();
        /* $msg["texto"] = "Eliminado exitosamente";
        $msg["codigo"] = "alert alert-warning"; */
        /* header("Location:cliente-nuevo.php"); */
    }
}
if (isset($_GET["id"]) && $_GET["id"] > 0) {
    $cliente->obtenerPorId();
}

$genero = new Genero();
$aGeneros = $genero->obtenerTodos();


?>
<main id="main" class="main">
    <section class="section">

        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Cliente</h1>
            <?php if (isset($msg)) : ?>
                <div class="row">
                    <div class="col-12">
                        <div class="alert <?php echo $msg["codigo"]; ?>" role="alert">
                            <?php echo $msg["texto"]; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row table table-hover border shadow">
                <form class="d-grid mx-5" method="POST">
                    <div class="col-6 form-group">
                        <label class="mx-5 mt-3" for="txtDni">DNI:</label>
                        <input type="text" required class="form-control shadow mx-5 " name="txtDni" id="txtDni" value="<?php echo $cliente->dni ?>" maxlength="11">
                    </div>
                    <div class="col-6 form-group">
                        <label class="mx-5 mt-3" for="txtNombre">Nombre:</label>
                        <input type="text" required class="form-control shadow mx-5 " name="txtNombre" id="txtNombre" value="<?php echo $cliente->nombre ?>">
                    </div>
                    <div class="col-6 form-group">
                        <label class="mx-5 mt-3" for="txtApellido">Apellido:</label>
                        <input type="text" class="form-control shadow mx-5 " name="txtApellido" id="txtApellido" required value="<?php echo $cliente->apellido ?>">
                    </div>
                    <div class="col-6 form-group">
                        <label class="mx-5 mt-3" for="lstGenero">Género:</label>
                        <select class="form-control shadow mx-5 " name="lstGenero" id="lstGenero">
                            <option value="" disabled selected>Seleccionar</option>
                            <?php foreach ($aGeneros as $genero) : ?>
                                <?php if ($cliente->fk_idgenero == $genero->idgenero) : ?>
                                    <option selected value="<?php echo $genero->idgenero; ?>"><?php echo $genero->tipo; ?></option>
                                <?php else : ?>
                                    <option value="<?php echo $genero->idgenero; ?>"><?php echo $genero->tipo; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-6 form-group">
                        <label class="mx-5 mt-3" for="txt">Telefono:</label>
                        <input type="number" class="form-control shadow mx-5 mb-3" name="txtTelefono" id="txtTelefono" value="<?php echo $cliente->telefono ?>">

                    </div>
            </div>
        </div>
        <div class="row mt-3">
            <div style="visibility:hidden " class="col-8">
                <p>Listado</p>
            </div>
            <div class="col-4 mt-3">
                <a href="cliente-listar.php" class="btn btn-primary mr-2">Listado</a>
                <button type="button" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar" data-bs-toggle="modal" data-bs-target="#GuardarModal">
                    Guardar
                </button>
                <!-- <button type=" submit" href="#" class="btn btn-danger" id="btnBorrar" name="btnBorrar" data-bs-toggle="modal" data-bs-target="#exampleModal">Borrar</button> -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Borrar
                </button>
            </div>
            <!-- Button trigger modal -->

            <!-- Modal -->
            <div class="modal fade" id="GuardarModal" tabindex="3" aria-labelledby="GuardarModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content text-center">

                        <div class="modal-body">
                            <i class="fa-solid fa-check my-5" style="scale:500%; color:green"></i>
                            <h4 class="modal-title my-3 py-3" id="GuardarModal">Operación exitosa!</h4>
                            
                            <button type="submit" class=" btn btn-secondary" data-bs-dismiss="modal" id="btnGuardar" name="btnGuardar">
                                Cerrar
                            </button>


                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content text-center">

                        <div class="modal-body">
                            <i class="fa-solid fa-circle-exclamation my-5" style="scale:500%; color:orange;"></i>
                            <h5 class="modal-title my-3" style="color: grey;" id="exampleModalLabel">Estas seguro?</h5>
                            <p class="my-3" style="color: grey;">El elemento elminado no podrá recuperarse</p>
                            <a href="cliente-listar.php">
                                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal" id="btnBorrar" name="btnBorrar">Confirmar</button>
                            </a>
                            <a type="button" href="cliente-listar.php" class="btn btn-danger">Cancelar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </section>

</main>


<script src="web/js/jquery-3.4.1.min.js"></script>
<!-- popper js -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<!-- bootstrap js -->
<script src="web/js/bootstrap.js"></script>
<!-- owl slider -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
</script>
<!-- isotope js -->
<script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
<!-- nice select -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
<!-- custom js -->
<script src="web/js/custom.js"></script>
<!-- /.container-fluid -->