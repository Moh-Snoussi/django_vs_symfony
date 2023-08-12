<?php

namespace App\Entity;

use App\Repository\PollsChoiceRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\PollsQuestion;

#[ORM\Entity(repositoryClass: PollsChoiceRepository::class)]
class PollsChoice
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
    private string $choiceText;

    public function getChoiceText(): string
    {
        return $this->choiceText;
    }

    public function setChoiceText(string $choiceText): void
    {
        $this->choiceText = $choiceText;
    }

    #[ORM\Column(type: 'integer', options: ['unsigned' => true])]
    private int $votes;

    public function getVotes(): int
    {
        return $this->votes;
    }

    public function setVotes(int $votes): void
    {
        $this->votes = $votes;
    }

    #[ORM\ManyToOne(inversedBy: 'choices', targetEntity: PollsQuestion::class)]
    #[ORM\JoinColumn(nullable: false)]
    private PollsQuestion $question;

    public function getQuestion(): PollsQuestion
    {
        return $this->question;
    }

    public function setQuestion(PollsQuestion $question): void
    {
        $this->question = $question;
    }

    /**
     * @param string[] $choices
     */
    public static function factoreList(iterable $choices, PollsQuestion $question): array
    {
        $list = [];
        foreach ($choices as $choice) {
            $list[] = new self($choice, 0, $question);
        }
        return $list;
    }
}

