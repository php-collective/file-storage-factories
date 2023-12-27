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

namespace PhpCollective\Storage\Test\TestCase\Storage\Factories;

use League\Flysystem\InMemory\InMemoryFilesystemAdapter;
use PhpCollective\Infrastructure\Storage\Factories\MemoryFactory;
use PhpCollective\Storage\Test\TestCase\StorageTestCase as TestCase;

/**
 * MemoryFactoryTest
 */
class MemoryFactoryTest extends TestCase
{
    /**
     * @return void
     */
    public function testFactory(): void
    {
        $factory = new MemoryFactory();
        $result = $factory->build([]);
        $this->assertInstanceOf(InMemoryFilesystemAdapter::class, $result);
    }
}
