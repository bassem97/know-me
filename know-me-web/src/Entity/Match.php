<?php

namespace App\Entity;

use App\Repository\MatchRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MatchRepository::class)
 * @ORM\Table(name="`match`")
 */
class Match
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $iduser1;

    /**
     * @ORM\Column(type="integer")
     */
    private $iduser2;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function iduser1(): ?int
    {
        return $this->iduser1;
    }

    public function setiduser1(int $id_user1): self
    {
        $this->id_user1 = $id_user1;

        return $this;
    }


    public function iduser2(): ?int
    {
        return $this->iduser2;
    }

    public function setiduser2(int $id_user2): self
    {
        $this->id_user2 = $id_user2;

        return $this;
    }

    public function getdate(): ?\DateTimeInterface
    {
        return $this->iduser1;
    }

    public function setdate(\DateTimeInterface $datee): self
    {
        $this->datee = $datee;

        return $this;
    }


}
