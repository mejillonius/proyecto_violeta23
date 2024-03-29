<?php

echo(LOADDEBUG?"Debug loader Profesor <br> ":"");

class Profesor {
    private $email;
    private $password;
    private $nombre;
    private $apellido;
    private $recovery_token;
    private $id_centro;

    public function verificaEmail($email){
        $email = trim($email);
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo(PROFESORDEBUG?"email valido":"");
            return true;
        }
        echo(PROFESORDEBUG?"email no valido":"");
        return false;
    }
	/**
	 * @return mixed
	 */
	public function getEmail() {
		return $this->email;
	}
	
	/**
	 * @param mixed $email 
	 * @return self
	 */
	public function setEmail($email): self {
        if ($this->verificaEmail($email)){
            $this->email = $email;
        }
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPassword() {
		return $this->password;
	}
	
	/**
	 * @param mixed $password 
	 * @return self
	 */
	public function setPassword($password): self {
		if (str_starts_with($password,'$2y$10$')){
			$this->password = $password;
		}else {
		$this->password = password_hash($password, PASSWORD_DEFAULT);
		printvar($this->password);
        $this->setRecovery_token(null);
		}
		return $this;
	}

	public function checkPassword($password) {
		return password_verify($password, $this->password);
	}

	/**
	 * @return mixed
	 */
	public function getNombre() {
		return $this->nombre;
	}
	
	/**
	 * @param mixed $nombre 
	 * @return self
	 */
	public function setNombre($nombre): self {
		$this->nombre = $nombre;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getApellido() {
		return $this->apellido;
	}
	
	/**
	 * @param mixed $apellido 
	 * @return self
	 */
	public function setApellido($apellido): self {
		$this->apellido = $apellido;
		return $this;
	}

    public function generarRecovery_token(){
        return md5($this->email.$this->password);
    }
	/**
	 * @return mixed
	 */
	public function getRecovery_token() {
		return $this->recovery_token;
	}
	
	/**
	 * @param mixed $recovery_token 
	 * @return self
	 */
	public function setRecovery_token($recovery_token): self {
        if ($recovery_token == null){
            $recovery_token = $this->generarRecovery_token();
        }
		$this->recovery_token = $recovery_token;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getId_centro() {
		return $this->id_centro;
	}
	
	/**
	 * @param mixed $id_centro 
	 * @return self
	 */
	public function setId_centro($id_centro): self {
		$this->id_centro = $id_centro;
		return $this;
	}

    public function __construct($email,$password,$nombre,$apellido, $id_centro, $recovery_token = null){

        $this->setEmail($email);
        $this->setPassword($password);
        $this->setNombre($nombre);
        $this->setApellido($apellido);
        $this->setRecovery_token($recovery_token);
        $this->setId_centro($id_centro);
    }
}