# Kint Debug

Add [Kint](http://raveren.github.io/kint/) debugging tools to a Concrete5 website.
> Kint is a tool designed to present your debugging data in the absolutely best way possible.

__Disclaimer :__ I am not the developer of Kint, see [Kint documentation](http://raveren.github.io/kint/#intro) for more informations.


### Usage

The use of Kint is described in the [official documentation](http://raveren.github.io/kint/#intro).

__For example :__

```php
d($this->getRelativePath());
d($_SERVER);
```

__Output :__  
![debug_kit](https://cloud.githubusercontent.com/assets/6225979/8916186/1b152936-34aa-11e5-968e-7a79075ac559.png)


Note that Kint will be disabled if `concrete.debug.display_errors` is `false`.

> ![error](https://cloud.githubusercontent.com/assets/6225979/9530544/c7e4d7d8-4d00-11e5-8b98-069c4b655c74.png)

If you want to manually enable/disable Kint, you can use :

```php
<?php
// Enable Kint
\Kint::enabled(true);

// Disable Kint
\Kint::enabled(false);
```
