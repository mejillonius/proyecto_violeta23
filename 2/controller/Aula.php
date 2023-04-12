<?php
echo(LOADDEBUG?"Aula ":"");
class Aula {
    private $id_alumno;
    private $id_instancia;
    private $visto;
    private $completado;
    private $fedback;


	/**
	 * @return mixed
	 */
	public function getId_alumno() {
		return $this->id_alumno;
	}
	
	/**
	 * @param mixed $id_alumno 
	 * @return self
	 */
	public function setId_alumno($id_alumno): self {
		$this->id_alumno = $id_alumno;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getId_instancia() {
		return $this->id_instancia;
	}
	
	/**
	 * @param mixed $id_instancia 
	 * @return self
	 */
	public function setId_instancia($id_instancia): self {
		$this->id_instancia = $id_instancia;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getVisto() {
		return $this->visto;
	}
	
	/**
	 * @param mixed $visto 
	 * @return self
	 */
	public function setVisto($visto): self {
		$this->visto = $visto;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCompletado() {
		return $this->completado;
	}
	
	/**
	 * @param mixed $completado 
	 * @return self
	 */
	public function setCompletado($completado): self {
		$this->completado = $completado;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getFedback() {
		return $this->fedback;
	}
	
	/**
	 * @param mixed $fedback 
	 * @return self
	 */
	public function setFedback($fedback): self {
		$this->fedback = $fedback;
		return $this;
	}

    public function __construct($id_alumno,$id_instancia,$visto,$completado,$fedback){
        $this->setId_alumno($id_alumno);
        $this->setId_instancia($id_instancia);
        $this->setVisto($visto);
        $this->setCompletado($completado);
        $this->setFedback($fedback);
    }
}