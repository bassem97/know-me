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
<<<<<<< HEAD
     * Many Users have Many Users.
     * @ORM\ManyToMany(targetEntity="User", mappedBy="myMatchs")
=======
     *ORM\ManyToMany(targetEntity="User", mappedBy="myDiscussions")
>>>>>>> c32e087e0589cb19cd99953a7842a3272853276f
     */


    private $MatchsWithMe;
        /**
     * Many Users have many Users.
     * @ORM\ManyToMany(targetEntity="User", inversedBy="MatchsWithMe")
     * @ORM\JoinTable(name="matchs",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="match_user_id", referencedColumnName="id")}
     *      )
     */
    private $myMatchs;

    /**
<<<<<<< HEAD
     * @ORM\OneToOne(targetEntity=Reservation::class, mappedBy="iduser", cascade={"persist", "remove"})
     */
    private $reservation;

    /**
     * @ORM\ManyToOne(targetEntity=Room::class, inversedBy="user")
     * @ORM\JoinColumn(nullable=false)
     */
    private $joined_At;

    
=======
     * @ORM\OneToMany(targetEntity=Reclamation::class, mappedBy="sentBy")
     */
    private $reclamations;

>>>>>>> c32e087e0589cb19cd99953a7842a3272853276f
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

<<<<<<< HEAD
    public function getReservation(): ?Reservation
    {
        return $this->reservation;
    }

    public function setReservation(Reservation $reservation): self
    {
        // set the owning side of the relation if necessary
        if ($reservation->getIduser() !== $this) {
            $reservation->setIduser($this);
        }

        $this->reservation = $reservation;

        return $this;
    }

    public function getJoinedAt(): ?Room
    {
        return $this->joined_At;
    }

    public function setJoinedAt(?Room $joined_At): self
    {
        $this->joined_At = $joined_At;

        return $this;
    }

   
=======
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
>>>>>>> c32e087e0589cb19cd99953a7842a3272853276f
}
