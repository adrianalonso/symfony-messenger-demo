<?php

namespace App\Messenger;

use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

#[AsMessageHandler]
class MessageHandler implements MessageHandlerInterface
{
    const FAIL_PROBABILITY = 20;
    const SIMULATOR_THIRD_PARTY_WAIT_TIME = 1;

    public function __invoke(Message $message)
    {
        echo(sprintf("🏃 Processing message with identifier %s \n", $message->identifier()));

        sleep(self::SIMULATOR_THIRD_PARTY_WAIT_TIME);

        if (rand(0, 100) < self::FAIL_PROBABILITY) {
            $errorMessage= sprintf("😭 Message %s fail \n", $message->identifier());
            echo($errorMessage);
            throw new \Exception($errorMessage);
        }

        echo(sprintf("🏆 Message with identifier %s processed successfully\n", $message->identifier()));
    }
}