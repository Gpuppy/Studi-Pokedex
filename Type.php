<?php

class Type{

    private int $id;

    private string $name;

    private string $color;


    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data): void
    {
      foreach($data as $key => $value){
          $method = "set" . ucfirst($key);
          if(method_exists($this, $method)) {
              $this->$method($value);
          }

}
    }

    /**
     * Get value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set value of id
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of color
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set value $color
     *
     * @return self
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }
}