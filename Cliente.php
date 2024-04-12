<?php
/**Se registra la siguiente información: nombre, apellido, si está o no dado de baja, el tipo y el número de
documento. Si un cliente está dado de baja, no puede registrar compras desde el momento de su baja.
 */
class Cliente{
    private $nombre;
    private $apellido;
    private $dadoDeBaja;
    private $tipoDocumento;
    private $numeroDocumento;
    public function __construct($nombre,$apellido,$dadoDeBaja,$tipoDocumento,$numeroDocumento)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dadoDeBaja = $dadoDeBaja;
        $this->tipoDocumento = $tipoDocumento;
        $this->numeroDocumento = $numeroDocumento;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($newNombre){
        $this->nombre = $newNombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function setApellido($newApellido){
        $this->apellido = $newApellido;
    }
    public function getDadoDeBaja(){
        return $this->dadoDeBaja;
    }
    public function setDadoDeBaja($newDadoDeBaja){
        $this->dadoDeBaja = $newDadoDeBaja;
    }
    public function getTipoDocumento(){
        return $this->tipoDocumento;
    }
    public function setTipoDocumento($newTipoDocumento){
        $this->tipoDocumento = $newTipoDocumento;
    }
    public function getNumeroDocumento(){
        return $this->numeroDocumento;
    }
    public function setNumeroDocumento($newNumeroDocumento){
        $this->numeroDocumento = $newNumeroDocumento;
    }
    public function __toString(){
        $cad = "\nNombre: ".$this->getNombre()."\nApellido: ".$this->getApellido()."\nEsta dado de baja: ";
        if($this->getDadoDeBaja()){
            $cad .= "Si";
        }else{
            $cad .= "No";
        }
        $cad .= "\nTipo y Numero de Documento: ".$this->getTipoDocumento()." ".$this->getNumeroDocumento();
        return $cad;
    }
}
?>