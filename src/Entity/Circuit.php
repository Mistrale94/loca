<?php

namespace App\Entity;

use App\Repository\CircuitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use DateTimeImmutable;

#[ORM\Entity(repositoryClass: CircuitRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Circuit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    private $image;

    #[ORM\Column(type: 'string', length: 50)]
    private $title;

    #[ORM\Column(type: 'string', length: 100)]
    private $locality;

    #[ORM\ManyToMany(targetEntity: Filter::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $filter_id;

    #[ORM\Column(type: 'text')]
    private $content;

    #[ORM\Column(type: 'datetime_immutable')]
    private $created_at;

    #[ORM\Column(type: 'datetime_immutable')]
    private $modified_at;

    #[ORM\Column(type: 'text')]
    private $relationship;

    #[ORM\Column(type: 'text')]
    private $duration;

    #[ORM\Column(type: 'string', length: 50)]
    private $price;

    #[ORM\Column(type: 'text')]
    private $full_content;

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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getLocality(): ?string
    {
        return $this->locality;
    }

    public function setLocality(string $locality): self
    {
        $this->locality = $locality;

        return $this;
    }

    public function getFilterId(): ?Filter
    {
        return $this->filter_id;
    }

    public function setFilterId(?Filter $filter_id): self
    {
        $this->filter_id = $filter_id;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

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

    #[ORM\PrePersist]
    public function setCreatedAtValue(){
        $this->created_at = new \DateTimeImmutable();
    }

    #[ORM\PrePersist]
    public function setModifiedAtValue(){
        $this->modified_at = new \DateTimeImmutable();
    }

    public function getRelationship(): ?string
    {
        return $this->relationship;
    }

    public function setRelationship(string $relationship): self
    {
        $this->relationship = $relationship;

        return $this;
    }

    public function getDuration(): ?string
    {
        return $this->duration;
    }

    public function setDuration(string $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getFullContent(): ?string
    {
        return $this->full_content;
    }

    public function setFullContent(string $full_content): self
    {
        $this->full_content = $full_content;

        return $this;
    }

    /**
     * @return Collection<int, Program>
     */
    public function getProgramId(): Collection
    {
        return $this->program_id;
    }

    public function addProgramId(Program $programId): self
    {
        if (!$this->program_id->contains($programId)) {
            $this->program_id[] = $programId;
            $programId->setCircuit($this);
        }

        return $this;
    }

    public function removeProgramId(Program $programId): self
    {
        if ($this->program_id->removeElement($programId)) {
            // set the owning side to null (unless already changed)
            if ($programId->getCircuit() === $this) {
                $programId->setCircuit(null);
            }
        }

        return $this;
    }
}
