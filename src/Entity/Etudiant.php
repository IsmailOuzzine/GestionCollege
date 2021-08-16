<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etudiant
 *
 * @ORM\Table(name="etudiant")
 * @ORM\Entity
 */
class Etudiant
{
    /**
     * @var string
     *
     * @ORM\Column(name="cne", type="string", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="etudiant_cne_seq", allocationSize=1, initialValue=1)
     */
    private $cne;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", nullable=false)
     */
    private $sexe;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nomclasse", type="string", nullable=true)
     */
    private $nomclasse;

    public function getCne(): ?string
    {
        return $this->cne;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

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


}
