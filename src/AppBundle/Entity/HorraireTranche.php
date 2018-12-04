<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * tranche
 *
 * @ORM\Table(name="tranche")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\trancheRepository")
 */
class HorraireTranche
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
     * @return HorraireTranche
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
}

