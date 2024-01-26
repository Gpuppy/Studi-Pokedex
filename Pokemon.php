<?php

class Pokemon {
    private int $id;
    /*private $number;*/
    private string $name;
    private string $description;
    private int $type1;
    private $type2;
    private $image;

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
     * Getter and setters
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * Set value of id
     *
     * @return self
     */
    public function setId(int $id): Pokemon
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get value of number
     */
    /*public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set value of number
     *
     * @return self
     */
/*
        public function setNumber($number)
        {
        if(is_int($number) < 800){
            $this->number = $number;
        }
        return $this;
    }*/

    /**
     * @Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set value of name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get value description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return self
     */
    public function setDescription($description)
    {
        if(is_string($description) && strlen($description) > 5 && strlen($description) < 1000) {
            $this->description = $description;
        }
        return $this;
    }

    /**
     * Get the value of type1
     */
    public function getType1()
    {
        return $this->type1;
    }

    /**
     * Set the value of type1
     *
     * @return self
     */
    public function setType1($type1)
    {
        $this->type1 = $type1;
        return $this;
    }

    /**
     * Get value of type 2
     */
    public function getType2()
    {
        return $this->type2;
    }

    /**
     * Set value of type2
     *
     * @return self
     */
    public function setType2($type2) : self
    {
        $this->type2 = $type2;

        return $this;
    }

    /**
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }


}