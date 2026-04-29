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

use League\Flysystem\AzureBlobStorage\AzureBlobStorageAdapter;
use League\Flysystem\FilesystemAdapter;
use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use PhpCollective\Infrastructure\Storage\Factories\Exception\FactoryConfigException;

/**
 * Azure Factory
 *
 * Be aware that this adapter seems to have some problems!
 *
 * @link https://github.com/thephpleague/flysystem-azure/issues/22
 * @link https://github.com/thephpleague/flysystem-azure/issues/15
 */
class AzureFactory extends AbstractFactory
{
    protected string $alias = 'azure';

    protected string $package = 'league/flysystem-azure-blob-storage';

    protected string $className = AzureBlobStorageAdapter::class;

    protected string $endpoint = 'DefaultEndpointsProtocol=https;AccountName=%s;AccountKey=%s';

    /**
     * @inheritDoc
     */
    public function build(array $config): FilesystemAdapter
    {
        $this->availabilityCheck();
        $this->checkConfig($config);

        $client = $this->createBlobService(
            $this->buildConnectionString($config),
        );

        return new AzureBlobStorageAdapter($client, $config['accountName']);
    }

    /**
     * @param array<string, mixed> $config
     *
     * @return string
     */
    protected function buildConnectionString(array $config): string
    {
        return sprintf(
            $this->endpoint,
            $config['accountName'],
            $config['apiKey'],
        );
    }

    /**
     * @param string $connectionString
     *
     * @return \MicrosoftAzure\Storage\Blob\BlobRestProxy
     */
    protected function createBlobService(string $connectionString): BlobRestProxy
    {
        return BlobRestProxy::createBlobService($connectionString);
    }

    /**
     * @param array<string, mixed> $config
     *
     * @throws \PhpCollective\Infrastructure\Storage\Factories\Exception\FactoryConfigException
     *
     * @return void
     */
    protected function checkConfig(array $config): void
    {
        if (empty($config['accountName'])) {
            throw FactoryConfigException::withMissingKey('accountName', $this);
        }

        if (empty($config['apiKey'])) {
            throw FactoryConfigException::withMissingKey('apiKey', $this);
        }
    }
}
