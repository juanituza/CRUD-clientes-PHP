<?php



include_once "entidades/cliente.php";
include_once("index.php");



$cliente = new Cliente();
$aClientes = $cliente->obtenerTodos();

?>

<main id="main" class="main">
    <section class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mx-5">
                    <h1 class="h3 mb-4 text-gray-800">Listado de Clientes</h1>
                </div>
                <?php if (isset($msg)) : ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="alert <?php echo $msg["codigo"]; ?>" role="alert">
                                <?php echo $msg["texto"]; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body shadow">
                            <table class="table table-hover">
                                <thead>
                                    <tr>

                                        <th>ID</th>
                                        <th>DNI</th>
                                        <th>NOMBRE</th>
                                        <th>TELEFONO</th>
                                        <th>GÉNERO</th>
                                        <th class="text-center"><i class="fas fa-search"></i></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php foreach ($aClientes as $item) : ?>
                                        <tr>                                           
                                            <td>
                                                <span class="form-check-label" for="Radios1">
                                                    <?php echo $item->idcliente; ?>
                                                </span>                                                
                                            </td>
                                            <td value="<?php echo $item->dni; ?><?php echo $item->dni; ?>"><?php echo $item->dni; ?></td>
                                            <td><?php echo $item->nombre . " " . $item->apellido; ?></td>

                                            <td><?php echo $item->telefono; ?></td>
                                            <td><?php echo $item->tipo_genero; ?></td>
                                            <td style="width: 110px;">
                                                <a href="cliente-nuevo.php?id=<?php echo $item->idcliente; ?>" class="btn btn-outline-secondary mr-2">Editar</a>
                                            </td>
                                        </tr>


                                    <?php endforeach; ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" row">
                <div style=" visibility:hidden " class="col-3">
                    <a href="cliente-listar.php" class="btn btn-primary mr-2">Listado</a>
                    <a href="cliente-nuevo.php" class="btn btn-primary mr-2">Nuevo</a>

                    <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
                </div>
                <div class="col-6">
                    <a href="cliente-listar.php" class="btn btn-primary mr-2">Listado</a>
                    <a href="cliente-nuevo.php" class="btn btn-primary mr-2">Nuevo</a>
                </div>
            </div>
           <!--  <div class="row">
                <div class="col-12">
                    <form action="" class="search-form d-flex align-items-center" method="GET">
                        <div class="input-group mb-3 search-bar">
                            <input type="text" name="buscar" value="<?php if (isset($_GET['buscar'])) {
                                                                        echo $_GET['buscar'];
                                                                    } ?>" class="form-control shadow" placeholder="DNI">
                            <button class="btn btn-secondary" name="btnBuscar" type="submit"><i class="bi bi-search"></i>Buscar</button>
                        </div>
                    </form>
                </div>

            </div> -->
        </div>