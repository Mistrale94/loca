<?php

namespace App\Entity;

use App\Repository\TrendingRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TrendingRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Trending
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: circuit::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $article_id;

    #[ORM\Column(type: 'datetime_immutable')]
    private $created_at;

    #[ORM\Column(type: 'datetime_immutable')]
    private $modified_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArticleId(): ?circuit
    {
        return $this->article_id;
    }

    public function setArticleId(?circuit $article_id): self
    {
        $this->article_id = $article_id;

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
        $this->createdAt = new \DateTimeImmutable();
    }

    #[ORM\PrePersist]
    public function setUpdatedAtValue(){
        $this->updatedAt = new \DateTimeImmutable();
    }
}
