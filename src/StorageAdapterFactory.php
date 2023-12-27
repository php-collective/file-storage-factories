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

namespace PhpCollective\Infrastructure\Storage;

use League\Flysystem\FilesystemAdapter;
use PhpCollective\Infrastructure\Storage\Exception\AdapterFactoryNotFoundException;
use Psr\Container\ContainerInterface;

/**
 * StorageFactory - Manages and instantiates storage engine adapters.
 */
class StorageAdapterFactory implements StorageAdapterFactoryInterface
{
    /**
     * @var \Psr\Container\ContainerInterface
     */
    protected ?ContainerInterface $container;

    /**
     * @param \Psr\Container\ContainerInterface|null $container Container
     */
    public function __construct(?ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * Instantiates Flystem adapters.
     *
     * @param string $adapterClass Adapter alias or classname
     * @param array $options Options
     *
     * @return \League\Flysystem\FilesystemAdapter
     */
    public function buildStorageAdapter(
        string $adapterClass,
        array $options
    ): FilesystemAdapter {
        /** @var class-string<\PhpCollective\Infrastructure\Storage\Factories\FactoryInterface> $adapterClass */
        $adapterClass = $this->checkAndResolveAdapterClass($adapterClass);

        if ($this->container !== null) {
            /** @var \PhpCollective\Infrastructure\Storage\Factories\FactoryInterface $factory */
            $factory = $this->container->get($adapterClass);

            return $factory->build($options);
        }

        return (new $adapterClass())->build($options);
    }

    /**
     * @param string $adapterClass Adapter Class name or string
     *
     * @throws \PhpCollective\Infrastructure\Storage\Exception\AdapterFactoryNotFoundException
     *
     * @return string
     */
    protected function checkAndResolveAdapterClass(string $adapterClass): string
    {
        if (!class_exists($adapterClass)) {
            $adapterClass = '\PhpCollective\Infrastructure\Storage\Factories\\' . $adapterClass . 'Factory';
        }

        if (!class_exists($adapterClass)) {
            throw AdapterFactoryNotFoundException::fromName($adapterClass);
        }

        return $adapterClass;
    }
}
