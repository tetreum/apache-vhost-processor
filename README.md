# apache-vhost-processor  [![License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat)](LICENSE)
Apache VirtualHost files processor (in PHP)

Begin used at https://github.com/tetreum/vhostmanager

#### Install

    composer require tetreum/apache-vhost-processor "dev-master"

#### Example
```php
require "vendor/autoload.php";

use Apache\Config\VirtualHost;
use Apache\Config\Directive;
use Apache\Config\Directory;

$vhost = new VirtualHost("*", 80);

$vhost->addDirective(new Directive("DocumentRoot", "/var/www/mongo/current/htdocs"));
$vhost->addDirective(new Directive("ServerName", "mongo.dev"));
$vhost->addDirective(new Directive("ServerAdmin", "bill@mongo.dev"));

$directory = new Directory("/api");
$directory->addDirective(new Directive("DocumentRoot", "/var/www/mongo/current/api"));
$vhost->addDirectory($directory);

print_r($vhost->toString());

```

Output:
```
<VirtualHost *:80>
    DocumentRoot /var/www/mongo/current/htdocs
    ServerName mongo.dev
    ServerAdmin bill@mongo.dev

    <Directory /api>
        DocumentRoot /var/www/mongo/current/api
    </Directory>

</VirtualHost>
```
