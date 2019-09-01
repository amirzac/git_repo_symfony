<?php

namespace App\Service\GitRepo;

use Symfony\Contracts\HttpClient\ResponseInterface;

interface GitServiceInterface
{
    public function __construct(string $repoName, string $branchName);

    public function getRequestUrl():string ;

    public function getLastCommitSha(ResponseInterface $response):string ;
}