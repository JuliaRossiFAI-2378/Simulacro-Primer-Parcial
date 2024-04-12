<?php
/**Se registra la siguiente información: código, costo, año fabricación, descripción, porcentaje
incremento anual, activa (atributo que va a contener un valor true, si la moto está disponible para la
venta y false en caso contrario).
 */
class Moto{
    private $codigo;
    private $costo;
    private $anioFabricacion;
    private $descripcion;
    private $porcentajeAnual;
    private $activa;
    
    public function __construct($codigo,$costo,$anioFabricacion,$descripcion,$porcentajeAnual,$activa)
    {
        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->anioFabricacion = $anioFabricacion;
        $this->descripcion = $descripcion;
        $this->porcentajeAnual = $porcentajeAnual;
        $this->activa = $activa;
    }
    public function getCodigo(){
        return $this->codigo;
    }
    public function setCodigo($newCodigo){
        $this->codigo = $newCodigo;
    }
    public function getCosto(){
        return $this->costo;
    }
    public function setCosto($newCosto){
        $this->costo = $newCosto;
    }
    public function getAnioFabricacion(){
        return $this->anioFabricacion;
    }
    public function setAnioFabricacion($newAnioFabricacion){
        $this->anioFabricacion = $newAnioFabricacion;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function setDescripcion($newDescripcion){
        $this->descripcion = $newDescripcion;
    }
    public function getPorcentajeAnual(){
        return $this->porcentajeAnual;
    }
    public function setPorcentajeAnual($newPorcentajeAnual){
        $this->porcentajeAnual = $newPorcentajeAnual;
    }
    public function getActiva(){
        return $this->activa;
    }
    public function setActiva($newActiva){
        $this->activa = $newActiva;
    }
    public function __toString()
    {
        $cad = "\nCodigo: ".$this->getCodigo()."\nCosto: ".$this->getCosto()."\nAnio de fabricacion: ".
        $this->getAnioFabricacion()."\nDescripcion: ".$this->getDescripcion()."\nPorcentaje de incremento anual: %".
        $this->getPorcentajeAnual()."\nEsta activa: ";
        if($this->getActiva()){
            $cad .= "Si";
        }else{
            $cad .= "No";
        }
        return $cad;
    }
    /**5. Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto.
    Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para
    la venta, el método realiza el siguiente cálculo:
    $_venta = $_compra + $_compra * (anio * por_inc_anual)
    donde $_compra: es el costo de la moto.
    anio: cantidad de años transcurridos desde que se fabricó la moto.
    por_inc_anual: porcentaje de incremento anual de la moto. */
    public function darPrecioVenta(){
        $precioVenta = -1;
        if($this->getActiva()){
            $costo = $this->getCosto();
            $precioVenta = $costo + $costo * ((2024 - $this->getAnioFabricacion()) * ($this->getPorcentajeAnual()/100));
        }
        return $precioVenta;
    }
}
?>