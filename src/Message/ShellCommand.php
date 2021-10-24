<?php

namespace App\Message;

class ShellCommand
{

    private string $command;

    private array $arguments;

    public function __construct(string $command = "", array $arguments = [])
    {
        $this->command = $command;
        $this->arguments = $arguments;
    }

    public function setCommand(string $command = ""): void
    {
        $this->command = $command;
    }

    public function setArguments(array $arguments = []): void
    {
        $this->arguments = $arguments;
    }



    public function getCommand(): string
    {
        return $this->command;
    }

    public function getArguments(): array
    {
        return $this->arguments;
    }




}