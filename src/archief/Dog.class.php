<?php

class Dog extends Animal
{

    public function fetch()
    {
        return $this->name . ' is fetching.';
    }


    public function makeNoise()
    {
        return $this->name . ' is barking.';
    }

    //i cant call private method from parent class
    // but i can call protected method from parent class
}
