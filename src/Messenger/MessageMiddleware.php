<?php

declare(strict_types=1);

namespace App\Messenger;

use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Middleware\MiddlewareInterface;
use Symfony\Component\Messenger\Middleware\StackInterface;
use Symfony\Component\Messenger\Stamp\DelayStamp;

final class MessageMiddleware implements MiddlewareInterface
{
    public function handle(Envelope $envelope, StackInterface $stack): Envelope
    {
        if($this->isMessage($envelope) && $this->isPair($envelope->getMessage()))
        {
            $envelope = $envelope->with(new DelayStamp(5000));
        }

        return $stack->next()->handle($envelope, $stack);
    }

    private function isMessage(Envelope $envelope): bool
    {
        return $envelope->getMessage() instanceof Message;
    }

    private function isPair(Message $message): bool
    {
        return $message->identifier() % 2 === 0;
    }
}
