<?php
class Usuario {
    private $connection;

    // Constructor que recibe la base de datos
    public function __construct($connection) {
        $this->connection = $connection;
    }

    // Obtiene un usuario por su nombre
    public function obtenerUsuarioPorNombre($nombreUsuario) {
        // selecciona usuario por su nombre
        $query = "SELECT * FROM usuarios WHERE nombre = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("s", $nombreUsuario); 
        $stmt->execute(); // Ejecuta la consulta
        $result = $stmt->get_result(); // Obtiene el resultado 
    
        // Verifica si se encontró el usuario y da sus datos o null si no existe
        if ($result->num_rows > 0) {
            return $result->fetch_assoc(); // Retorna los datos del usuario
        } else {
            return null; // No se encontró el usuario
        }
    }
    
    public function obtenerError() {
        return $this->connection->error; 
    }

    // Actualiza el email de un usuario por su nombre
    public function actualizarDatosUsuario($nombre, $email) {
        $query = "UPDATE usuarios SET email = ? WHERE nombre = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("ss", $email, $nombre); 
        $stmt->execute(); // Ejecuta la consulta

        // Verifica si hubo un error
        if ($stmt->errno) {
            return "Error en la consulta: " . $stmt->error; 
        }

        // Retorna verdadero si se actualizo
        return $stmt->affected_rows > 0;
    }

    // Verificar si existe un usuario por su nombre
    public function existeUsuario($nombreUsuario) {
        // para verificar la existencia del usuario
        $query = "SELECT * FROM usuarios WHERE nombre = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("s", $nombreUsuario); // Enlaza el parámetro
        $stmt->execute(); // Ejecuta la consulta
        $result = $stmt->get_result(); // Obtiene el resultado de la consulta
    
        // Retorna true si existe al menos un usuario con ese nombre, false si no
        return $result->num_rows > 0;
    }
}
     
?>
