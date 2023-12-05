<?php

class Pokemon {
    private int $id;
    private int $number;
    private string $name;
    private string $description;
    private int $type1;
    private int $type2;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data): void
    {
        foreach ($data as $key => $value )
        {
            $method = "set" . ucfirst($key);
            if(method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }


    /**
     * @return
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @param $id:int
     */
    public function setId(int $id): Pokemon
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return
     */
    public function getNumber() : int
    {
        return $this->number;
    }

    /**
     * @param $number
     */
    public function setNumber($number): void
    {
        if(is_int($number)<800){
            $this->number = $number;
        }

    }

    /**
     * @return
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param $description
     */
    public function setDescription($description): static
    {
        if(is_string($description) && strlen($description) > 5 && strlen($description) < 1000) {
            $this->description = $description;
        }
        return $this;
    }

    /**
     * @return
     */
    public function getType1(): int
    {
        return $this->type1;
    }

    /**
     * @param $type1
     */
    public function setType1($type1): void
    {
        $this->type1 = $type1;
    }

    /**
     * @return
     */
    public function getType2(): int
    {
        return $this->type2;
    }

    /**
     * @param $type2
     */
    public function setType2($type2): void
    {
        $this->type2 = $type2;
    }


}