# Storage Factories for Flysystem

[![CI](https://img.shields.io/github/actions/workflow/status/php-collective/file-storage-factories/ci.yml?branch=master&style=flat-square)](https://github.com/php-collective/file-storage-factories/actions)
[![Coverage](https://codecov.io/gh/php-collective/file-storage-factories/branch/master/graph/badge.svg)](https://codecov.io/gh/php-collective/file-storage-factories)
[![Latest Stable Version](https://img.shields.io/packagist/v/php-collective/file-storage-factories?style=flat-square)](https://packagist.org/packages/php-collective/file-storage-factories)
[![Total Downloads](https://img.shields.io/packagist/dt/php-collective/file-storage-factories?style=flat-square)](https://packagist.org/packages/php-collective/file-storage-factories)
[![PHPStan](https://img.shields.io/badge/PHPStan-level%208-brightgreen.svg?style=flat-square)](https://phpstan.org/)
[![PHP Version](https://img.shields.io/badge/php-%3E%3D8.1-8892BF.svg?style=flat-square)](https://php.net)
[![Software License](https://img.shields.io/badge/license-MIT-green.svg?style=flat-square)](LICENSE)

In the underlying Flysystem implementation some adapters are more or less complex to build. Sometimes you have to compose multiple objects and feed them to an adapter. The factories take this burden away from you and provide you the same interface for all adapters. Just their config array options differ.

## Documentation

 * [Installation](docs/Installation.md)
 * [Factories](docs/Factories.md)

## Support

For bugs and feature requests, please use the [issues](https://github.com/php-collective/file-storage-factories/issues) section of this repository.
