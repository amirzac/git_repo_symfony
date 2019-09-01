<?php

namespace App\Tests\GitRepo;

use App\Service\GitRepo\GitHubService;
use App\Service\GitRepo\GitServiceInterface;
use PHPUnit\Framework\TestCase;
use App\Service\GitRepo\GitServiceFactory;

class GitServiceFactoryTest extends TestCase
{
    /**
     * @var GitServiceFactory
     */
    private $gitServiceFactory;

    public function setUp()
    {
        $this->gitServiceFactory = new GitServiceFactory();
    }

    public function testBuildGitService()
    {
        $gitService = $this->gitServiceFactory->buildGitService('php-fig/log', 'master', 'github');

        $this->assertTrue($gitService instanceof GitServiceInterface);
        $this->assertTrue($gitService instanceof GitHubService);
    }

    public function testUnknownServiceException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->gitServiceFactory->buildGitService('php-fig/log', 'master', 'bitbucket');
    }
}