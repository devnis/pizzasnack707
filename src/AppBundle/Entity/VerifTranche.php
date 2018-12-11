<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VerifTrancheRepository
 *
 * @ORM\Table(name="verifTranche")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TrancheRepository")
 */
class VerifTranche
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
     * @var int
     *
     * @ORM\Column(name="nbrePizza", type="integer", nullable=true)
     */
    private $nbrePizza;

    /**
     * @var int
     *
     * @ORM\Column(name="nbreSnack", type="integer", nullable=true)
     */
    private $nbreSnack;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date", type="date")
     */
    private $date;

    /**
     * @var bool
     *
     * @ORM\Column(name="Verouiller", type="boolean", nullable=true)
     */
    private $verouiller;

    /**
     * @var string
     * @ORM\OneToMany(targetEntity="Commande", mappedBy="verifTranche")
     */
    private $commande;

    /**
     * @var string
     * @ORM\ManyToOne(targetEntity="Tranche", inversedBy="verifTranche")
     */
    private $tranche;

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
     * Set nbrePizza
     *
     * @param integer $nbrePizza
     *
     * @return VerifTranche
     */
    public function setNbrePizza($nbrePizza)
    {
        $this->nbrePizza = $nbrePizza;

        return $this;
    }

    /**
     * Get nbrePizza
     *
     * @return int
     */
    public function getNbrePizza()
    {
        return $this->nbrePizza;
    }

    /**
     * Set nbreSnack
     *
     * @param integer $nbreSnack
     *
     * @return VerifTranche
     */
    public function setNbreSnack($nbreSnack)
    {
        $this->nbreSnack = $nbreSnack;

        return $this;
    }

    /**
     * Get nbreSnack
     *
     * @return int
     */
    public function getNbreSnack()
    {
        return $this->nbreSnack;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return VerifTranche
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
     * Set verouiller
     *
     * @param boolean $verouiller
     *
     * @return VerifTranche
     */
    public function setVerouiller($verouiller)
    {
        $this->verouiller = $verouiller;

        return $this;
    }

    /**
     * Get verouiller
     *
     * @return bool
     */
    public function getVerouiller()
    {
        return $this->verouiller;
    }

    /**
     * @return string
     */
    public function getCommande()
    {
        return $this->commande;
    }

    /**
     * @param string $commande
     */
    public function setCommande($commande)
    {
        $this->commande = $commande;
    }

    /**
     * @return string
     */
    public function getTranche()
    {
        return $this->tranche;
    }

    /**
     * @param string $tranche
     */
    public function setTranche($tranche)
    {
        $this->tranche = $tranche;
    }
}

