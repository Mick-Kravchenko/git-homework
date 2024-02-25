<?php

class Weapon
{
    protected const RANGE =0;
    protected const DAMAGE =0;
    protected const RELOAD_TIME=0;
    protected const REQUIRE_STAMINA=0;

    public function deliver_damage($distance)
    {
        if (static::RANGE>=$distance) return static::DAMAGE;
        else return 0;
    }
    public function reload() :int|float
    {
        return static::RELOAD_TIME;
    }
    public function decrease_stamina() :int|float
    {
        return static::REQUIRE_STAMINA;
    }
}

class Bow extends Weapon
{
    protected const RANGE =100;
    protected const DAMAGE =20;
    protected const RELOAD_TIME=4;
    protected const REQUIRE_STAMINA=30;
}

class CrossBow extends Weapon
{
    protected const RANGE =50;
    protected const DAMAGE =50;
    protected const RELOAD_TIME=25;
    protected const REQUIRE_STAMINA=35;
}

class MagicStuff extends Weapon
{
    protected const RANGE =50;
    protected const DAMAGE =150;
    protected const RELOAD_TIME=100;
    protected const REQUIRE_STAMINA=1;
}

class Sword extends Weapon
{
    protected const RANGE =1;
    protected const DAMAGE =30;
    protected const RELOAD_TIME=1;
    protected const REQUIRE_STAMINA=50;
}

class Pistol extends Weapon
{
    protected const RANGE =100;
    protected const DAMAGE =100;
    protected const RELOAD_TIME=1;
    protected const REQUIRE_STAMINA=1;

}

