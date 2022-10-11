<?php

//include_once "config.php";
include_once "entidades/cliente.php";
include_once "entidades/genero.php";
include_once "index.php";
require_once("entidades/config.php");


$cliente = new Cliente();
$cliente->cargarFormulario($_REQUEST);




$id = $_GET['id'];
$conex = new Config();
$conexion = $conex->conectar();
$consulta = "SELECT * FROM clientes WHERE idcliente = $id";
$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);

$genero = new Genero();
$aGeneros = $genero->obtenerTodos();


?>
<main id="main" class="main">
    <section class="section">

        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Editar cliente</h1>
            <div class="row table table-hover border shadow">
                <form class="d-grid mx-5 g-3 needs-validation" novalidate method="POST">


                    <div class="col-6">

                        <div class="form-floating mb-3 mt-3">
                            <input type="text" required class="form-control shadow mx-5" name="txtDni" id="txtDni" pattern="^[0-9]+" value="<?php echo $usuario['dni'] ?>" maxlength="11" placeholder="DNI">
                            <label class="mx-5" for="txtDni">DNI:</label>
                            <div class="valid-feedback mx-5">Documento válido.</div>
                            <div class="invalid-feedback mx-5">Debe contener solo números</div>
                        </div>
                    </div>
                    <div class="col-6 ">
                        <div class="form-floating mb-3 mt-3">
                            <input type="text" required class="form-control shadow mx-5" name="txtNombre" id="txtNombre" pattern="^[a-zA-Z\s]{2,254}" placeholder=" Nombre" value="<?php echo $usuario['nombre'] ?>">
                            <label class="mx-5" for="txtNombre">Nombre:</label>
                            <div class="valid-feedback mx-5">Nombre correcto!.</div>
                            <div class="invalid-feedback mx-5">Debe contener solo letras.</div>
                        </div>
                    </div>
                    <div class="col-6 form-group">
                        <div class="form-floating mb-3 mt-3">
                            <input type="text" class="form-control shadow mx-5 " name="txtApellido" id="txtApellido" pattern="^[a-zA-Z\s]{2,254}" placeholder="Apellido" required value="<?php echo $usuario['apellido'] ?>">
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
                                        <option selected value="<?php echo $genero->$usuario['genero']; ?>"><?php echo $genero->tipo; ?></option>
                                    <?php else : ?>
                                        <option value="<?php echo $genero->$usuario['genero']; ?>"><?php echo $genero->tipo; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <label class="mx-5 form-label" for="lstGenero">Género:</label>

                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating mb-3 mt-3">
                            <input type="text" class="form-control shadow mx-5 mb-3" placeholder="Telefono" pattern="^[0-9]+" name="txtTelefono" id="txtTelefono" required value="<?php echo $usuario['telefono'] ?>">
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
                            <button type="submit" class="btn btn-success mr-2" id="btnActualizar" name="btnActualizar" data-bs-toggle="modal" data-bs-target="#GuardarModal">
                                Actualizar
                            </button>

                            <a type="submit" href="eliminar_usuario.php?id=<?php echo $cliente->idcliente; ?>" class="btn btn-danger btnBorrar" id="btnBorrar" name="btnBorrar">
                                Borrar
                            </a>
                        </div>
                        <!-- Button trigger modal   data-bs-toggle="modal" data-bs-target="#exampleModal"-->

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


<script src="assets/plugins/SweetAlert/dist/sweetalert2.all.js"></script>
<script src="assets/plugins/SweetAlert/dist/sweetalert2.all.min.js"></script>
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
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
    })()


    $(function() {
        $('#btnActualizar').click(function(e) {

            var valid = this.form.checkValidity();

            if (valid) {


                var dni = $('#txtDni').val();
                var nombre = $('#txtNombre').val();
                var apellido = $('#txtApellido').val();
                var genero = $('#lstGenero').val();
                var telefono = $('#txtTelefono').val();


                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: 'Entidades/editar.php',
                    data: {
                        dni: dni,
                        nombre: nombre,
                        apellido: apellido,
                        genero: genero,
                        telefono: telefono
                    },
                    success: function(data) {
                        Swal.fire({
                            'title': '¡Mensaje!',
                            'text': data,
                            'icon': 'success',
                            'showConfirmButton': 'false',


                        }).then(function() {
                            window.location = "cliente-listar.php";
                        });

                    },

                    error: function(data) {
                        Swal.fire({
                            'title': 'Error',
                            'text': data,
                            'icon': 'error'
                        })
                    }
                });


            } else {

            }





        });


    });

    $('.btnBorrar').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href')

        Swal.fire({
            title: 'Estas seguro de eliminar este usuario?',
            text: "¡El elemento elminado no podrá recuperarse!!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!',
            cancelButtonText: 'Cancelar!',
        }).then((result) => {
            if (result.value) {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Eliminado!',
                        'El usuario fue eliminado.',
                        'success'
                    )
                }

                document.location.href = href;
            }

        })
    })

    /* let btnBorrar = document.getElementById("btnBorrar");

    btnBorrar.addEventListener("click", borrar);

    function borrar() {
        swal.fire({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                timer: "1500",
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

    } */

    /*  let btnGuardar = document.getElementById("btnGuardar");
     btnGuardar.addEventListener("click", guardar);

    } */
</script>

<script src="assets/plugins/SweetAlert/dist/sweetalert2.all.js"></script>
<script src="assets/plugins/SweetAlert/dist/sweetalert2.min.js"></script>
<script src="assets/js/jquery-3.6.0.min.js"></script>


<!-- <script src="aassets/js/sweetAlert2.js"></script> -->
<!-- /.container-fluid -->