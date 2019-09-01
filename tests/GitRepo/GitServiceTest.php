<?php

namespace App\Tests\GitRepo;

use App\Service\GitRepo\GitHubService;
use App\Service\GitRepo\GitServiceInterface;
use PHPUnit\Framework\TestCase;

class GitServiceTest extends TestCase
{
    /**
     * @var GitServiceInterface
     */
    private $gitService;

    public function setUp()
    {
        $this->gitService = new GitHubService('php-fig/log', 'master');
    }

    public function testGetRequestUrl()
    {
        $this->assertNotEmpty($this->gitService->getRequestUrl());
    }

    public function testGetLastCommitSha()
    {
        $this->assertEquals('9df4cb1ccc5', $this->gitService->getLastCommitSha(new HttpFakeResponse()));
    }

    public function testGetLastCommitShaBadResponse()
    {
        $this->expectException(\LogicException::class);
        $this->gitService->getLastCommitSha(new HttpFakeBadResponse());
    }
}