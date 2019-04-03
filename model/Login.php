<?php

class Login extends EntidadBase {

    private $idLogin;
    private $idEmpleado;
    private $email;
    private $usuairo;
    private $password;
    private $fechaRegistro;
    private $estado;

    public function Login() {
        $table = "login";
        parent ::EntidadBase($table);
    }

    public function validaUsuario() {
        $query = "SELECT * FROM login WHERE usuario = '$this->usuairo' and password = '$this->password'";
        $result = $this->db()->query($query);
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function permisos_usuario(){
        $query = "SELECT * FROM login WHERE usuario = '$this->usuairo' and password = '$this->password'";
        $result = $this->db()->query($query);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_array()){
                $resultSet[] = $row;
            }
            return $resultSet;
        } else {
            return false;
        }
    }

    function getIdLogin() {
        return $this->idLogin;
    }

    function getIdEmpleado() {
        return $this->idEmpleado;
    }

    function getEmail() {
        return $this->email;
    }

    function getUsuairo() {
        return $this->usuairo;
    }

    function getPassword() {
        return $this->password;
    }

    function getFechaRegistro() {
        return $this->fechaRegistro;
    }

    function getEstado() {
        return $this->estado;
    }

    function setIdLogin($idLogin) {
        $this->idLogin = $idLogin;
    }

    function setIdEmpleado($idEmpleado) {
        $this->idEmpleado = $idEmpleado;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setUsuairo($usuairo) {
        $this->usuairo = $usuairo;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setFechaRegistro($fechaRegistro) {
        $this->fechaRegistro = $fechaRegistro;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    /* QUERY INSERT
      INSERT INTO `login` (`idLogin`, `idEmpleado`, `email`, `usuario`, `password`, `fechaRegistro`, `estatus`) VALUES (NULL, 'UN00000001', 'tpm.cuernavaca@grupak.com.mx', 'jjflores', 'tpm2018!', '2018-11-05', '1');
     */
}

?>