<?php
class Usuario {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function obtenerUsuarioPorNombre($nombreUsuario) {
        $query = "SELECT * FROM usuarios WHERE nombre = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("s", $nombreUsuario);
        $stmt->execute();
        $result = $stmt->get_result();
    
        

    
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
    
    public function obtenerError() {
        return $this->connection->error;
    }


    public function actualizarDatosUsuario($nombre, $email) {
        $query = "UPDATE usuarios SET email = ? WHERE nombre = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("ss", $email, $nombre);
        $stmt->execute();

        if ($stmt->errno) {
            return "Error en la consulta: " . $stmt->error;
        }

        return $stmt->affected_rows > 0;
    
    }

    public function existeUsuario($nombreUsuario) {
        $query = "SELECT * FROM usuarios WHERE nombre = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("s", $nombreUsuario);
        $stmt->execute();
        $result = $stmt->get_result();
    
        return $result->num_rows > 0;
    }

}      
?>
