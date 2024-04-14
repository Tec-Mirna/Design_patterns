<?php
/* Estamos trabajando con distintas versiones de sistemas operativos Windows 7 y Windows 10. Al compartir archivos como Word, Excel, Power Point,
 surgen problemas al abrirlos en Windows 10 debido a la falta de compatibilidad con la versión Windows 7. Debes crear un programa donde Windows 10 pueda
  aceptar estos archivos independientemente de que sean de versiones anteriores.
 
Para ello, aplica el patrón de diseño Adapter.
 */
interface Windows10{
    public function openWindows10();
}

class Windows7 {
    public function openWindows7(){
        return "Abriendo archivo en Windows 7...";
    }
}

class Windows10Adapter implements Windows10{
    private $windows7;

    public function __construct(Windows7 $windows7){
        $this->windows7 = $windows7;
    }

    //adapto win10 usando metodos de win 7
    public function openWindows10(){
        $message = $this->windows7->openWindows7();
        $message .= "<br>Archivo adaptado para abrir en Windows 10.<br><br>";
        return $message;
    }
}
//Adaptar word
$windows7WordFile = new Windows7();// version 7
$windows10WordAdapter = new Windows10Adapter($windows7WordFile); // Adaptador a win 10
echo $windows10WordAdapter->openWindows10() . "\n"; //abrirlo en win10

//UTILIZAR MISMA LÓGICA PARA PODER ABRIR(adaptar) MÁS ARCHIVOS EN WINDOWS 10
/* //Adaptar Excel
$windows7ExcelFile = new Windows7();// version 7
$windows10ExcelAdapter = new Windows10Adapter($windows7ExcelFile);// Adaptador a win 10
echo $windows10ExcelAdapter->openWindows10() . "\n";//abrirlo en win10

//Adaptar Power Point
$windows7PowerPointFile = new Windows7();// version 7
$windows10PowerPointAdapter = new Windows10Adapter($windows7PowerPointFile);// Adaptador a win 10
echo $windows10PowerPointAdapter->openWindows10() . "\n";//abrirlo en win10 */