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
$palette->set_image_file('images/random.jpg');

// Get colors
$colors = $palette->get_palette();

// Print colors
echo "<pre>";
print_r($colors);
```