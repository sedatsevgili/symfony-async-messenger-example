<?php

namespace App\Controller;

use App\Repository\CommandRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class ListController extends AbstractController
{

    private CommandRepository $commandRepository;

    /**
     * @param CommandRepository $commandRepository
     */
    public function __construct(CommandRepository $commandRepository)
    {
        $this->commandRepository = $commandRepository;
    }

    /**
     * @Route(path="/list", name="list_commands")
     */
    public function __invoke()
    {
        $commands = $this->commandRepository->createQueryBuilder('c')
            ->orderBy('c.runnedAt', 'desc')
            ->getQuery()
            ->getArrayResult();

        return $this->render('list.html.twig', ['commands' => $commands]);
    }


}