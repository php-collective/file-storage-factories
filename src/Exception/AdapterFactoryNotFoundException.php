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

namespace PhpCollective\Infrastructure\Storage\Exception;

/**
 * AdapterNotSupportedException
 */
class AdapterFactoryNotFoundException extends StorageException
{
    /**
     * @param string $name Name
     *
     * @return self
     */
    public static function fromName(string $name): self
    {
        return new self(sprintf(
            'Adapter factory `%s` was not found',
            $name,
        ));
    }
}
