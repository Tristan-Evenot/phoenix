<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
use App\Entity\Project;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends AbstractController {
    #[Route('/', name: 'projects')]
    public function index(ProjectRepository $projectRepository): Response {
        $projects = $projectRepository->findAll();

        return $this->render('project/index.html.twig', [
            'controller_name' => 'ProjectController',
            'projects' => $projects
        ]);
    }
    #[Route('/{id}', name: 'projet_vue', methods: ['GET'])]
    public function vue_projet(Project $project): Response {
        return $this->render('project/projet_vue.html.twig', [
            'project' => $project,
        ]);
    }
}
