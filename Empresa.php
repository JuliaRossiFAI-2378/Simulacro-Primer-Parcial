<?php
/**Se registra la siguiente información: denominación, dirección, la colección de clientes, colección de
motos y la colección de ventas realizadas.*/
class Empresa{
    private $denominacion;
    private $direccion;
    private $colClientes;
    private $colMotos;
    private $colVentas;

    public function __construct($denominacion, $direccion, $colClientes, $colMotos, $colVentas){
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->colClientes = $colClientes;
        $this->colMotos = $colMotos;
        $this->colVentas = $colVentas;
    }

    public function getDenominacion(){
        return $this->denominacion;
    }
    public function setDenominacion($newDenominacion){
        $this->denominacion = $newDenominacion;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function setDireccion($newDireccion){
        $this->direccion = $newDireccion;
    }
    public function getColClientes(){
        return $this->colClientes;
    }
    public function setColClientes($newColClientes){
        $this->colClientes = $newColClientes;
    }
    public function getColMotos(){
        return $this->colMotos;
    }
    public function setColMotos($newColMotos){
        $this->colMotos = $newColMotos;
    }
    public function getColVentas(){
        return $this->colVentas;
    }
    public function setColVentas($newColVentas){
        $this->colVentas = $newColVentas;
    }
    public function __toString(){
        $cad = "\nDenominacion: ".$this->getDenominacion()."\nDireccion: ".$this->getDireccion().
        "\n\tDatos clientes";
        $colClientes = $this->getColClientes();
        for($i=0; $i<count($colClientes); $i++){
            $cad .= "\n".$colClientes[$i];
        }
        $cad .= "\n\tDatos motos";
        $colMotos = $this->getColMotos();
        for($i=0; $i<count($colMotos); $i++){
            $cad .= "\n".$colMotos[$i];
        }
        $cad .= "\n\tDatos ventas";
        $colVentas = $this->getColVentas();
        for($i=0; $i<count($colVentas); $i++){
            $cad .= "\n".$colVentas[$i];
        }
        return $cad;
    }

    /**Implementar el método retornarMoto($codigoMoto) que recorre la colección de motos de la Empresa y
    retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro.*/
    public function retornarMoto($codigoMoto){
        $seEncuentra = false;
        $colMotos = $this->getColMotos();
        $i = 0;
        while($i<count($colMotos) && !$seEncuentra){
            if($colMotos[$i]->getCodigo() == $codigoMoto){
                $motoEncontrada = $colMotos[$i];
                $seEncuentra = true;
            }
            $i++;
        }
        if(!$seEncuentra){
            $motoEncontrada = new Moto(null,0,0,"",0,false);
        }
        return $motoEncontrada;
    }
    /**Implementar el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por
    parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección
    se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia
    Venta que debe ser creada. Recordar que no todos los clientes ni todas las motos, están disponibles
    para registrar una venta en un momento determinado.
    El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la
    venta. */
    public function registrarVenta($colCodigosMoto, $objCliente){
        $precioVentaFinal = 0;
        if(!$objCliente->getDadoDeBaja()){
            $colMotos = [];
            $colVentas = $this->getColVentas();
            if(count($colVentas) != null){
                $cantidadVentas = count($colVentas);
            }else{
                $cantidadVentas = 0;
            }
            $venta = new Venta($cantidadVentas+1,"12/04/2024",$objCliente,$colMotos,$precioVentaFinal);
            for($i=0; $i<count($colCodigosMoto); $i++){
                if($this->retornarMoto($colCodigosMoto[$i])->getCodigo() != null){
                    $motoVenta = $this->retornarMoto($colCodigosMoto[$i]);
                    $venta->incorporarMoto($motoVenta);
                    $precioVentaFinal += $motoVenta->darPrecioVenta();
                }
            }
            if($precioVentaFinal != 0){
                $venta->setPrecioFinal($precioVentaFinal);
                $colVentas[] = $venta;
                $this->setColVentas($colVentas);
            }
        }
        return $precioVentaFinal;
    }
    /**Implementar el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y
    número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente.  */
    public function retornarVentasXCliente($tipo,$numDoc){
        $ventasDelCliente = [];
        $ventasEmpresa = $this->getColVentas();
        for($i=0; $i<count($ventasEmpresa); $i++){
            $tipoDniVenta = $ventasEmpresa[$i]->getCliente()->getTipoDocumento();
            $numeroDniVenta = $ventasEmpresa[$i]->getCliente()->getNumeroDocumento();
            if($tipoDniVenta == $tipo && $numeroDniVenta == $numDoc){
                $ventasDelCliente[] = $ventasEmpresa[$i];
            }
        }
        return $ventasDelCliente;
    }
}
?>