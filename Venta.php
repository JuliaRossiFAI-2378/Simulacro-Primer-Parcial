<?php
/**Se registra la siguiente información: número, fecha, referencia al cliente, referencia a una colección de
motos y el precio final.*/
class Venta{
    private $numero;
    private $fecha;
    private $cliente;
    private $colMotos;
    private $precioFinal;
    
    public function __construct($numero,$fecha,$cliente,$colMotos,$precioFinal)
    {
        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->cliente = $cliente;
        $this->colMotos = $colMotos;
        $this->precioFinal = $precioFinal;
    }
    public function getNumero(){
        return $this->numero;
    }
    public function setNumero($newNumero){
        $this->numero = $newNumero;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function setFecha($newFecha){
        $this->fecha = $newFecha;
    }
    public function getCliente(){
        return $this->cliente;
    }
    public function setCliente($newCliente){
        $this->cliente = $newCliente;
    }
    public function getColMotos(){
        return $this->colMotos;
    }
    public function setColMotos($newColMotos){
        $this->colMotos = $newColMotos;
    }
    public function getPrecioFinal(){
        return $this->precioFinal;
    }
    public function setPrecioFinal($newPrecioFinal){
        $this->precioFinal = $newPrecioFinal;
    }
    public function __toString()
    {
        $cad = "\nNumero: ".$this->getNumero()."\nFecha: ".$this->getFecha()."\n\tDatos cliente".
        $this->getCliente()."\n\tMotos vendidas";
        $colMotos = $this->getColMotos();
        for($i=0; $i<count($colMotos); $i++){
            $cad .= "\n".$colMotos[$i];
        }
        $cad .= "\nPrecio final: ".$this->getPrecioFinal();
        return $cad;
    }

    /**Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y lo
    incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada
    vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.
    Utilizar el método que calcula el precio de venta de la moto donde crea necesario. */
    public function incorporarMoto($objMoto){
        $cliente = $this->getCliente();
        $colMotosVenta = $this->getColMotos();
        if(!$cliente->getDadoDeBaja()){
            $precioTotalVenta = $this->getPrecioFinal();
            $precioMoto = $objMoto->darPrecioVenta();
            if($precioMoto > 0){
                $colMotosVenta[] = $objMoto;
                $this->setColMotos($colMotosVenta);
                $precioTotalVenta += $precioMoto;
                $this->setPrecioFinal($precioTotalVenta);
            }
        }
    }
}
?>