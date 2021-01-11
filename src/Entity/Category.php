<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
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
     * @ORM\OneToMany(targetEntity=Tatouage::class, mappedBy="category")
     */
    private $tatouages;

    public function __construct()
    {
        $this->tatouages = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getName();
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

    /**
     * @return Collection|Tatouage[]
     */
    public function getTatouages(): Collection
    {
        return $this->tatouages;
    }

    public function addTatouage(Tatouage $tatouage): self
    {
        if (!$this->tatouages->contains($tatouage)) {
            $this->tatouages[] = $tatouage;
            $tatouage->setCategory($this);
        }

        return $this;
    }

    public function removeTatouage(Tatouage $tatouage): self
    {
        if ($this->tatouages->removeElement($tatouage)) {
            // set the owning side to null (unless already changed)
            if ($tatouage->getCategory() === $this) {
                $tatouage->setCategory(null);
            }
        }

        return $this;
    }

}
