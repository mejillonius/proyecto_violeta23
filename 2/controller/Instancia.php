<?php

echo(LOADDEBUG?"Debug loader Instancia <br> ":"");

class Instancia {
    private $id;
    private $id_profe;
    private $id_practica;
    private $creacion;
    private $fecha_limite;
    private $estado;
    private $url;

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

	/**
	 * @return mixed
	 */
	public function getId_profe() {
		return $this->id_profe;
	}
	
	/**
	 * @param mixed $id_profe 
	 * @return self
	 */
	public function setId_profe($id_profe): self {
		$this->id_profe = $id_profe;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getid_practica() {
		return $this->id_practica;
	}
	
	/**
	 * @param mixed $id_practica 
	 * @return self
	 */
	public function setid_practica($id_practica): self {
		$this->id_practica = $id_practica;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCreacion() {
		return $this->creacion;
	}
	
	/**
	 * @param mixed $creacion 
	 * @return self
	 */
	public function setCreacion($creacion): self {
		$this->creacion = $creacion;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getFecha_limite() {
		return $this->fecha_limite;
	}
	
	/**
	 * @param mixed $fecha_limite 
	 * @return self
	 */
	public function setFecha_limite($fecha_limite): self {
		$this->fecha_limite = $fecha_limite;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getEstado() {
		return $this->estado;
	}
	
	/**
	 * @param mixed $estado 
	 * @return self
	 */
	public function setEstado($estado): self {
		$this->estado = $estado;
		return $this;
	}

    public function generarUrl(){
        return md5($this->id.$this->id_profe.$this->id_practica);
    }
	/**
	 * @return mixed
	 */
	public function getUrl() {
		return $this->url;
	}
	
	/**
	 * @param mixed $url 
	 * @return self
	 */
	public function setUrl($url): self {
        if ($url == null){
            $url = $this->generarUrl();
        }
		$this->url = $url;
		return $this;
	}

    public function __construct($id,$id_profe,$id_practica,$creacion,$fecha_limite,$estado,$url = null){
        $this->setId($id);
        $this->setId_profe($id_profe);
        $this->setid_practica($id_practica);
        $this->setCreacion($creacion);
        $this->setCreacion($creacion);
        $this->setUrl($url);

    }
    
}