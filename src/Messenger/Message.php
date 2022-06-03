<?php

declare(strict_types=1);

namespace App\Messenger;

final class Message
{
    public function __construct(protected int $identifier)
    {
    }

    public function identifier(): int
    {
        return $this->identifier;
    }
}
