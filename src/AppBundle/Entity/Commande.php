<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * commande
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\commandeRepository")
 */
class Commande
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @ORM\ManyToMany(targetEntity="Pizza")
     */
    private $pizza;

    /**
     * @ORM\ManyToMany(targetEntity="Snack")
     */
    private $snack;

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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return commande
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getTranche()
    {
        return $this->tranche;
    }

    /**
     * @param mixed $tranche
     */
    public function setTranche($tranche)
    {
        $this->tranche = $tranche;
    }

    /**
     * @return mixed
     */
    public function getPizza()
    {
        return $this->pizza;
    }

    /**
     * @param mixed $pizza
     */
    public function setPizza($pizza)
    {
        $this->pizza = $pizza;
    }

    /**
     * @return mixed
     */
    public function getSnack()
    {
        return $this->snack;
    }

    /**
     * @param mixed $snack
     */
    public function setSnack($snack)
    {
        $this->snack = $snack;
    }

}

