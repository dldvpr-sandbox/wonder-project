<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $questions = [
            [
                'title' => 'Je suis une question',
                'content' => 'lorem ipsum dolor sit amet consectetur adipiscing elit pariatur',
                'rating' => 20,
                'author' => [
                    'name' => 'John Doe',
                    'avatar' => 'https://randomuser.me/api/portraits/lego/6.jpg',
                ],
                'nbrOfResponses' => 15,
            ],
            [
                'title' => 'Je suis une question',
                'content' => 'lorem ipsum dolor sit amet consectetur adipiscing elit pariatur',
                'rating' => 15,
                'author' => [
                    'name' => 'John Doe',
                    'avatar' => 'https://randomuser.me/api/portraits/lego/6.jpg',
                ],
                'nbrOfResponses' => 2,
            ],
            [
                'title' => 'Je suis une question',
                'content' => 'lorem ipsum dolor sit amet consectetur adipiscing elit pariatur',
                'rating' => 0,
                'author' => [
                    'name' => 'John Doe',
                    'avatar' => 'https://randomuser.me/api/portraits/lego/6.jpg',
                ],
                'nbrOfResponses' => 90,
            ],
            [
                'title' => 'Je suis une question',
                'content' => 'lorem ipsum dolor sit amet consectetur adipiscing elit pariatur',
                'rating' => 45,
                'author' => [
                    'name' => 'John Doe',
                    'avatar' => 'https://randomuser.me/api/portraits/lego/6.jpg',
                ],
                'nbrOfResponses' => 197,
            ],
            [
                'title' => 'Je suis une question',
                'content' => 'lorem ipsum dolor sit amet consectetur adipiscing elit pariatur',
                'rating' => 4,
                'author' => [
                    'name' => 'John Doe',
                    'avatar' => 'https://randomuser.me/api/portraits/lego/6.jpg',
                ],
                'nbrOfResponses' => 5,
            ],
            [
                'title' => 'Je suis une question',
                'content' => 'lorem ipsum dolor sit amet consectetur adipiscing elit pariatur',
                'rating' => 23,
                'author' => [
                    'name' => 'John Doe',
                    'avatar' => 'https://randomuser.me/api/portraits/lego/6.jpg',
                ],
                'nbrOfResponses' => 7,
            ],
        ];
        return $this->render('home/index.html.twig', [
            'questions' => $questions,
        ]);
    }
}
