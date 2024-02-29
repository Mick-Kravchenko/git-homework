<?php
require_once 'Weapons.php';

interface WeaponInterface
{
    public function setWeapon(Weapon $weapon);
}

abstract class Hero
{
    protected int $hp=0;
    protected int $stamina=0;
    protected Weapon $weapon;
    public string $name;

    public function setWeapon(Weapon $weapon)
    {
        $this->weapon=$weapon;
    }
    public function __construct(string $name)
    {
        $this->name=$name;
    }

    public function receive_damage(int|float $damage)
    {
        $this->hp=$this->hp-$damage;
    }
    public function is_dead():bool
    {
        if($this->hp<=0) return true;
        else return false;
    }
    public function reload_time() :int|float
    {
        return $this->weapon->reload();
    }

    public function deliver_damage($distance) :int|float
    {
        $this->stamina=($this->stamina)-($this->weapon->decrease_stamina());
        if ($this->stamina>=0) return $this->weapon->deliver_damage($distance);
        else return 0;
    }

    public function get_hp()
    {
        return $this->hp;
    }

    abstract public function sayOnWin() :string;
    abstract public function sayOnLose() :string;
}

class Magician extends Hero
{
    protected int $hp=50;
    protected int $stamina=5;
    public function sayOnWin() :string
    {
        return 'You shall not pass!';
    }
    public function sayOnLose() :string
    {
        return 'My spell was not strong enough...';
    }
}

class Warrior extends Hero
{
    protected int $hp=175;
    protected int $stamina=500;
    public function sayOnWin() :string
    {
        return 'I have a piece of steel for you!';
    }
    public function sayOnLose() :string
    {
        return 'I recognize your strength...';
    }
}


class Bowman extends Hero
{
    protected int $hp=150;
    protected int $stamina=500;

    public function sayOnWin() :string
    {
        return 'Hahahaha!';
    }
    public function sayOnLose() :string
    {
        return 'I need more arrows!';
    }
}

/*$bow=new Bow;
$somehero =new Hero(1,1,$bow);
echo $somehero->reload_time();*/