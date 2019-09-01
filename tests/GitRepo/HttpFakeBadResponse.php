<?php

namespace App\Tests\GitRepo;

class HttpFakeBadResponse extends HttpFakeResponse
{
    public function toArray(bool $throw = true): array
    {
        return [

        ];
    }
}