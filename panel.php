<?php
 @session_start();
 if (!isset($_SESSION['usuario'])) {
     header('Location: index.php');
     exit();
 }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Principal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f6fa;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            height: 100vh;
            padding-top: 80px;
        }

        h1 {
            color: #2f3640;
            margin-bottom: 30px;
        }

        .boton-container {
            display: grid;
            grid-template-columns: repeat(3, 200px);
            gap: 20px;
        }

        .boton {
            background-color: #0984e3;
            color: white;
            border: none;
            border-radius: 12px;
            padding: 15px;
            font-size: 18px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .boton:hover {
            background-color: #74b9ff;
            transform: scale(1.05);
        }

        .boton:active {
            background-color: #0066cc;
        }
    </style>
</head>
<body>

    <h1>Sistema de Matriculas</h1>

    <div class="boton-container">
        
        <a href="componentes/personas/personas.php" class="boton">Personas</a>

        <a href="componentes/estudiantes/estudiantes.php" class="boton">Estudiantes</a>

        <a href="componentes/acudientes/acudientes.php" class="boton">Acudientes</a>

    </div>

</body>
</html>
