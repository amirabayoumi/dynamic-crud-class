<?php

require 'DB.class.php';

class Animal
{
    use DB;

    public $name;
    public $is_extinct;
    public $species; // mammals, birds, fish, etc.

    private $allowed_species = ['mammals', 'birds', 'fish', 'reptiles', 'amphibians', 'invertebrates'];
  
    public function __construct(String $name, bool $is_extinct, bool $species = false)
    {
        $this->name = $name;
        $this->is_extinct = $is_extinct;
        // $this->setSpecies($species);
        $this->species = $this->isValidSpecies($species);
      
    }

    public function setSpecies(String $species)
    {
        if (in_array($species, $this->allowed_species)) {
            $this->species = $species;
        }
    }

    protected function isValidSpecies(String $species)
    {
        $species = trim(strtolower($species));
        if (in_array($species, $this->allowed_species))
            return $species;
        return Null;
    }
    public function move()
    {
        return  $this->name . ' is moving.';
    }

    public function getName()
    {
        return $this->name;
    }

    public function getIsExtinct()
    {
        return $this->is_extinct;
    }

    public function getSpecies()
    {
        return $this->species;
    }

    public function setName(String $name)
    {
        $this->name = $name;
    }



    public function setIsExtinct(bool $is_extinct)
    {
        $this->is_extinct = $is_extinct;
    }


    public function makeNoise()
    {
        if ($this->is_extinct)
            return $this->name . ' is forever silent.';
        return $this->name . ' is making noise.';
    }
}
