<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SourceCodeRepository")
 */
class SourceCode
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $text;

    public function getId()
    {
        return $this->id;
    }

    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     * @return SourceCode
     */
    public function setText($text): self
    {
        $this->text = $text;

        return $this;
    }
}
