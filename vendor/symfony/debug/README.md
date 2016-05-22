Debug Component
===============

<<<<<<< Updated upstream
Debug provides tools to make debugging easier.

Enabling all debug tools is as easy as calling the `enable()` method on the
main `Debug` class:

```php
use Symfony\Component\Debug\Debug;

Debug::enable();
```

You can also use the tools individually:

```php
use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

if ('cli' !== php_sapi_name()) {
    ini_set('display_errors', 0);
    ExceptionHandler::register();
} elseif (!ini_get('log_errors') || ini_get('error_log')) {
    ini_set('display_errors', 1);
}
ErrorHandler::register();
```

Note that the `Debug::enable()` call also registers the debug class loader
from the Symfony ClassLoader component when available.

This component can optionally take advantage of the features of the HttpKernel
and HttpFoundation components.
=======
The Debug component provides tools to ease debugging PHP code.
>>>>>>> Stashed changes

Resources
---------

  * [Documentation](https://symfony.com/doc/current/components/debug/index.html)
  * [Contributing](https://symfony.com/doc/current/contributing/index.html)
  * [Report issues](https://github.com/symfony/symfony/issues) and
    [send Pull Requests](https://github.com/symfony/symfony/pulls)
    in the [main Symfony repository](https://github.com/symfony/symfony)
