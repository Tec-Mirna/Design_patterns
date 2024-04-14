<?php
/* 
Tenemos un sistema donde mostramos mensajes en distintos tipos de salida, como por consola, formato JSON y archivo TXT. Debes crear un programa
 donde se muestren todos estos tipos de salidas.
 
Para este propósito, aplica el patrón de diseño Strategy.

*/


// interfaz de la estrategia 
interface OutputStrategy {
    //salida del mensaje
    public function output($message);
}

// Estrategia de salida por consola
class ConsoleOutput implements OutputStrategy {
    public function output($message) {
        echo "Consola: $message\n";
    }
}

// Estrategia de salida en formato json
class JsonOutput implements OutputStrategy {
    public function output($message) {
        echo json_encode(["mensaje" => $message]) . "\n\n"; //convierte en formato json
    }
}

//Estrategia de salida (archivo TXT) 
class TextFileOutput implements OutputStrategy {
    public function output($message) {
        file_put_contents('output.txt', $message . PHP_EOL, FILE_APPEND); //Guarda el mensaje en un archivo de texto que se genera al ejecutar
        echo "Archivo 'output.txt' guardado exitosamente "; 
    }
}

// Clase Contexto que utilizará las estrategias
class OutputContext {
    protected $outputStrategy;

    //Establece la estrategia de salida
    public function setOutputStrategy(OutputStrategy $outputStrategy) {
        $this->outputStrategy = $outputStrategy;
    }

    //Se ejectuta la estrategia de salida ccon el mensaje
    public function executeOutputStrategy($message) {
        $this->outputStrategy->output($message);
    }
}


$outputContext = new OutputContext();

// ESTALECEMOS LAS ESTRATEGIAS DE SALIDA 

//Consola
$outputContext->setOutputStrategy(new ConsoleOutput());
$outputContext->executeOutputStrategy("Este es un mensaje de prueba por consola");

// JSON
$outputContext->setOutputStrategy(new JsonOutput());
$outputContext->executeOutputStrategy("Este es un mensaje de prueba en formato JSON");

//archivo de texto
$outputContext->setOutputStrategy(new TextFileOutput());
$outputContext->executeOutputStrategy("Este es un mensaje de prueba que guardaré en un archivo de texto");

