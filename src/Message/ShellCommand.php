<?php

namespace App\Message;

class ShellCommand
{

    private string $command;

    public function __construct(string $command = "")
    {
        $this->command = $command;
    }

    public function setCommand(string $command = ""): void
    {
        $this->command = $command;
    }

    public function getCommand(): string
    {
        return $this->command;
    }

}