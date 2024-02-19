<?php

class QueueDataStorage
{
    private $storage =[];

    public function get():int
    {
        return array_shift($this->storage);
    }
    public function add(int $value)
    {
        $this->storage[]=$value;
    }

    public function count()
    {
        return count($this->storage);
    }
    public function clear()
    {
        $this->storage=[];
    }
}

class StackDataStorage
{
    private $storage =[];

    public function get():int
    {
        return array_pop($this->storage);
    }
    public function add(int $value)
    {
        $this->storage[]=$value;
    }

    public function count()
    {
        return count($this->storage);
    }
    public function clear()
    {
        $this->storage=[];
    }
}

$StorageQueue=new QueueDataStorage;

$StorageQueue->add(32);
$StorageQueue->add(342);
$StorageQueue->add(35);
$StorageQueue->add(54);
$StorageQueue->add(1);
$StorageQueue->add(345);
$StorageQueue->add(65);
$StorageQueue->add(0);
$StorageQueue->add(1543);
$StorageQueue->add(43);

echo $StorageQueue->count().PHP_EOL;
echo var_dump($StorageQueue) . PHP_EOL;

echo $StorageQueue->get() . PHP_EOL;
echo var_dump($StorageQueue) . PHP_EOL;

$StorageQueue->add(4342312);
echo var_dump($StorageQueue) . PHP_EOL;


$StorageStack=new StackDataStorage;

$StorageStack->add(32);
$StorageStack->add(342);
$StorageStack->add(35);
$StorageStack->add(54);
$StorageStack->add(1);
$StorageStack->add(345);
$StorageStack->add(65);
$StorageStack->add(0);
$StorageStack->add(1543);
$StorageStack->add(43);

echo $StorageStack->count().PHP_EOL;
echo var_dump($StorageStack) . PHP_EOL;

echo $StorageStack->get() . PHP_EOL;
echo var_dump($StorageStack) . PHP_EOL;

$StorageStack->add(45432);
echo var_dump($StorageStack) . PHP_EOL;

