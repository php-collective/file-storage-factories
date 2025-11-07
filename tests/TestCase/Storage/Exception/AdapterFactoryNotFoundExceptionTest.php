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

namespace PhpCollective\Storage\Test\TestCase\Storage\Exception;

use PhpCollective\Infrastructure\Storage\Exception\AdapterFactoryNotFoundException;
use PhpCollective\Storage\Test\TestCase\StorageTestCase as TestCase;

/**
 * AdapterFactoryNotFoundExceptionTest
 */
class AdapterFactoryNotFoundExceptionTest extends TestCase
{
    /**
     * @return void
     */
    public function testException(): void
    {
        $exception = AdapterFactoryNotFoundException::fromName('FooFactory');

        $this->assertEquals('Adapter factory `FooFactory` was not found', $exception->getMessage());
    }
}
