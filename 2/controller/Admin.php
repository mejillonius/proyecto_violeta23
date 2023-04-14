<?php
echo(LOADDEBUG?"Debug loader Admin <br>":"");
class Admin {
    private $id;
    private $email;
    private $password;
    private $nombre;
    private $recovery_token;


	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * @param mixed $id 
	 * @return self
	 */
	public function setId($id): self {
		$this->id = $id;
		return $this;
	}

    public function verificaEmail($email){
        $email = trim($email);
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo(CENTRODEBUG?"email valido":"");
            return true;
        }
        echo(CENTRODEBUG?"email no valido":"");
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
		$this->password = $password;
		return $this;
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

    public function __construct($id, $email,$password,$nombre,$recovery_token = null){
        $this->setId($id);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setNombre($nombre);
        $this->setRecovery_token($recovery_token);
    }
}