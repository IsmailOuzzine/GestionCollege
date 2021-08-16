<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cours
 *
 * @ORM\Table(name="cours", indexes={@ORM\Index(name="IDX_FDCA8C9C9A2AED11", columns={"idens"})})
 * @ORM\Entity
 */
class Cours
{
    /**
     * @var int
     *
     * @ORM\Column(name="idcours", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="cours_idcours_seq", allocationSize=1, initialValue=1)
     */
    private $idcours;

    /**
     * @var string
     *
     * @ORM\Column(name="nomjour", type="string", nullable=false)
     */
    private $nomjour;

    /**
     * @var string
     *
     * @ORM\Column(name="heure", type="string", nullable=false)
     */
    private $heure;

    /**
     * @var string
     *
     * @ORM\Column(name="matiere", type="string", nullable=false)
     */
    private $matiere;

    /**
     * @var int|null
     *
     * @ORM\Column(name="idsalle", type="integer", nullable=true)
     */
    private $idsalle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nomclasse", type="string", nullable=true)
     */
    private $nomclasse;

    /**
     * @var \Enseignant
     *
     * @ORM\ManyToOne(targetEntity="Enseignant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idens", referencedColumnName="idens")
     * })
     */
    private $idens;

    public function getIdcours(): ?int
    {
        return $this->idcours;
    }

    public function getNomjour(): ?string
    {
        return $this->nomjour;
    }

    public function setNomjour(string $nomjour): self
    {
        $this->nomjour = $nomjour;

        return $this;
    }

    public function getHeure(): ?string
    {
        return $this->heure;
    }

    public function setHeure(string $heure): self
    {
        $this->heure = $heure;

        return $this;
    }

    public function getMatiere(): ?string
    {
        return $this->matiere;
    }

    public function setMatiere(string $matiere): self
    {
        $this->matiere = $matiere;

        return $this;
    }

    public function getIdsalle(): ?int
    {
        return $this->idsalle;
    }

    public function setIdsalle(?int $idsalle): self
    {
        $this->idsalle = $idsalle;

        return $this;
    }

    public function getNomclasse(): ?string
    {
        return $this->nomclasse;
    }

    public function setNomclasse(?string $nomclasse): self
    {
        $this->nomclasse = $nomclasse;

        return $this;
    }

    public function getIdens(): ?Enseignant
    {
        return $this->idens;
    }

    public function setIdens(?Enseignant $idens): self
    {
        $this->idens = $idens;

        return $this;
    }


}
