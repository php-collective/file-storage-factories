<?php

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

declare(strict_types=1);

namespace PhpCollective\Storage\Test\TestCase\Storage;

use League\Flysystem\Adapter\Local;
use PhpCollective\Infrastructure\Storage\Exception\AdapterFactoryNotFoundException;
use PhpCollective\Infrastructure\Storage\StorageAdapterFactory;
use PhpCollective\Storage\Test\TestCase\StorageTestCase as TestCase;

/**
 * StorageAdapterFactoryTest
 */
class StorageAdapterFactoryTest extends TestCase
{
    /**
     * testBuildStorageAdapter
     *
     * @return void
     */
    public function testBuildStorageAdapter(): void
    {
        $factory = new StorageAdapterFactory();

        $result = $factory->buildStorageAdapter('Local', [
            'root' => $this->testPath,
        ]);

        $this->assertInstanceOf(Local::class, $result);
    }

    /**
     * testAdapterFactoryNotFoundExceptionTrigger
     *
     * @return void
     */
    public function testAdapterFactoryNotFoundExceptionTrigger(): void
    {
        $factory = new StorageAdapterFactory();

        $this->expectException(AdapterFactoryNotFoundException::class);
        $this->expectExceptionMessage('Adapter factory `\PhpCollective\Infrastructure\Storage\Factories\DoesNotExistFactory` was not found');
        $result = $factory->buildStorageAdapter('DoesNotExist', []);
    }
}
