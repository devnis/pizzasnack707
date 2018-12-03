<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * base
 *
 * @ORM\Table(name="Base")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BaseRepository")
 */
class Base
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
     * @ORM\Column(name="type", type="string", length=12)
     */
    private $type;

    /**
     * @var string
     * @ORM\OneToMany(targetEntity="Pizza", mappedBy="base")
     */
    private $pizza;


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
     * Set type
     *
     * @param string $type
     *
     * @return base
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getPizza()
    {
        return $this->pizza;
    }

    /**
     * @param string $pizza
     */
    public function setPizza($pizza)
    {
        $this->pizza = $pizza;
    }

}

