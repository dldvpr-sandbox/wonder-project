<?php

namespace App\Controller;

use App\Entity\Question;
use App\Form\QuestionType;
use App\Repository\QuestionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/question', name: 'question_')]
class QuestionController extends AbstractController
{
    public function __construct(public readonly EntityManagerInterface $entityManager,
                                private readonly QuestionRepository $questionRepository) {

    }

    #[Route('/ask', name: 'form')]
    public function index(Request $request): Response
    {
        $question = new Question();
        $formQuestion = $this->createForm(QuestionType::class, $question);
        $formQuestion->handleRequest($request);
        if ($formQuestion->isSubmitted() && $formQuestion->isValid()) {
            $question
                ->setNbrOfResponse(0)
                ->setCreatedAt(new \DateTimeImmutable())
                ->setRating(0);
            $this->entityManager->persist($question);
            $this->entityManager->flush();
            $this->addFlash('success', 'Votre question à été ajouté.');

            return $this->redirectToRoute('home');
        }

        return $this->render('question/index.html.twig', [
            'form' => $formQuestion->createView(),
        ]);
    }

    #[Route('/{id}', name: 'show')]
    public function show(Question $question): Response
    {
//                'name' => 'Jean Dupont',
//                'avatar' => 'https://randomuser.me/api/portraits/men/52.jpg'


        return $this->render('question/show.html.twig', [
            'question' => $question,
        ]);
    }
}