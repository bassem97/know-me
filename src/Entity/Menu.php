<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=MenuRepository::class)
 */
class Menu
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("menu")
     * @Groups("categorie")
     * @Groups("ingredient")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("menu")
     * @Groups("categorie")
     * @Groups("ingredient")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("menu")
     * @Groups("categorie")
     * @Groups("ingredient")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("menu")
     * @Groups("categorie")
     * @Groups("ingredient")
     */
    private $img;

    /**
     * @ORM\Column(type="boolean")
     * @Groups("menu")
     * @Groups("categorie")
     * @Groups("ingredient")
     */
    private $isExpired = false;

     /**
      * @ORM\Column(type="datetime")
      * @Groups("menu")
      * @Groups("categorie")
      * @Groups("ingredient")
      */
    private $date ;

    /**
      * @ORM\Column(type="datetime")
     * @Groups("menu")
     * @Groups("categorie")
     * @Groups("ingredient")
     */
    private $expirationDate ;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="menus")
     * @ORM\JoinColumn(nullable=false)
//     * @Groups("menu")
     */
    private $categorie;

    /**
     * @Groups("menu")
     */
    private $categorie_id ;

    /**
     * @ORM\OneToMany(targetEntity=Ingredient::class, mappedBy="menu", cascade={"all"})
     * @Groups("menu")
     */
    private $ingredients;


    public function __construct()
    {
        $this->ingredients = new ArrayCollection();
        date_default_timezone_set("Europe/Madrid");
        $this->date = new \DateTime();
        $this->expirationDate = new \DateTime("+1 day");
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getExpirationDate(): \DateTime
    {
        return $this->expirationDate;
    }

    /**
     * @param \DateTime $expirationDate
     */
    public function setExpirationDate(\DateTime $expirationDate): void
    {
        $this->expirationDate = $expirationDate;
    }



    public function getIsExpired(): ?bool
    {
        return $this->isExpired;
    }

    public function setIsExpired(bool $isExpired): self
    {
        $this->isExpired = $isExpired;

        return $this;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImg()
    {
        return $this->img;
    }

    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;
        $this->categorie_id = $categorie->getId();

        return $this;
    }


    /**
     * @return Collection|Ingredient[]
     */
    public function getIngredients(): Collection
    {
        return $this->ingredients;
    }

    /**
     * @param ArrayCollection $ingredients
     */
    public function setIngredients(ArrayCollection $ingredients): void
    {
        $this->ingredients = $ingredients;
    }

    /**
     * @return mixed
     */
    public function getCategorieId()
    {
        return $this->categorie->getId();
    }

    /**
     * @param mixed $categorie_id
     */
    public function setCategorieId($categorie_id): void
    {
        $this->categorie_id = $categorie_id;
    }




}
