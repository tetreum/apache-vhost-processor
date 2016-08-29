# apache-vhost-processor
Apache VirtualHost files processor (in PHP)

Begin used at https://github.com/tetreum/vhostmanager


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