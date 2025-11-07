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

use Aws\S3\S3Client;
use League\Flysystem\AwsS3V3\AwsS3V3Adapter;

/**
 * AwsS3Factory
 */
class AwsS3v3Factory extends AbstractFactory
{
    protected string $alias = 's3';

    protected string $package = 'league/flysystem-aws-s3-v3';

    protected string $className = AwsS3V3Adapter::class;

    protected array $defaults = [
        'bucket' => '',
        'prefix' => '',
        'client' => [
            'region' => 'eu',
            'version' => '2006-03-01',
        ],
    ];

    /**
     * @inheritDoc
     */
    public function build(array $config): AwsS3V3Adapter
    {
        $this->availabilityCheck();
        $config += $this->defaults;

        return new AwsS3V3Adapter(
            S3Client::factory(
                $config['client'],
            ),
            $config['bucket'],
            $config['prefix'],
        );
    }
}
