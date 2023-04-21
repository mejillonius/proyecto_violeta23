<?php
echo(LOADDEBUG?"Debug loader Admin <br>":"");
/**
 * Admin.
 * 
 * controlador del admin
 *
 * @author	Alberto Galarzo
 * @since	v0.0.1
 * @version	v1.0.0	Friday, April 21st, 2023.
 * @global
 */
class Admin {
    /**
     * @var		mixed	$id id numerico
     */
    private $id;
    /**
     * @var		mixed	$email email de autenticacion, unico en la base de datos
     */
    private $email;
    /**
     * @var		mixed	$password contraseña
     */
    private $password;
    /**
     * @var		mixed	$nombre nombre del admin
     */
    private $nombre;
    /**
     * @var		mixed	$recovery_token token url para la recuperacion de la contraseña
     */
    private $recovery_token;


	/**
	 * getId.
	 * 
	 * devuelve el id del admin
	 *
	 * @author	Alberto Galarzo
	 * @since	v0.0.1
	 * @version	v1.0.0	Friday, April 21st, 2023.
	 * @access	public
	 * @return	mixed
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * setId.
	 * 
	 * graba el id
	 *
	 * @author	Alberto Galarzo
	 * @since	v0.0.1
	 * @version	v1.0.0	Friday, April 21st, 2023.
	 * @access	public
	 * @param	mixed	$id	id a proporcionar
	 * @return	mixed
	 */
	public function setId($id): self {
		$this->id = $id;
		return $this;
	}

    /**
     * verificaEmail.
	 * 
	 * comprueba que email proporcionado cumple con el formato de email
     *
     * @author	Alberto Galarzo
     * @since	v0.0.1
     * @version	v1.0.0	Friday, April 21st, 2023.
     * @access	public
     * @param	mixed	$email	email proporcionado
     * @return	boolean
     */
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
	 * getEmail.
	 * 
	 * devuelve el email del objeto
	 *
	 * @author	Alberto Galarzo
	 * @since	v0.0.1
	 * @version	v1.0.0	Friday, April 21st, 2023.
	 * @access	public
	 * @return	mixed
	 */
	public function getEmail() {
		return $this->email;
	}
	
	/**
	 * setEmail.
	 * 
	 * graba el amil proporcionado
	 *
	 * @author	Alberto Galarzo
	 * @since	v0.0.1
	 * @version	v1.0.0	Friday, April 21st, 2023.
	 * @access	public
	 * @param	mixed	$email	email a grabar
	 * @return	mixed
	 */
	public function setEmail($email): self {
        if ($this->verificaEmail($email)){
            $this->email = $email;
        }
		return $this;
	}

	/**
	 * getPassword.
	 * 
	 * devuelve la contraseña del objeto
	 *
	 * @author	Alberto Galarzo
	 * @since	v0.0.1
	 * @version	v1.0.0	Friday, April 21st, 2023.
	 * @access	public
	 * @return	mixed
	 */
	public function getPassword() {
		return $this->password;
	}
	
	/**
	 * setPassword.
	 * 
	 * hashea y graba la contraseña en el objeto
	 * 
	 * si la contraseña empieza con los caracteres '$2y$10', indicador de que es una contraseña hasheada, NO hasheara la contraseña al grabar la contraseña
	 *
	 * @author	Alberto Galarzo
	 * @since	v0.0.1
	 * @version	v1.0.0	Friday, April 21st, 2023.
	 * @access	public
	 * @param	mixed	$password	contraseña a hashear y grabar
	 * @return	mixed
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

	/**
	 * checkPassword.
	 * 
	 * comprueba si la contraseña prporcionada es correcta
	 *
	 * @author	Alberto Galarzo
	 * @since	v0.0.1
	 * @version	v1.0.0	Friday, April 21st, 2023.
	 * @access	public
	 * @param	mixed	$password	
	 * @return	mixed
	 */
	public function checkPassword($password) {
		return password_verify($password, $this->password);
	}

	/**
	 * getNombre.
	 *
	 * devuelve el nombre del objeto
	 * 
	 * @author	Alberto Galarzo
	 * @since	v0.0.1
	 * @version	v1.0.0	Friday, April 21st, 2023.
	 * @access	public
	 * @return	mixed
	 */
	public function getNombre() {
		return $this->nombre;
	}
	
	/**
	 * setNombre.
	 * 
	 * graba el nombre proporcionado en el objeto
	 *
	 * @author	Alberto Galarzo
	 * @since	v0.0.1
	 * @version	v1.0.0	Friday, April 21st, 2023.
	 * @access	public
	 * @param	mixed	$nombre	nombre a grabar
	 * @return	mixed
	 */
	public function setNombre($nombre): self {
		$this->nombre = $nombre;
		return $this;
	}

    /**
     * generarRecovery_token.
	 * 
	 * genera un hash md5 para el token de recuperacion de contraseña y la devuelve
     *
     * @author	Alberto Galarzo
     * @since	v0.0.1
     * @version	v1.0.0	Friday, April 21st, 2023.
     * @access	public
     * @return	mixed
     */
    public function generarRecovery_token(){
        return md5($this->email.$this->password);
    }
	/**
	 * getRecovery_token.
	 * 
	 * devuelve el recovery token del 
	 *
	 * @author	Alberto Galarzo
	 * @since	v0.0.1
	 * @version	v1.0.0	Friday, April 21st, 2023.
	 * @access	public
	 * @return	mixed
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