<?php

namespace PhpCollective\Infrastructure\Storage\Adapter;

use League\Flysystem\Config;
use League\Flysystem\FileAttributes;
use League\Flysystem\FilesystemAdapter;

class NullFilesystemAdapter implements FilesystemAdapter
{
    /**
     * @param string $path
     *
     * @return bool
     */
    public function fileExists(string $path): bool
    {
        return false;
    }

    /**
     * @param string $path
     * @param string $contents
     * @param \League\Flysystem\Config $config
     *
     * @return void
     */
    public function write(string $path, string $contents, Config $config): void
    {
    }

    /**
     * @param string $path
     * @param $contents
     * @param \League\Flysystem\Config $config
     *
     * @return void
     */
    public function writeStream(string $path, $contents, Config $config): void
    {
    }

    /**
     * @param string $path
     *
     * @return string
     */
    public function read(string $path): string
    {
        return '';
    }

    /**
     * @param string $path
     *
     * @return resource
     */
    public function readStream(string $path)
    {
        /** @var resource $stream */
        $stream = fopen('php://temp', 'w+b');
        fwrite($stream, '');
        rewind($stream);

        return $stream;
    }

    /**
     * @param string $path
     *
     * @return void
     */
    public function delete(string $path): void
    {
    }

    /**
     * @param string $path
     *
     * @return void
     */
    public function deleteDirectory(string $path): void
    {
    }

    /**
     * @param string $path
     * @param \League\Flysystem\Config $config
     *
     * @return void
     */
    public function createDirectory(string $path, Config $config): void
    {
    }

    /**
     * @param string $path
     * @param string $visibility
     *
     * @return void
     */
    public function setVisibility(string $path, string $visibility): void
    {
    }

    /**
     * @param string $path
     *
     * @return \League\Flysystem\FileAttributes
     */
    public function visibility(string $path): FileAttributes
    {
        return new FileAttributes('');
    }

    /**
     * @param string $path
     *
     * @return \League\Flysystem\FileAttributes
     */
    public function mimeType(string $path): FileAttributes
    {
        return new FileAttributes('');
    }

    /**
     * @param string $path
     *
     * @return \League\Flysystem\FileAttributes
     */
    public function lastModified(string $path): FileAttributes
    {
        return new FileAttributes('');
    }

    /**
     * @param string $path
     *
     * @return \League\Flysystem\FileAttributes
     */
    public function fileSize(string $path): FileAttributes
    {
        return new FileAttributes('');
    }

    /**
     * @param string $path
     * @param bool $deep
     *
     * @return iterable
     */
    public function listContents(string $path, bool $deep): iterable
    {
        return [];
    }

    /**
     * @param string $source
     * @param string $destination
     * @param \League\Flysystem\Config $config
     *
     * @return void
     */
    public function move(string $source, string $destination, Config $config): void
    {
    }

    /**
     * @param string $source
     * @param string $destination
     * @param \League\Flysystem\Config $config
     *
     * @return void
     */
    public function copy(string $source, string $destination, Config $config): void
    {
    }

    /**
     * @param string $path
     *
     * @return bool
     */
    public function directoryExists(string $path): bool
    {
        return true;
    }
}
