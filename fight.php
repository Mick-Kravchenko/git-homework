<?php
require_once 'Heroes.php';

class Fight
{
private Hero $hero1;
private Hero $hero2;

public function __construct(Hero $hero1, Hero $hero2)
{
    $this->hero1=$hero1;
    $this->hero2=$hero2;
}
    public function fight($distance)
    {
        echo $this->hero1->name . ' has ' . $this->hero1->get_hp() . 'HP' . PHP_EOL;
        echo $this->hero2->name . ' has ' . $this->hero2->get_hp() . 'HP' . PHP_EOL;
        echo PHP_EOL;
        echo 'FIGHT!!'. PHP_EOL;
        echo PHP_EOL;
        echo PHP_EOL;

        $space_between_heroes = $distance;
        $reload_time1 = 0;
        $reload_time2 = 0;

        while (!($this->hero1->is_dead()) && !($this->hero2->is_dead())) //битва поки обидва живі
        {
            if ($space_between_heroes > 1) {
                $space_between_heroes--; //кожен крок відстань зменшується на 1
            }

            if ($reload_time1 == 0) {
                $damage = $this->hero1->deliver_damage($space_between_heroes);
                if ($damage > 0) {
                    $this->hero2->receive_damage($damage);
                    echo $this->hero2->name . ' received ' . $damage . ' damage' . PHP_EOL;
                }
                $reload_time1 = $this->hero1->reload_time();
            } else {
                $reload_time1--; // Оновлення часу перезарядки
                echo $this->hero1->name . ' reloads' . PHP_EOL;
            }

            if ($reload_time2 == 0) {
                $damage = $this->hero2->deliver_damage($space_between_heroes);
                if ($damage > 0) {
                    $this->hero1->receive_damage($damage);
                    echo $this->hero1->name . ' received ' . $damage . ' damage' . PHP_EOL;
                }
                $reload_time2 = $this->hero2->reload_time();
            } else {
                $reload_time2--; // Оновлення часу перезарядки
                echo $this->hero2->name . ' reloads' . PHP_EOL;
            }

            echo $this->hero1->name . ' has ' . $this->hero1->get_hp() . 'HP' . PHP_EOL;
            echo $this->hero2->name . ' has ' . $this->hero2->get_hp() . 'HP' . PHP_EOL;

            if ($this->hero1->is_dead() || $this->hero2->is_dead()) {
                break;
            }

/*            echo "Reload";

            while ($reload_time1 !== 0 && $reload_time2 !== 0) {
                $reload_time1--;
                $reload_time2--;
                echo '. ';
            }
            echo PHP_EOL;*/
        }

        if ($this->hero1->is_dead()) {
            echo $this->hero1->name . ' lost' . PHP_EOL;
        } elseif ($this->hero2->is_dead()) {
            echo $this->hero2->name . ' lost' . PHP_EOL;
        }
    }
}


$bow=new Bow;
$crossbow =new CrossBow;
$sword=new Sword;
$magicstuff=new MagicStuff;
$pistol=new Pistol;

$Legolas=new Bowman($bow, "Legolas");
$Gimli = new Warrior($sword, 'Gimli');
$Gandalf=new Magician($magicstuff, 'Gandalf');

$fight1=new Fight($Legolas,$Gimli);
$fight2=new Fight($Legolas,$Gandalf);
$fight3=new Fight($Gandalf,$Gimli);

//$fight1->fight(5);
//$fight2->fight(1);
//$fight3->fight(30);

