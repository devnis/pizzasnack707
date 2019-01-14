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
     * @ORM\Column(name="produits", type="integer", nullable=true)
     * @ORM\ManyToMany(targetEntity="Produits")
     */
    private $produits;

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

    /**
     * @return mixed
     */
    public function getProduits()
    {
        return $this->produits;
    }

    /**
     * @param mixed $produits
     */
    public function setProduits($produits)
    {
        $this->produits = $produits;
    }

}

