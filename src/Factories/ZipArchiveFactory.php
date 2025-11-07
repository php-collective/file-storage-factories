<?php declare(strict_types = 1);

/**
 * Copyright (c) Florian Krämer (https://florian-kraemer.net)
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Florian Krämer (https://florian-kraemer.net)
 * @author Florian Krämer
 * @link https://github.com/Phauthentic
 * @license https://opensource.org/licenses/MIT MIT License
 */

namespace PhpCollective\Infrastructure\Storage\Factories;

use League\Flysystem\FilesystemAdapter;
use League\Flysystem\ZipArchive\FilesystemZipArchiveProvider;
use League\Flysystem\ZipArchive\ZipArchiveAdapter;

/**
 * ZipArchiveFactory
 */
class ZipArchiveFactory extends AbstractFactory
{
    protected string $alias = 'zip';

    protected string $package = 'league/flysystem-ziparchive';

    protected string $className = ZipArchiveAdapter::class;

    /**
     * @inheritDoc
     */
    public function build(array $config): FilesystemAdapter
    {
        $defaults = [
            'location' => null,
            'root' => '',
            'mimeTypeDetector' => null,
            'visibility' => null,
        ];
        $config += $defaults;

        $provider = new FileSystemZipArchiveProvider($config['location']);

        return new ZipArchiveAdapter($provider, $config['root'], $config['mimeTypeDetector'], $config['visibility']);
    }
}
