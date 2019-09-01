<?php

namespace App\Tests\GitRepo;

use Symfony\Contracts\HttpClient\ResponseInterface;

class HttpFakeResponse implements ResponseInterface
{
    public function getStatusCode(): int
    {
        // TODO: Implement getStatusCode() method.
    }

    public function getHeaders(bool $throw = true): array
    {
        // TODO: Implement getHeaders() method.
    }

    public function getContent(bool $throw = true): string
    {
        // TODO: Implement getContent() method.
    }

    public function toArray(bool $throw = true): array
    {
        return [
            0 => [
                'sha' => '9df4cb1ccc5'
            ],
        ];
    }

    public function cancel(): void
    {
        // TODO: Implement cancel() method.
    }

    public function getInfo(string $type = null)
    {
        // TODO: Implement getInfo() method.
    }

}