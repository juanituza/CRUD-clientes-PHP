<?php

//include_once "config.php";
include_once "entidades/cliente.php";
include_once "entidades/genero.php";
include_once "index.php";




$cliente = new Cliente();
$cliente->cargarFormulario($_REQUEST);



if ($_POST) {
    if (isset($_POST["btnGuardar"])) {
        if (isset($_GET["id"]) && $_GET["id"] > 0) {
            //Actualizo un cliente existente
            $cliente->actualizar();
            
            header("Location:cliente-listar.php");
        } else {
            //Es nuevo
            $cliente->insertar();
            header("Location:cliente-listar.php");
        }

    } else if (isset($_POST["btnBorrar"])) {
        $cliente->eliminar();
        header("Location:cliente-listar.php");
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
            <div class="row table table-hover border shadow">
                <form class="d-grid mx-5 g-3 needs-validation" novalidate method="POST">


                    <div class="col-6">

                        <div class="form-floating mb-3 mt-3">
                            <input type="text" required class="form-control shadow mx-5" name="txtDni" id="txtDni" pattern="^[0-9]+" value="<?php echo $cliente->dni ?>" maxlength="11" placeholder="DNI">
                            <label class="mx-5" for="txtDni">DNI:</label>
                            <div class="valid-feedback mx-5">Documento válido.</div>
                            <div class="invalid-feedback mx-5">Debe contener solo números</div>
                        </div>
                    </div>
                    <div class="col-6 ">
                        <div class="form-floating mb-3 mt-3">
                            <input type="text" required class="form-control shadow mx-5" name="txtNombre" id="txtNombre" pattern="^[a-zA-Z\s]{2,254}" placeholder=" Nombre" value="<?php echo $cliente->nombre ?>">
                            <label class="mx-5" for="txtNombre">Nombre:</label>
                            <div class="valid-feedback mx-5">Nombre correcto!.</div>
                            <div class="invalid-feedback mx-5">Debe contener solo letras.</div>
                        </div>
                    </div>
                    <div class="col-6 form-group">
                        <div class="form-floating mb-3 mt-3">
                            <input type="text" class="form-control shadow mx-5 " name="txtApellido" id="txtApellido" pattern="^[a-zA-Z\s]{2,254}" placeholder="Apellido" required value="<?php echo $cliente->apellido ?>">
                            <label class="mx-5" for="txtApellido">Apellido:</label>
                            <div class="valid-feedback mx-5">Nombre correcto!.</div>
                            <div class="invalid-feedback mx-5">Debe contener solo letras.</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating mb-3 mt-3">
                            <select class="form-select  shadow mx-5 " name="lstGenero" id="lstGenero">
                                <option value="" disabled selected>Seleccionar</option>
                                <?php foreach ($aGeneros as $genero) : ?>
                                    <?php if ($cliente->fk_idgenero == $genero->idgenero) : ?>
                                        <option selected value="<?php echo $genero->idgenero; ?>"><?php echo $genero->tipo; ?></option>
                                    <?php else : ?>
                                        <option value="<?php echo $genero->idgenero; ?>"><?php echo $genero->tipo; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <label class="mx-5 form-label" for="lstGenero">Género:</label>
                            <!-- <div class="valid-feedback mx-5">Género correcto!.</div>
                            <div class="invalid-feedback mx-5">Debe contener solo letras.</div> -->
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating mb-3 mt-3">
                            <input type="text" class="form-control shadow mx-5 mb-3" placeholder="Telefono" pattern="^[0-9]+" name="txtTelefono" id="txtTelefono" required value="<?php echo $cliente->telefono ?>">
                            <label class="mx-5" for="txtTelefono">Telefono:</label>
                            <div class="valid-feedback mx-5">Número de teléfono correcto!.</div>
                            <div class="invalid-feedback mx-5">Debe contener solo números</div>
                        </div>
                    </div>


                    <div class="row mt-3">
                        <div style="visibility:hidden " class="col-8">
                            <p>Listado</p>
                        </div>
                        <div class="col-4 mt-3">
                            <a href="cliente-listar.php" class="btn btn-primary mr-2">Listado</a>
                            <button type="submit" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar" data-bs-toggle="modal" data-bs-target="#GuardarModal">
                                Guardar
                            </button>

                            <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Borrar
                            </button>
                        </div>
                        <!-- Button trigger modal -->

                        <!-- Modal -->
                        <!-- <div class="modal fade" id="GuardarModal" tabindex="3" aria-labelledby="GuardarModal" aria-hidden="true">
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

                                        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal" id="btnBorrar" name="btnBorrar">Confirmar</button>
                                        <a type="button" href="cliente-listar.php" class="btn btn-danger">Cancelar</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                </form>
    </section>
</main>



<!-- popper js -->



<script>
    (function() {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })


    let btnGuardar = document.getElementById("btnGuardar");
    btnGuardar.addEventListener("click", guardar);

    function guardar() {
        //alert( " ¡Buen trabajo! " , " ¡Hiciste clic en el botón! " , " Éxito " )   ;
        swal.fire({
            icon: "success",
            title: "Operación exitosa!",
            text: "",
            button: "cerrar"
            
        });
    }
    let btnBorrar = document.getElementById("btnBorrar");
    btnBorrar.addEventListener("click", borrar);

    function borrar() {
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                    });
                } else {
                    swal("Your imaginary file is safe!");
                }
            });

    }
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>
<script src="sweetalert2.min.js"></script>


<script src="/assets/js/sweetAlert2.js"></script>
<!-- /.container-fluid -->