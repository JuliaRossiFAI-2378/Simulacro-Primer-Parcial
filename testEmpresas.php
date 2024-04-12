<?php
/**Una importante empresa de la región que vende motos, desea implementar una aplicación que le permita
gestionar la información de sus clientes, de las motos y de las ventas realizadas. Para ello se almacena
información de todos sus clientes, de cada unas de las motos disponibles en el local y de todas las ventas
realizadas */
include_once 'Cliente.php';
include_once 'Empresa.php';
include_once 'Moto.php';
include_once 'Venta.php';

$objCliente1 = new Cliente("Juancito","Perez",true,"dni",41523698);
$objCliente2 = new Cliente("Juanita","Lopez",false,"dni",52365204);
$obMoto1 = new Moto(11,2230000,2022,"Benelli Imperiale 400",85,true);
$obMoto2 = new Moto(12,584000,2021,"Zanella Zr 150 Ohc",70,true);
$obMoto3 = new Moto(13,999900,2023,"Zanella Patagonian Eagle 250",55,false);
$objEmpresa = new Empresa("Alta Gama","Av Argenetina 123",[$objCliente1,$objCliente2],[$obMoto1,$obMoto2,$obMoto3],[]);

$objEmpresa->registrarVenta([11,12,13],$objCliente2);
$objEmpresa->registrarVenta([0],$objCliente2);
$objEmpresa->registrarVenta([2],$objCliente2);

$objEmpresa->retornarVentasXCliente("dni",41523698);
$objEmpresa->retornarVentasXCliente("dni",52365204);

echo $objEmpresa;
?>