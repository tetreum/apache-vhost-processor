# apache-vhost-processor  [![License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat)](LICENSE)
Apache VirtualHost files processor (in PHP)

Begin used at https://github.com/tetreum/vhostmanager

#### Install

    composer require tetreum/apache-vhost-processor "dev-master"

#### Example
```php
$vhost = new VirtualHost("mongo.dev", 80);

$vhost->addDirective(new Directive("DocumentRoot", "/var/www/mongo/current/htdocs"));

$directory = new Directory("/api");
$directory->addDirective(new Directive("DocumentRoot", "/var/www/mongo/current/api"));
$vhost->addDirectory($directory);

p(htmlspecialchars($vhost->toString()));
```

Output:
```

```
