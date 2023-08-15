<?php

namespace App\Entity;

use App\Repository\PollsQuestionRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PollsQuestionRepository::class)]
class PollsQuestion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    #[ORM\Column(length: 200)]
    private string $questionText;

    public function getQuestionText(): string
    {
        return $this->questionText;
    }

    public function setQuestionText(string $questionText): void
    {
        $this->questionText = $questionText;
    }

    #[ORM\Column(type: 'datetime')]
    private \DateTimeInterface $pubDate;

    public function getPubDate(): \DateTimeInterface
    {
        return $this->pubDate;
    }

    public function setPubDate(\DateTimeInterface $pubDate): void
    {
        $this->pubDate = $pubDate;
    }

    #[ORM\OneToMany(mappedBy: 'question', targetEntity: PollsChoice::class)]
    private iterable $choices;

    /**
     * @return iterable|Collection<PollsChoice>|PollsChoice[]
     */
    public function getChoices(): iterable
    {
        return $this->choices;
    }

    public function setChoices(iterable $choices): void
    {
        $this->choices = $choices;
    }

    public function addChoice(PollsChoice $choice): void
    {
        $this->choices[] = $choice;
    }
}
