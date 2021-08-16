<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enseignant
 *
 * @ORM\Table(name="enseignant")
 * @ORM\Entity
 */
class Enseignant
{
    /**
     * @var int
     *
     * @ORM\Column(name="idens", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="enseignant_idens_seq", allocationSize=1, initialValue=1)
     */
    private $idens;

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

    public function getIdens(): ?int
    {
        return $this->idens;
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


}
