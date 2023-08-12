<?php

namespace App\Controller;

use App\Entity\PollsQuestion;
use App\Repository\PollsQuestionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_hello')]
    public function index(PollsQuestionRepository $questionRepo): Response
    {
        /** @var PollsQuestion[] $questions */
        $questions = $questionRepo->findAll();
        return $this->render('home/index.html.twig', [
            'questions' => $questions,
        ]);
    }
}
