<?php
 @session_start();
 if (!isset($_SESSION['usuario'])) {
     header('Location: ../index.php');
     exit();
 }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema Matrículas</title>
    <link rel="shortcut icon" href="../images/logo.jpg">

    <!-- PNotify -->
    <link href="../../vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="../../vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="../../vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../build/css/form-elements.css">
    <link rel="stylesheet" href="../../build/css/style.css">
    <link rel="stylesheet" href="../../build/css/login.css">

    <script src="../../js/libs/angular/angular.min.js"></script>

</head>

<body ng-app="sistemaMatriculas" ng-controller="personasController">
    <div>
        <a href="../../panel.php" class="btn btn-default">Volver al inicio</a>
    </div>
    <div class="container">
        <h2 class="text-center">Personas</h2>

        <form>

            <div class="row">
                <!-- Columna izquierda -->
                <div class="col-md-6">

                    <input type="hidden" ng-model="idPersona">

                    <!-- Tipo de documento -->
                    <div class="form-group">
                        <label for="tipoDocumento">Tipo de Documento:</label>
                        <select class="form-control" id="tipoDocumento" ng-model="tipoDocumento" required>
                            <option value="">Seleccione...</option>
                            <option value="CC">Cédula de Ciudadanía (CC)</option>
                            <option value="TI">Tarjeta de Identidad (TI)</option>
                        </select>
                    </div>

                    <!-- Documento -->
                    <div class="form-group">
                        <label for="documento">Documento de Identidad:</label>
                        <input type="text" class="form-control" id="documento" ng-model="documento"
                            placeholder="Ingrese su documento" required>
                    </div>

                    <!-- Primer nombre -->
                    <div class="form-group">
                        <label for="primerNombre">Primer Nombre:</label>
                        <input type="text" class="form-control" id="primerNombre" ng-model="primerNombre"
                            placeholder="Ingrese su primer nombre" required>
                    </div>

                    <!-- Segundo nombre -->
                    <div class="form-group">
                        <label for="segundoNombre">Segundo Nombre:</label>
                        <input type="text" class="form-control" id="segundoNombre" ng-model="segundoNombre"
                            placeholder="Ingrese su segundo nombre">
                    </div>

                    <!-- Primer apellido -->
                    <div class="form-group">
                        <label for="primerApellido">Primer Apellido:</label>
                        <input type="text" class="form-control" id="primerApellido" ng-model="primerApellido"
                            placeholder="Ingrese su primer apellido" required>
                    </div>
                </div>

                <!-- Columna derecha -->
                <div class="col-md-6">

                    <!-- Segundo apellido -->
                    <div class="form-group">
                        <label for="segundoApellido">Segundo Apellido:</label>
                        <input type="text" class="form-control" id="segundoApellido" ng-model="segundoApellido"
                            placeholder="Ingrese su segundo apellido">
                    </div>

                    <!-- Fecha nacimiento -->
                    <div class="form-group">
                        <label for="fechaNacimiento">Fecha de Nacimiento:</label>
                        <input type="text" class="form-control" ng-model="fechaNacimiento" required>
                    </div>

                    <!-- Dirección -->
                    <div class="form-group">
                        <label for="direccion">Dirección:</label>
                        <input type="text" class="form-control" id="direccion" ng-model="direccion"
                            placeholder="Ingrese su dirección" required>
                    </div>

                    <!-- Correo -->
                    <div class="form-group">
                        <label for="correo">Correo Electrónico:</label>
                        <input type="email" class="form-control" id="correo" ng-model="correo"
                            placeholder="Ingrese su correo" required>
                    </div>

                    <!-- Teléfono -->
                    <div class="form-group">
                        <label for="telefono">Teléfono:</label>
                        <input type="tel" class="form-control" id="telefono" ng-model="telefono"
                            placeholder="Ingrese su número de teléfono" required>
                    </div>
                </div>
            </div>

            <!-- Botones -->
            <div class="text-center">
                <button ng-if=" idPersona == '' " ng-click="crearPersona()" class="btn btn-primary">Crear</button>
                <button ng-if=" idPersona != '' " ng-click="modificarPersona()" class="btn btn-primary">Modificar</button>
                
            </div>

        </form>
    </div>

    <div style="margin-right: 50px; margin-left: 50px">
        <h2 class="text-center">Listado de Usuarios</h2>

        <table class="table">
            <thead >
                <tr >
                    <th class="text-center">Tipo Documento</th>
                    <th class="text-center">Documento Identidad</th>
                    <th class="text-center">Primer Nombre</th>
                    <th class="text-center">Segundo Nombre</th>
                    <th class="text-center">Primer Apellido</th>
                    <th class="text-center">Segundo Apellido</th>
                    <th class="text-center">Fecha Nacimiento</th>
                    <th class="text-center"></th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="persona in listadoPersonas">
                    
                    <td>{{persona.tipo_docum_ident}}</td>
                    <td>{{persona.docum_identidad}}</td>
                    <td>{{persona.nombre1}}</td>
                    <td>{{persona.nombre2}}</td>
                    <td>{{persona.apellido1}}</td>
                    <td>{{persona.apellido2}}</td>
                    <td>{{persona.fecha_nacim}}</td>
                    <td>
                        <button class="btn btn-primary btn-sm" ng-click="seleccionarPersona(persona)">
                            Seleccionar
                        </button>
                    </td>
                </tr>
                
            </tbody>
        </table>
    </div>

    <script src="../../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../../vendors/jquery/dist/jquery-2.0.0.min.js"></script>
    <script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../js/jquery.backstretch.min.js"></script>
    <script src="personas.js"></script>

</body>

</html>
<script src="../../vendors/pnotify/dist/pnotify.js"></script>
<script src="../../vendors/pnotify/dist/pnotify.buttons.js"></script>
<script src="../../vendors/pnotify/dist/pnotify.nonblock.js"></script>