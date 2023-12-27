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
use League\Flysystem\Local\LocalFilesystemAdapter;
use PhpCollective\Infrastructure\Storage\Exception\PackageRequiredException;

/**
 * AbstractFactory
 */
abstract class AbstractFactory implements FactoryInterface
{
    /**
     * @var string
     */
    protected string $alias = 'local';

    /**
     * @var string
     */
    protected string $package = 'league/flysystem';

    /**
     * @var string
     */
    protected string $className = LocalFilesystemAdapter::class;

    /**
     * @return string
     */
    public function className(): string
    {
        return $this->className;
    }

    /**
     * @return string
     */
    public function alias(): string
    {
        return $this->alias;
    }

    /**
     * @throws \PhpCollective\Infrastructure\Storage\Exception\PackageRequiredException
     *
     * @return void
     */
    public function availabilityCheck(): void
    {
        if (!class_exists($this->className)) {
            throw PackageRequiredException::fromAdapterAndPackageNames(
                $this->alias,
                $this->package,
            );
        }
    }

    /**
     * @inheritDoc
     */
    abstract public function build(array $config): FilesystemAdapter;
}
