<?php
echo(LOADDEBUG?"Debug loader Aula <br>":"");
class Aula {
    private $id_alumno;
    private $id_instancia;
    private $visto;
    private $completado;
    private $feedback;


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
	public function getFeedback() {
		return $this->feedback;
	}
	
	/**
	 * @param mixed $fedback 
	 * @return self
	 */
	public function setFeedback($fedback): self {
		$this->feedback = $fedback;
		return $this;
	}

    public function __construct($id_alumno,$id_instancia,$visto,$completado,$feedback){
        $this->setId_alumno($id_alumno);
        $this->setId_instancia($id_instancia);
        $this->setVisto($visto);
        $this->setCompletado($completado);
        $this->setFeedback($feedback);
    }
}