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

use League\Flysystem\FilesystemAdapter;
use League\Flysystem\InMemory\InMemoryFilesystemAdapter;

/**
 * Memory
 */
class MemoryFactory extends AbstractFactory
{
    protected string $alias = 'memory';

    protected string $package = 'league/flysystem-memory';

    protected string $className = InMemoryFilesystemAdapter::class;

    /**
     * @inheritDoc
     */
    public function build(array $config): FilesystemAdapter
    {
        return new InMemoryFilesystemAdapter();
    }
}
