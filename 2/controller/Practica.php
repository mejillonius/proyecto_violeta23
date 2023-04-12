<?php 

echo(LOADDEBUG?"Conf ":"");

class Practica {
    private $id;
    private $titulo;
    private $downloads;
    private $rating;
    private $guion;
    private $autor;

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
	public function getTitulo() {
		return $this->titulo;
	}
	
	/**
	 * @param mixed $titulo 
	 * @return self
	 */
	public function setTitulo($titulo): self {
		$this->titulo = $titulo;
		return $this;
	}

    public function downloadsMasUno(){
        $this->downloads ++;
    }
	/**
	 * @return mixed
	 */
	public function getDownloads() {
		return $this->downloads;
	}
	
	/**
	 * @param mixed $downloads 
	 * @return self
	 */
	public function setDownloads($downloads): self {
		$this->downloads = $downloads;
		return $this;
	}

    public function updateRating($rating){
        $this->rating = ($this->rating + $rating)/2;
    }
	/**
	 * @return mixed
	 */
	public function getRating() {
		return $this->rating;
	}
	
	/**
	 * @param mixed $rating 
	 * @return self
	 */
	public function setRating($rating): self {
		$this->rating = $rating;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getGuion() {
		return $this->guion;
	}
	
	/**
	 * @param mixed $guion 
	 * @return self
	 */
	public function setGuion($guion): self {
		$this->guion = $guion;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getAutor() {
		return $this->autor;
	}
	
	/**
	 * @param mixed $autor 
	 * @return self
	 */
	public function setAutor($autor): self {
		$this->autor = $autor;
		return $this;
	}

    public function __construct($id,$titulo,$downloads,$rating,$guion,$autor){
        $this->setId($id);
        $this->setTitulo($titulo);
        $this->setDownloads($downloads);
        $this->setRating($rating);
        $this->setGuion($guion);
        $this->setAutor($autor);
    }
}