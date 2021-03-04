<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User
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
    private $location;

    /**
     * @ORM\OneToMany(targetEntity=Photo::class, cascade={"persist", "remove"}, mappedBy="user", orphanRemoval = true)
     */
    private $photo;
      /**
     *ORM\ManyToMany(targetEntity="User", mappedBy="myDiscussions")
     */


    private $Discussion;
        /**
     * @ORM\ManyToMany(targetEntity="User", inversedBy="Discussion")
     * @ORM\JoinTable(name="Discussions",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="Discussion_user_id", referencedColumnName="id")}
     *      )
     */
    private $myDiscussions;

    /**
     *ORM\ManyToMany(targetEntity="User", mappedBy="myDiscussions")
     */


    private $MatchsWithMe;
        /**
     * @ORM\ManyToMany(targetEntity="User", inversedBy="MatchsWithMe")
     * @ORM\JoinTable(name="matchs",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="match_user_id", referencedColumnName="id")}
     *      )
     */
    private $myMatchs;

    /**
     * @ORM\OneToMany(targetEntity=Reclamation::class, mappedBy="sentBy")
     */
    private $reclamations;

    public function __construct() {
        $this->MatchsWithMe = new \Doctrine\Common\Collections\ArrayCollection();
        $this->myMatchs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->Discussion = new \Doctrine\Common\Collections\ArrayCollection();
        $this->myDiscussions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->reclamations = new ArrayCollection();
    }

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

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * @return Collection|Reclamation[]
     */
    public function getReclamations(): Collection
    {
        return $this->reclamations;
    }

    public function addReclamation(Reclamation $reclamation): self
    {
        if (!$this->reclamations->contains($reclamation)) {
            $this->reclamations[] = $reclamation;
            $reclamation->setSentBy($this);
        }

        return $this;
    }

    public function removeReclamation(Reclamation $reclamation): self
    {
        if ($this->reclamations->removeElement($reclamation)) {
            // set the owning side to null (unless already changed)
            if ($reclamation->getSentBy() === $this) {
                $reclamation->setSentBy(null);
            }
        }

        return $this;
    }
}
