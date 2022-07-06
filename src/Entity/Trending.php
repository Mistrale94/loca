<?php

namespace App\Entity;

use App\Repository\TrendingRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TrendingRepository::class)]
class Trending
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: circuit::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $article_id;

    #[ORM\Column(type: 'datetime')]
    private $created_at;

    #[ORM\Column(type: 'datetime')]
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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getModifiedAt(): ?\DateTimeInterface
    {
        return $this->modified_at;
    }

    public function setModifiedAt(\DateTimeInterface $modified_at): self
    {
        $this->modified_at = $modified_at;

        return $this;
    }
}
