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

use League\Flysystem\FilesystemAdapter;
use League\Flysystem\Local\LocalFilesystemAdapter;
use PhpCollective\Infrastructure\Storage\Exception\PackageRequiredException;
use PhpCollective\Infrastructure\Storage\Factories\AbstractFactory;
use PhpCollective\Storage\Test\TestCase\StorageTestCase as TestCase;

/**
 * AwsS3FactoryTest
 */
class AbstractFactoryTest extends TestCase
{
    /**
     * @return void
     */
    public function testFactory(): void
    {
        $factory = new class extends AbstractFactory
        {
            protected string $className = 'DoesNotExist';

            /**
             * @param array<string, mixed> $config
             *
             * @return \League\Flysystem\FilesystemAdapter
             */
            public function build(array $config): FilesystemAdapter
            {
                $this->availabilityCheck();

                $testAdapter = LocalFilesystemAdapter::class;

                return new $testAdapter();
            }
        };
        $this->assertEquals('local', $factory->alias());
        $this->assertEquals('DoesNotExist', $factory->className());

        $this->expectException(PackageRequiredException::class);
        $factory->build([]);
    }
}
