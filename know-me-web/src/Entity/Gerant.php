<?php

namespace App\Entity;

use App\Repository\GerantRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GerantRepository::class)
 */
class Gerant
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $f_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $l_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pwd;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name_prop;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getFName(): ?string
    {
        return $this->f_name;
    }

    public function setFName(string $f_name): self
    {
        $this->f_name = $f_name;

        return $this;
    }

    public function getLName(): ?string
    {
        return $this->l_name;
    }

    public function setLName(string $l_name): self
    {
        $this->l_name = $l_name;

        return $this;
    }

    public function getPwd(): ?string
    {
        return $this->pwd;
    }

    public function setPwd(string $pwd): self
    {
        $this->pwd = $pwd;

        return $this;
    }

    public function getNameProp(): ?string
    {
        return $this->name_prop;
    }

    public function setNameProp(string $name_prop): self
    {
        $this->name_prop = $name_prop;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }
}
