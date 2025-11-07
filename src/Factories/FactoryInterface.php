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

use League\Flysystem\FilesystemAdapter;

/**
 * Factory Interface
 */
interface FactoryInterface
{
    /**
     * @return string
     */
    public function className(): string;

    /**
     * @return string
     */
    public function alias(): string;

    /**
     * @param array<string, mixed> $config
     *
     * @return \League\Flysystem\FilesystemAdapter
     */
    public function build(array $config): FilesystemAdapter;

    /**
     * @return void
     */
    public function availabilityCheck(): void;
}
