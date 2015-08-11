# urlparser

Url Parser - simple url parser implementation

Example of usage:

```php
        $correctUrl = 'http://andrey@example.com:80/test?query';
        $urlParser = new UrlParser($this->correctUrl);
        $protocol = $urlParser->getProtocol();
```

To run tests just run:

```
       make test
```