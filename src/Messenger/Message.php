<?php

namespace App\Messenger;

class Message
{
    public function __construct(
        protected int $identifier
    )
    {
    }

    public function identifier(): int
    {
        return $this->identifier;
    }

}