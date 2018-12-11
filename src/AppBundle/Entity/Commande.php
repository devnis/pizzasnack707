<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * commande
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommandeRepository")
 * @ORM\HasLifecycleCallbacks()
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
     * @ORM\Column(name="pizza", type="integer", nullable=true)
     * @ORM\ManyToMany(targetEntity="Pizza")
     */
    private $pizza;

    /**
     * @ORM\Column(name="snack", type="integer", nullable=true)
     * @ORM\ManyToMany(targetEntity="Snack")
     */
    private $snack;

    /**
     * @ORM\ManyToOne(targetEntity="VerifTranche", inversedBy="commande")
     */
    private $verifTranche;

//    /**
//     * @ORM\Column(name="tranche", type="integer")
//     * @ORM\ManyToOne(targetEntity="Tranche", inversedBy="commande")
//     */
//    private $tranche;

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
     * @ORM\PrePersist
     */
    public function setDateValue()
    {
        $this->date = new \DateTime();
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

    /**
     * @return mixed
     */
    public function getVerifTranche()
    {
        return $this->verifTranche;
    }

    /**
     * @param mixed $verifTranche
     */
    public function setVerifTranche($verifTranche)
    {
        $this->verifTranche = $verifTranche;
    }

//    /**
//     * @return mixed
//     */
//    public function getTranche()
//    {
//        return $this->tranche;
//    }
//
//    /**
//     * @param mixed $tranche
//     */
//    public function setTranche($tranche)
//    {
//        $this->tranche = $tranche;
//    }
}

