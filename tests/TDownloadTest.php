<?php

namespace Zhxdev\TDownload\Tests;

use PHPUnit\Framework\TestCase;
use Zhxdev\TDownload\TDownload;

class TDownloadTest extends TestCase
{
    /** @test */
    public function it_can_getPackageDetail()
    {
        $array = (new TDownload())->getPackageDetail();

        $this->assertEquals([
            'author' => [
                'name' => 'Muh Ezha Syafaat',
                'username' => 'ezhasyafaat',
                'email' => 'muhammadezhasyafaat08@gmail.com',
            ],
            'vendor' => [
                'name' => 'Zhxdev',
                'slug' => 'zhxdev',
            ],
            'package' => [
                'name' => 'TDownload',
                'slug' => 'tdownload',
                'description' => 'Package tiktok downloader',
            ],
        ], $array);
    }
}
