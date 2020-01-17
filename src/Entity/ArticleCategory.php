<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
//use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleCategoryRepository")
 */
class ArticleCategory
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="Category")
     */
    private $category;

    /**
     * @ORM\OneToOne(targetEntity="Article")
     */
    private $article;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    public function __construct()
    {
        $this->created_at = new \DateTime();
        $this->article = new Article();
        $this->category = new Category();
    }

    // public function __toString()
    // {
    //     $this->article = $this->article->title;
    //     $this->category = $this->category->name;
    // }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get category
     *
     * @return \App\Entity\Category
     */
    public function getCategory(): Category
    {
        return $this->category;
    }

    public function setCategory(Category $category): self
    {
        $this->category = $category;

        return $this;
    }

     /**
     * Get article
     *
     * @return \App\Entity\Article
     */
    public function getArticle(): Article
    {
        return $this->article;
    }

    public function setArticle(Article $article): self
    {
        $this->article = $article;

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
}
