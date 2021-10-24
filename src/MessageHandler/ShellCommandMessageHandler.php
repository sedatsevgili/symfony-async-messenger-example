<?php

namespace App\MessageHandler;

use App\Message\ShellCommand;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Process\Process;

class ShellCommandMessageHandler implements MessageHandlerInterface
{

    public function __invoke(ShellCommand $command): string
    {
        $process = new Process(explode(' ', $command->getCommand()));
        $process->run();
        return $process->getOutput();
    }

}