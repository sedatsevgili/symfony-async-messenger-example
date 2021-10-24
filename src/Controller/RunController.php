<?php

namespace App\Controller;

use App\Form\CommandForm;
use App\Message\ShellCommand;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class RunController extends AbstractController
{

    /**
     * @Route(path="/run", name="run_command")
     */
    public function __invoke(Request $request): Response
    {
        $command = new ShellCommand();

        $form = $this->createForm(CommandForm::class, $command);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // TODO ok
            $command = $form->getData();

            dd($command);
        }


        return $this->renderForm('run.html.twig', [
            'form' => $form
        ]);
    }

}