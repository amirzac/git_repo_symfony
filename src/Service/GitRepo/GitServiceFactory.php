<?php

namespace App\Service\GitRepo;

class GitServiceFactory
{
    public function buildGitService(string $repo, string $branch, string $service):GitServiceInterface
    {
        switch ($service) {
            case "github":
                return new GitHubService($repo, $branch);
                break;
            default:
                throw new \InvalidArgumentException(sprintf("Unknown service '%s'", $repo));
        }
    }
}