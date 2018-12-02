<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * tranche
 *
 * @ORM\Table(name="tranche")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\trancheRepository")
 */
class tranche
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
     * @var int
     *
     * @ORM\Column(name="nbre_de_pizza", type="integer")
     */
    private $nbreDePizza;

    /**
     * @var int
     *
     * @ORM\Column(name="nbre_de_snack", type="integer")
     */
    private $nbreDeSnack;


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
     * @return tranche
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
     * Set nbreDePizza
     *
     * @param integer $nbreDePizza
     *
     * @return tranche
     */
    public function setNbreDePizza($nbreDePizza)
    {
        $this->nbreDePizza = $nbreDePizza;

        return $this;
    }

    /**
     * Get nbreDePizza
     *
     * @return int
     */
    public function getNbreDePizza()
    {
        return $this->nbreDePizza;
    }

    /**
     * Set nbreDeSnack
     *
     * @param integer $nbreDeSnack
     *
     * @return tranche
     */
    public function setNbreDeSnack($nbreDeSnack)
    {
        $this->nbreDeSnack = $nbreDeSnack;

        return $this;
    }

    /**
     * Get nbreDeSnack
     *
     * @return int
     */
    public function getNbreDeSnack()
    {
        return $this->nbreDeSnack;
    }
}

