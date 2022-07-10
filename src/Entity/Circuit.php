<?php

namespace App\Entity;

use App\Repository\CircuitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use DateTimeImmutable;

#[ORM\Entity(repositoryClass: CircuitRepository::class)]
#[Vich\Uploadable]
#[ORM\HasLifecycleCallbacks]
class Circuit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string')]
    private $image;

    #[Vich\UploadableField(mapping: "circuit_images", fileNameProperty: "image")]
    private $imageFile;

    #[ORM\Column(type: 'string', length: 50)]
    private $title;

    #[ORM\Column(type: 'string', length: 100)]
    private $locality;

    #[ORM\Column(type: 'text')]
    private $content;

    #[ORM\ManyToMany(targetEntity: Filter::class, inversedBy: 'circuits')]
    private $filter;

    #[ORM\ManyToMany(targetEntity: Discover::class, mappedBy: 'circuit')]
    private $discover;

    #[ORM\Column(type: 'string', length: 50)]
    private $relationship;

    #[ORM\Column(type: 'string', length: 50)]
    private $duration;

    #[ORM\Column(type: 'string', length: 50)]
    private $price;

    #[ORM\Column(type: 'text')]
    private $fullcontent;

    #[ORM\OneToMany(mappedBy: 'circuit', targetEntity: Producer::class, orphanRemoval: true)]
    private $producer;

    #[ORM\OneToMany(mappedBy: 'circuit', targetEntity: Program::class, orphanRemoval: true)]
    private $program;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private $created_at;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private $modified_at;

    #[ORM\Column(type: 'string', length: 100)]
    private $stage;

    #[ORM\Column(type: 'text')]
    private $destination;

    public function __construct()
    {
        $this->filter = new ArrayCollection();
        $this->producer = new ArrayCollection();
        $this->discover = new ArrayCollection();
        $this->program = new ArrayCollection();
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

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return Collection<int, Filter>
     */
    public function getFilter(): Collection
    {
        return $this->filter;
    }

    public function addFilter(Filter $filter): self
    {
        if (!$this->filter->contains($filter)) {
            $this->filter[] = $filter;
        }

        return $this;
    }

    public function removeFilter(Filter $filter): self
    {
        $this->filter->removeElement($filter);

        return $this;
    }

    /**
     * @return Collection<int, Discover>
     */
    public function getDiscover(): Collection
    {
        return $this->discover;
    }

    public function addDiscover(Discover $discover): self
    {
        if (!$this->discover->contains($discover)) {
            $this->discover[] = $discover;
            $discover->addCircuit($this);
        }

        return $this;
    }

    public function removeDiscover(Discover $discover): self
    {
        if ($this->discover->removeElement($discover)) {
            $discover->removeCircuit($this);
        }

        return $this;
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

    public function getFullcontent(): ?string
    {
        return $this->fullcontent;
    }

    public function setFullcontent(string $fullcontent): self
    {
        $this->fullcontent = $fullcontent;

        return $this;
    }

        
    /**
     * @return Collection<int, producer>
     */
    public function getProducer(): Collection
    {
        return $this->producer;
    }
    
    public function addProducer(producer $producer): self
    {
        if (!$this->producer->contains($producer)) {
            $this->producer[] = $producer;
            $producer->setCircuit($this);
        }
        
        return $this;
    }
    
    public function removeProducer(producer $producer): self
    {
        if ($this->producer->removeElement($producer)) {
            // set the owning side to null (unless already changed)
            if ($producer->getCircuit() === $this) {
                $producer->setCircuit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, program>
     */
    public function getProgram(): Collection
    {
        return $this->program;
    }
    
    public function addProgram(program $program): self
    {
        if (!$this->program->contains($program)) {
            $this->program[] = $program;
            $program->setCircuit($this);
        }
        
        return $this;
    }
    
    public function removeProgram(program $program): self
    {
        if ($this->program->removeElement($program)) {
            // set the owning side to null (unless already changed)
            if ($program->getCircuit() === $this) {
                $program->setCircuit(null);
            }
        }

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

    public function __toString()
    {
        return $this->title;
    }

    public function getStage(): ?string
    {
        return $this->stage;
    }

    public function setStage(string $stage): self
    {
        $this->stage = $stage;

        return $this;
    }

    public function getDestination(): ?string
    {
        return $this->destination;
    }

    public function setDestination(string $destination): self
    {
        $this->destination = $destination;

        return $this;
    }

}
