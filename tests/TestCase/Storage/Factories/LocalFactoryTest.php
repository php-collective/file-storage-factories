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

use League\Flysystem\Local\LocalFilesystemAdapter;
use PhpCollective\Infrastructure\Storage\Factories\LocalFactory;
use PhpCollective\Storage\Test\TestCase\StorageTestCase as TestCase;

/**
 * LocalFactoryTest
 */
class LocalFactoryTest extends TestCase
{
    /**
     * @return void
     */
    public function testFactory(): void
    {
        $factory = new LocalFactory();
        $adapter = $factory->build([
            'root' => sys_get_temp_dir(),
        ]);
        $this->assertInstanceOf(LocalFilesystemAdapter::class, $adapter);
    }
}
