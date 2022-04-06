<?php

include __DIR__.'/Conexao.php';

class Conteudo extends Conexao {
    private $id; 
	private $titulo;
    private $anolancamento;
    private $autor;
    private $estado;
    private $Valor;
    private $imagem;

    public function getId() {
        return $this->id;
    }    

    public function setId($id) {
        $this->id = $id;
    }
    
    function getTitulo() {
        return $this->titulo;
    }

    function getAnolancamento() {
        return $this->anolancamento;
    }

    function getAutor() {
        return $this->autor;
    }

    function getEstado() {
        return $this->estado;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setAnoLancamento($anolancamento) {
        $this->anolancamento = $anolancamento;
    }

    function setAutor($autor) {
        $this->autor = $autor;
    }

    function setestado($estado) {
        $this->estado = $estado;
    }
    public function getValor() {
        return $this->Valor;
    }    

    public function setValor($Valor) {
        $this->Valor = $Valor;
    }
    public function getimagem() {
        return $this->imagem;
    }    

    public function setimagem($imagem) {
        $this->imagem = $imagem;
    }

    public function insert($obj){
    	$sql = "INSERT INTO conteudo(titulo,anolancamento,autor,estado,Valor,imagem) VALUES (:titulo,:anolancamento,:autor,:estado,:Valor,:imagem)";
    	$consulta = Conexao::prepare($sql);
        $consulta->bindValue('titulo',  $obj->titulo);
        $consulta->bindValue('anolancamento', $obj->anolancamento);
        $consulta->bindValue('autor' , $obj->autor);        
        $consulta->bindValue('estado' , $obj->estado);
        $consulta->bindValue('Valor' , $obj->Valor);
        $consulta->bindValue('imagem' , $obj->imagem);
                
        return $consulta->execute();
        return Conexao::lastId();
	}

	public function update($obj,$id = null){
		$sql = "UPDATE conteudo SET titulo = :titulo, anolancamento = :anolancamento,autor = :autor, estado = :estado, Valor = :Valor, imagem - :imagem WHERE id = :id ";
		$consulta = Conexao::prepare($sql);
		$consulta->bindValue('titulo', $obj->titulo);
		$consulta->bindValue('anolancamento', $obj->anolancamento);
		$consulta->bindValue('autor' , $obj->autor);
		$consulta->bindValue('estado' , $obj->estado);
		$consulta->bindValue('id', $id);
		$consulta->bindValue('Valor', $Valor);
		$consulta->bindValue('imagem', $imagem);
		return $consulta->execute();
	}

	public function delete($obj,$id = null){
		$sql =  "DELETE FROM conteudo WHERE id = :id";
		$consulta = Conexao::prepare($sql);
		$consulta->bindValue('id',$id);
        $consulta->execute();
        return $consulta->execute();
	}

	public function find($id = null){
        $sql =  "SELECT * FROM conteudo WHERE id = :id";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('id',$id);
        $consulta->execute();
        return $consulta->fetch();
        
	}

	public function findAll(){
		$sql = "SELECT * FROM conteudo";
		$consulta = Conexao::prepare($sql);
        $consulta->execute();
        return $consulta->fetchAll();
		
    }
    
    public function findAllnovos(){			
        $sql =  "SELECT * FROM conteudo WHERE estado = 'Novo'";
		$consulta = Conexao::prepare($sql);
        $consulta->execute();
        return $consulta->fetchAll();
		
	}
    
    public function findAllusados(){	
        $sql =  "SELECT * FROM conteudo WHERE estado = 'Usado'";
		$consulta = Conexao::prepare($sql);
        $consulta->execute();
        return $consulta->fetchAll();
		
	}

}
?>