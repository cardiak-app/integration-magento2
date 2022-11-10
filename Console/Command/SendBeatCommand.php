<?php

namespace Cardiak\Beat\Console\Command;

use Cardiak\Beat\Cron\SendBeat;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SendBeatCommand extends Command
{
    private SendBeat $sendBeat;

    public function __construct(SendBeat $sendBeat)
    {
        parent::__construct();
        $this->sendBeat = $sendBeat;
    }

    /**
     * Initialization of the command.
     */
    protected function configure()
    {
        $this->setName('caridak:beat:send');
        $this->setDescription('Send a heartbeat to cardiak.app');
        parent::configure();
    }

    /**
     * CLI command description.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        $return = $this->sendBeat->execute();
        echo 'Running send beat: '.var_export($return, true).PHP_EOL;
    }
}
