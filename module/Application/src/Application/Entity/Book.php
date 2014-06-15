<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Album
 *
 * @ORM\Table(name="books")
 * @ORM\Entity
 */
class Book {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer", nullable=false)
     */
    protected $id;

    /** @ORM\Column(type="string", length=100, nullable=false) */
    protected $title;

    /** @ORM\Column(type="string", length=50, nullable=false) */
    protected $author;

    /** @ORM\Column(type="string", length=100, nullable=true) */
    protected $publisher;

    /** @ORM\Column(type="string", length=10, unique=true, nullable=false) */
    protected $isbn;

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getPublisher() {
        return $this->publisher;
    }

    public function getIsbn() {
        return $this->isbn;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function setPublisher($publisher) {
        $this->publisher = $publisher;
    }

    public function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

}
