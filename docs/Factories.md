# Factories

## Introduction

In the underlying Flysystem implementation some adapters are more or less complex to build. Sometimes you have to compose multiple objects and feed them to an adapter. The factories take this burden away from you and provide you the same interface for all adapters. Just their config array options differ.

The factories will always return new instances. Use the `StorageService`, the `AdapterCollection` or your own way of keeping a list of instances.

This package targets Flysystem v3.

## Factories

**If there are problems with the factories please create an issue ticket on Github and check the documentation of the adapter you're trying to use.**

Some SDKs like the Amazon and Azure SDK are changing more or less often and the Flysystem adapters can't keep up with them either. We recommend you to implement your own factory for it in this case if you need a quick solution.

We are simply not able due to limited resources to monitor *all* the adapters and the libs they use for changes. So please report issues and create pull requests. :)

### Amazon AWS S3 v3

https://github.com/thephpleague/flysystem-aws-s3-v3

**Options**
 * **bucket**: Name of the bucket
 * **prefix**: Prefix
 * **client**
   * **region**: Region
   * **version**: Version

### Azure

https://github.com/thephpleague/flysystem-azure-blob-storage

**Options**
 * **accountName**: Name of the account
 * **apiKey**: Your API key

This adapter currently depends on the legacy Microsoft Azure SDK through Flysystem's Azure package. If you need a newer Azure integration strategy, consider providing a custom factory.

### Dropbox

https://github.com/spatie/flysystem-dropbox

**Options**
 * **authToken**: Auth Token

### Local

**Options**
 * **root**: The root folder where the files are stored

### Memory

https://github.com/thephpleague/flysystem-memory

No options

### Null

https://flysystem.thephpleague.com/v1/docs/adapter/null-test/

No options

### WebDAV

 * https://github.com/thephpleague/flysystem-webdav
 * https://sabre.io/dav/davclient/

**Options**:
 * **baseUri**: Required
 * **userName**: Optional
 * **password**: Optional
 * **proxy**: Optional

### Zip Archive

https://github.com/thephpleague/flysystem-ziparchive

**Options**
 * **location**: Path to the archive file
 * **root**: Root path inside the archive, default ''
 * **mimeTypeDetector**: Custom mime type detector, default null
 * **visibility**: Visibility converter, default null

## Implementing your own Factory

Just implement [the FactoryInterface](../src/Factories/FactoryInterface.php).
