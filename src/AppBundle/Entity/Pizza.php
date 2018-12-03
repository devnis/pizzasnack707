<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * pizza
 *
 * @ORM\Table(name="Pizza")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PizzaRepository")
 */
class Pizza
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=20)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="decimal", precision=4, scale=2)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="img", type="string", length=20, nullable=true)
     */
    private $img;

    /**
     * @var string
     *
     * @ORM\Column(name="ingredients", type="string", length=80)
     */
    private $ingredients;

    /**
     * @ORM\ManyToOne(targetEntity="Base", inversedBy="pizza")
     */
    private $base;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return pizza
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return pizza
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set img
     *
     * @param string $img
     *
     * @return pizza
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get img
     *
     * @return string
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @return string
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * @param string $ingredients
     */
    public function setIngredients($ingredients)
    {
        $this->ingredients = $ingredients;
    }

    /**
     * @return mixed
     */
    public function getBase()
    {
        return $this->base;
    }

    /**
     * @param mixed $base
     */
    public function setBase($base)
    {
        $this->base = $base;
    }
}

