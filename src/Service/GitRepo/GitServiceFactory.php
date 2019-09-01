<?php

namespace App\Service\GitRepo;

use Symfony\Component\Console\Input\InputInterface;

class GitServiceFactory
{
    public function buildGitService(InputInterface $input):GitServiceInterface
    {
        switch ($input->getOption('service')) {
            case "github":
                return new GitHubService($input->getArgument('repo'), $input->getArgument('branch'));
                break;
            default:
                throw new \InvalidArgumentException(sprintf("Unknown service '%s'", $input->getOption('service')));
        }
    }
}