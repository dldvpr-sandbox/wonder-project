<?php

namespace App\Controller;

use App\Repository\QuestionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    public function __construct(
        private QuestionRepository $questionRepository,
    )
    {}
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        //https://randomuser.me/api/portraits/men/46.jpg
        $questions = $this->questionRepository->findAll();

        return $this->render('home/index.html.twig', [
            'questions' => $questions
        ]);
    }
}