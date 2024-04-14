<?php
/* 
   Crear un programa donde sea posible añadir diferentes armas a ciertos personajes de videojuegos. Debes utilizar al menos dos personajes para este ejercicio.
 
Para llevar a cabo esta tarea, aplica el patrón de diseño Decorator.

*/


//interfaz que deben implementar todas mis clases(personajes)
interface Character {
    public function addWeapon($weapon);
}

//Personaje 1
class Batman implements Character {
    protected $weapons = []; 

    public function addWeapon($weapon) {
        $this->weapons[] = $weapon;
    }

    //obtener las armas que usa batman
    public function getWeaponsList() {       //implode unir con comas(,)
        return "Las armas que usa Batman son: " . implode(", ", $this->weapons) . "<br>";
    }
}
//Personaje 2
class Joker implements Character {
    protected $weapons = []; 

    public function addWeapon($weapon) {
        $this->weapons[] = $weapon;
    }

    public function getWeaponsList() {
        return "Las armas que usa el Joker son: " . implode(", ", $this->weapons);
    }
}

// Instancia de Batman
$batman = new Batman();
//Sus armas
$batman->addWeapon("Batarang");
$batman->addWeapon("Pistola");
$batman->addWeapon("Cinturón de utilidades");
//seguir añadiendo armas
echo $batman->getWeaponsList(); 

// Instancia del Joker
$joker = new Joker();
$joker->addWeapon("Bisturí");
$joker->addWeapon("Revólver");
$joker->addWeapon("Mazo");
echo $joker->getWeaponsList(); 
?>

