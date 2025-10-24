<?php
class BaseDatos {

    // Propiedades para la conexión
    protected $host = "127.0.0.1";
    protected $usuario = "root";
    protected $password = "";
    protected $baseDatos = "matriculas";
    protected $conexion;

    /**
     * Método para conectar a la base de datos
     * @return mysqli conexión activa
     */
    public function conectar() {
        $this->conexion = new mysqli(
            $this->host,
            $this->usuario,
            $this->password,
            $this->baseDatos
        );

        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }

        return $this->conexion;
    }

    /**
     * Método para realizar una consulta SELECT
     * @param string $sql sentencia SQL
     * @return array resultados de la consulta
     */
    public function consultar($sql) {
        $this->conectar();
        $resultado = $this->conexion->query($sql);
        $datos = [];

        if ($resultado && $resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $datos[] = $fila;
            }
        }

        $this->conexion->close();
        return $datos;
    }

    /**
     * Método para ejecutar una sentencia INSERT, UPDATE o DELETE
     * @param string $sql sentencia SQL
     * @return bool true si tuvo éxito, false si falló
     */
    public function sentencia($sql) {
        $this->conectar();
        $resultado = $this->conexion->query($sql);
        $this->conexion->close();
        return $resultado ? true : false;
    }
}
?>
