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

namespace PhpCollective\Storage\Test\TestCase\Storage\Factories;

use League\Flysystem\AzureBlobStorage\AzureBlobStorageAdapter;
use PhpCollective\Infrastructure\Storage\Factories\AzureFactory;
use PhpCollective\Infrastructure\Storage\Factories\Exception\FactoryConfigException;
use PhpCollective\Storage\Test\TestCase\StorageTestCase as TestCase;

/**
 * AzureFactoryTest
 */
class AzureFactoryTest extends TestCase
{
    /**
     * @return void
     */
    public function testFactory(): void
    {
        if (PHP_VERSION_ID >= 80400) {
            $this->markTestSkipped('Upstream Azure SDK emits PHP 8.4+ deprecations during adapter creation.');
        }

        $factory = new AzureFactory();
        $adapter = $factory->build([
            'accountName' => 'test',
            'apiKey' => 'test',
        ]);

        $this->assertInstanceOf(AzureBlobStorageAdapter::class, $adapter);
    }

    /**
     * @return void
     */
    public function testConnectionStringUsesPlainCredentials(): void
    {
        $factory = new class extends AzureFactory {
            public function buildConnectionStringPublic(array $config): string
            {
                return $this->buildConnectionString($config);
            }
        };

        $result = $factory->buildConnectionStringPublic([
            'accountName' => 'test-account',
            'apiKey' => 'test-key',
        ]);

        $this->assertSame(
            'DefaultEndpointsProtocol=https;AccountName=test-account;AccountKey=test-key',
            $result,
        );
    }

    /**
     * @return void
     */
    public function testMissingAccountNameExceptionMessage(): void
    {
        $factory = new class extends AzureFactory {
            public function validateConfig(array $config): void
            {
                $this->checkConfig($config);
            }
        };

        $this->expectException(FactoryConfigException::class);
        $this->expectExceptionMessage('Config key `accountName`');
        $factory->validateConfig([
            'apiKey' => 'test-key',
        ]);
    }
}
