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

namespace PhpCollective\Infrastructure\Storage\Factories\Exception;

use PhpCollective\Infrastructure\Storage\Factories\FactoryInterface;

/**
 * FactoryConfigException
 */
class FactoryConfigException extends FactoryException
{
    /**
     * @param string $key
     * @param \PhpCollective\Infrastructure\Storage\Factories\FactoryInterface $factory
     *
     * @return self
     */
    public static function withMissingKey(string $key, FactoryInterface $factory): self
    {
        return new self(sprintf(
            'Config key `%s` for `%s` is empty or missing',
            $key,
            get_class($factory),
        ));
    }
}
