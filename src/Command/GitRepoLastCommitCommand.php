<?php

namespace App\Command;

use App\Service\GitRepo\GitRepoManager;
use App\Service\GitRepo\GitServiceFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class GitRepoLastCommitCommand extends Command
{
    protected static $defaultName = 'git-repo:get-last-commit';

    private $gitRepoManager;

    private $gitServiceFactory;

    public function __construct(GitRepoManager $gitRepoManager, GitServiceFactory $gitServiceFactory, string $name = null)
    {
        $this->gitRepoManager = $gitRepoManager;

        $this->gitServiceFactory = $gitServiceFactory;

        parent::__construct($name);
    }

    protected function configure()
    {
        $this
            ->setDescription('Returns last commit sha for current repository')
            ->addArgument('repo', InputArgument::REQUIRED, 'Repository name')
            ->addArgument('branch', InputArgument::REQUIRED, 'Branch name')
            ->addOption('service', null, InputOption::VALUE_OPTIONAL, 'Service name', 'github')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        try {
            $gitService = $this->gitServiceFactory->buildGitService(
                $input->getArgument('repo'),
                $input->getArgument('branch'),
                $input->getOption('service')
            );

            $io->success($this->gitRepoManager->getLastCommitSha($gitService));
        } catch (\Exception $exception) {
            $io->error($exception->getMessage());
        }
    }
}
