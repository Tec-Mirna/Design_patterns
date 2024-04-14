<?php
/* 
    Crear un programa que contenga dos personajes: "Esqueleto" y "Zombi". Cada personaje tendrá una lógica diferente en sus ataques y 
    velocidad. La creación de los personajes dependerá del nivel del juego:
 
- En el nivel fácil se creará un personaje "Esqueleto".
- En el nivel difícil se creará un personaje "Zombi".
 
Debes aplicar el patrón de diseño Factory para la creación de los personajes.

*/

interface Character{
   public function attack();
   public function speed();
}

//Personaje 1
class Skeleton implements Character {
    public function attack() {
        return "El esqueleto ataca con sus manos";
    }
    public function speed(){
        return "La velocidad del esqueleto es de...";
    }

}
//Personaje 2
class Zombie implements Character{
    public function attack() {
        return "El zombie ataca con sus dientes ";
    }
    public function speed(){
        return "La velocidad del zombie es baja";
    }
}
//CLASE CENTRAL (FABRICA)
class CharacterFactory{
    public static function create($level){
        switch($level){
            case 'fácil';
               return new Skeleton();
            break;

            case 'Difícil';
                return new Zombie();
            break;

            default:
            throw new Exception("Nivel no válido");
        }
    }
}
//Se muestra el personaje correspondiente al nivel (fácil/difícil)
$level = "Difícil";
$character = CharacterFactory::create($level);
echo $character->attack();
echo $character->speed();

