<?php

namespace App\Command;

namespace App\Command;

use App\Messenger\Message;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Messenger\MessageBusInterface;

class GenerateMessagesCommand extends Command
{
    protected static $defaultName = 'app:demo:messages';

    public function __construct(
        protected MessageBusInterface $bus,
        string                        $name = null
    )
    {
        parent::__construct($name);
    }

    protected function configure()
    {
        $this->addArgument('num', InputArgument::REQUIRED, 'Number of Messages');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $num = $input->getArgument('num');

        for ($i = 0; $i < $num; $i++) {
            $this->bus->dispatch(new Message($i));
        }

        $io->success(sprintf('"%d" messages send to queue succesfully.', $num));

        return 0;
    }
}