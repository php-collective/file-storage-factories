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

use League\Flysystem\FilesystemAdapter;
use League\Flysystem\WebDAV\WebDAVAdapter;
use Sabre\DAV\Client;

/**
 * WebDavFactory
 */
class WebDavFactory extends AbstractFactory
{
    protected string $alias = 'webdav';

    protected string $package = 'league/flysystem-webdav';

    protected string $className = WebDAVAdapter::class;

    protected array $defaults = [
        'baseUri' => '',
        'userName' => '',
        'password' => '',
        'proxy' => '',
    ];

    /**
     * @inheritDoc
     */
    public function build(array $config): FilesystemAdapter
    {
        return new WebDAVAdapter(new Client($config));
    }
}
