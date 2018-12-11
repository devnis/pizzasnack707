<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * tranche
 *
 * @ORM\Table(name="tranche")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TrancheRepository")
 */
class Tranche
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
     * @ORM\Column(name="heure_de_tranche", type="string", length=20)
     */
    private $heureDeTranche;

    /**
     * @var string
     * @ORM\OneToMany(targetEntity="VerifTranche", mappedBy="tranche")
     */
    private $verifTranche;

//    /**
//     * @var string
//     * @ORM\OneToMany(targetEntity="Commande", mappedBy="tranche")
//     */
//    private $commande;

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
     * Set heureDeTranche
     *
     * @param string $heureDeTranche
     *
     * @return Tranche
     */
    public function setHeureDeTranche($heureDeTranche)
    {
        $this->heureDeTranche = $heureDeTranche;

        return $this;
    }

    /**
     * Get heureDeTranche
     *
     * @return string
     */
    public function getHeureDeTranche()
    {
        return $this->heureDeTranche;
    }

    /**
     * @return string
     */
    public function getVerifTranche()
    {
        return $this->verifTranche;
    }

    /**
     * @param string $verifTranche
     */
    public function setVerifTranche($verifTranche)
    {
        $this->verifTranche = $verifTranche;
    }

//    /**
//     * @return string
//     */
//    public function getCommande()
//    {
//        return $this->commande;
//    }
//
//    /**
//     * @param string $commande
//     */
//    public function setCommande($commande)
//    {
//        $this->commande = $commande;
//    }
}

