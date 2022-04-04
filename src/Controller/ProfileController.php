<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController {
    #[Route('/profile', name: 'profile')]
    public function index(ProjectRepository $projectRepository): Response {
        $projects = $projectRepository->findAll();
        return $this->render('profile/index.html.twig', [
            'controller_name' => 'ProfileController',
            'projects' => $projects
        ]);
    }
}
