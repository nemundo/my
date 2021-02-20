### Dev Installation
```
git submodule add https://github.com/nemundo/html.git lib/html
```

```
$lib = new Library($autoload);
$lib->source = __DIR__ . '/lib/html/src/';
$lib->namespace = 'Nemundo\\Html';
```