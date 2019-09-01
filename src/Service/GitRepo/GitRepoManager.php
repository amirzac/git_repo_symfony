<?php

namespace App\Service\GitRepo;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class GitRepoManager
{
    private $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function getLastCommitSha(GitServiceInterface $gitService):string
    {
        $response = $this->httpClient->request('GET', $gitService->getRequestUrl());

        return $gitService->getLastCommitSha($response);
    }
}