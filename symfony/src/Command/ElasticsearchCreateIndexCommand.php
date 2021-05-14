<?php

namespace App\Command;

use App\Service\CreatejsonService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ElasticsearchCreateIndexCommand extends Command
{
    protected static $defaultName = 'app:elasticsearch:create-index';
    protected static $defaultDescription = 'create elasticsearch index';

    protected $createJsonService;

        /**
     * RunCommand constructor.
     * @param CreatejsonService $createJsonService
     */
    public function __construct(CreatejsonService $createJsonService)
    {
        $this->createJsonService = $createJsonService;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setDescription(self::$defaultDescription)
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->createJsonService->indexBuilder();

        $io = new SymfonyStyle($input, $output);

        $io->success('Successfully Index Created');

        return Command::SUCCESS;
    }
}
