<?php declare(strict_types=1);

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

use League\Flysystem\Local\LocalFilesystemAdapter;

/**
 * LocalFactory
 */
class LocalFactory extends AbstractFactory
{
    protected string $alias = 'local';

    protected string $package = 'league/flysystem';

    protected string $className = LocalFilesystemAdapter::class;

    /**
     * @param array<string, mixed> $config
     *
     * @return \League\Flysystem\Local\LocalFilesystemAdapter
     */
    public function build(array $config): LocalFilesystemAdapter
    {
        $this->availabilityCheck();

        $config += ['root' => '/'];

        return new LocalFilesystemAdapter($config['root']);
    }
}
