<?php

class Pokemon {
    private int $id;
    private ?int $number;
    private string $name;
    private string $description;
    private int $type1;
    private ?int $type2 = null;

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
     * Get value of number
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * Set value of number
     *
     * @return self
     */

    /** @noinspection PhpUnused */
    public function setNumber($number)
    {   if(is_int($number) < 800){
            $this->number = $number;
        }
        return $this;
    }

    /**
     * @Get the value of name
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
    public function getType2()
    {
        return $this->type2;
    }

    /**
     * @param $type2
     */
    public function setType2($type2)
    {
        $this->type2 = $type2;

        return $this;
    }

    /**
     * Get value image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set value $image
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this->image;
    }


}