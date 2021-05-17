<?php


namespace App\Entity;


use App\Repository\IngredientRepository;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=IngredientRepository::class)
 */
class Ingredient
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("ingredient")
     * @Groups("menu")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("ingredient")
     * @Groups("menu")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Menu::class, inversedBy="ingredients")
     * @ORM\JoinColumn(nullable=false)
     * @Groups("ingredient")
     */
    private $menu;

    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getMenu()
    {
        return $this->menu;
    }

    /**
     * @param mixed $menu
     */
    public function setMenu($menu): void
    {
        $this->menu = $menu;
    }



}
