<?php

namespace App\Service\GitRepo;

use Symfony\Contracts\HttpClient\ResponseInterface;

class GitHubService implements GitServiceInterface
{
    private $repoName;

    private $branchName;

    public function __construct(string $repoName, string $branchName)
    {
        $this->repoName = $repoName;

        $this->branchName = $branchName;
    }

    public function getRequestUrl(): string
    {
        return sprintf(
            "https://api.github.com/repos/%s/commits?sha=%s&per_page=1",
            $this->repoName,
            $this->branchName
        );
    }

    public function getLastCommitSha(ResponseInterface $response): string
    {
        $arrayData = $response->toArray();

        if(isset($arrayData[0]['sha'])) {
            return $arrayData[0]['sha'];
        }

        throw new \LogicException('Now data');
    }
}