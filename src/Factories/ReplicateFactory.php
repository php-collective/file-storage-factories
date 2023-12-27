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

use League\Flysystem\AdapterInterface;
use League\Flysystem\Replicate\ReplicateAdapter;
use PhpCollective\Infrastructure\Storage\Exception\PackageRequiredException;
use PhpCollective\Infrastructure\Storage\Factories\Exception\FactoryException;

/**
 * ReplicateFactory
 */
class ReplicateFactory extends AbstractFactory
{
    protected string $alias = 'replicate';

    protected string $package = 'league/flysystem-replicate-adapter';

    protected string $className = ReplicateAdapter::class;

    /**
     * @inheritDoc
     *
     * @throws \PhpCollective\Infrastructure\Storage\Exception\PackageRequiredException
     * @throws \PhpCollective\Infrastructure\Storage\Factories\Exception\FactoryException
     */
    public function build(array $config): AdapterInterface
    {
        if (!class_exists(ReplicateAdapter::class)) {
            throw PackageRequiredException::fromAdapterAndPackageNames(
                'replicate',
                'league/flysystem-replicate-adapter',
            );
        }

        if (!isset($config['source']) || !isset($config['target'])) {
            throw new FactoryException(
                'You must configure `source` and `target`',
            );
        }

        return new ReplicateAdapter(
            $config['source'],
            $config['target'],
        );
    }
}
