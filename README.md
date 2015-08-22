# image-to-color-palette

[![Build Status](https://travis-ci.org/vitorbari/image-to-color-palette.svg?branch=master)](https://travis-ci.org/vitorbari/image-to-color-palette)

A PHP class that generates color palettes from images.

## Requirements
* GD Library

## Installation

First, pull in the package through Composer.

```js
"require": {
    "vitorbari/image-to-color-palette": "~1.0"
}
```

## Usage


```php
// Create new ColorPalette object
$palette = new VitorBari\ImageToColorPalette\ColorPalette();

// Set image
$palette->set_image_file('images/myimg.jpg');

// Get colors
$colors = $palette->get_palette();

// Print colors
echo "<pre>";
print_r($colors);
```

## Examples

![Example 1](examples/images/random.jpg?raw=true)

Result:
```
Array
(
    [0] => #FF00CC
    [1] => #00FF99
    [2] => #00FF66
    [3] => #00FFCC
    [4] => #99FF00
)
```

![Example 1 result](examples/images/random-result.png?raw=true)


![Example 2](examples/images/php-med-trans.png?raw=true)

Result:
```
Array
(
    [0] => #6666CC
    [1] => #FFFFFF
    [2] => #000000
    [3] => #666699
    [4] => #666666
)
```

![Example 2 result](examples/images/php-result.png?raw=true)


![Example 3](examples/images/mountains.jpg?raw=true)

Result:
```
Array
(
    [0] => #0066CC
    [1] => #003366
    [2] => #CCCCCC
    [3] => #336633
    [4] => #006699
)
```

![Example 3 result](examples/images/mountains-result.png?raw=true)


