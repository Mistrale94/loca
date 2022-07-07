<?php

namespace App\Entity;

use App\Repository\DiscoverRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiscoverRepository::class)]
class Discover
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $image;

    #[ORM\Column(type: 'string', length: 100)]
    private $legend;

    #[ORM\ManyToMany(targetEntity: circuit::class)]
    private $circuit_id;

    #[ORM\Column(type: 'datetime_immutable')]
    private $created_at;

    #[ORM\Column(type: 'datetime_immutable')]
    private $modified_at;

    public function __construct()
    {
        $this->circuit_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getLegend(): ?string
    {
        return $this->legend;
    }

    public function setLegend(string $legend): self
    {
        $this->legend = $legend;

        return $this;
    }

    /**
     * @return Collection<int, circuit>
     */
    public function getCircuitId(): Collection
    {
        return $this->circuit_id;
    }

    public function addCircuitId(circuit $circuitId): self
    {
        if (!$this->circuit_id->contains($circuitId)) {
            $this->circuit_id[] = $circuitId;
        }

        return $this;
    }

    public function removeCircuitId(circuit $circuitId): self
    {
        $this->circuit_id->removeElement($circuitId);

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getModifiedAt(): ?\DateTimeImmutable
    {
        return $this->modified_at;
    }

    public function setModifiedAt(\DateTimeImmutable $modified_at): self
    {
        $this->modified_at = $modified_at;

        return $this;
    }
}
