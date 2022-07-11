<?php

namespace App\Entity;

use App\Repository\FilterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use DateTimeImmutable;


#[ORM\Entity(repositoryClass: FilterRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Filter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $name;

    #[ORM\ManyToMany(targetEntity: Circuit::class, mappedBy: 'filter')]
    private $circuits;

    #[ORM\Column(type: 'datetime_immutable')]
    private $created_at;

    #[ORM\Column(type: 'datetime_immutable')]
    private $modified_at;
   

    public function __construct()
    {
        $this->circuits = new ArrayCollection();
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
    
    /**
     * @return Collection<int, Circuit>
     */
    public function getCircuits(): Collection
    {
        return $this->circuits;
    }

    public function addCircuit(Circuit $circuit): self
    {
        if (!$this->circuits->contains($circuit)) {
            $this->circuits[] = $circuit;
            $circuit->addFilter($this);
        }

        return $this;
    }

    public function removeCircuit(Circuit $circuit): self
    {
        if ($this->circuits->removeElement($circuit)) {
            $circuit->removeFilter($this);
        }

        return $this;
    }


    #[ORM\PrePersist]
    public function setCreatedAtValue(){
        $this->createdAt = new \DateTimeImmutable();
    }

    #[ORM\PrePersist]
    public function setModifiedAtValue(){
        $this->modifiedAt = new \DateTimeImmutable();
    }

    public function __toString()
    {
        return $this->name;
    }
}
