<?php

namespace App\Controller;

use App\Form\CommandForm;
use App\Message\ShellCommand;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;


class RunController extends AbstractController
{

    /**
     * @Route(path="/run", name="run_command")
     */
    public function __invoke(Request $request, MessageBusInterface $messageBus): Response
    {
        $command = new ShellCommand();

        $form = $this->createForm(CommandForm::class, $command);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $command = $form->getData();
            $messageBus->dispatch($command);
            return $this->redirectToRoute('list_commands');
        }

        return $this->renderForm('run.html.twig', [
            'form' => $form
        ]);
    }

}