<?php

namespace App\Entity;

use App\Repository\RoomRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RoomRepository::class)
 */
class Room
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
    private $name;

    /**
     * @ORM\OneToOne(targetEntity=Menu::class, inversedBy="room", cascade={"persist", "remove"})
     */
    private $menu_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /** @var \Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="joined_At" )
     */
    private $user;

    /**
     * @ORM\OneToOne(targetEntity=Reservation::class, mappedBy="idroom", cascade={"persist", "remove"})
     */
    private $reservation;

    public function __construct()
    {
        $this->user = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getMenuId(): ?menu
    {
        return $this->menu_id;
    }

    public function setMenuId(?menu $menu_id): self
    {
        $this->menu_id = $menu_id;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|user[]
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(user $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user[] = $user;
            $user->setJoinedAt($this);
        }

        return $this;
    }

    public function removeUser(user $user): self
    {
        if ($this->user->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getJoinedAt() === $this) {
                $user->setJoinedAt(null);
            }
        }

        return $this;
    }

    public function getReservation(): ?Reservation
    {
        return $this->reservation;
    }

    public function setReservation(Reservation $reservation): self
    {
        // set the owning side of the relation if necessary
        if ($reservation->getIdroom() !== $this) {
            $reservation->setIdroom($this);
        }

        $this->reservation = $reservation;

        return $this;
    }
}
