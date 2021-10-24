<?php

namespace App\MessageHandler;

use App\Entity\Command;
use App\Message\ShellCommand;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Process\Process;

class ShellCommandMessageHandler implements MessageHandlerInterface
{

    private EntityManagerInterface $entityManager;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function __invoke(ShellCommand $command): void
    {
        $process = new Process(explode(' ', $command->getCommand()));
        $process->run();

        $commandEntity = new Command();
        $commandEntity->setCommand($command->getCommand());
        $commandEntity->setResult($process->getOutput());
        $commandEntity->setStatus($process->getStatus());
        $commandEntity->setRunnedAt(new \DateTimeImmutable());
        $this->entityManager->persist($commandEntity);
        $this->entityManager->flush();
    }

}