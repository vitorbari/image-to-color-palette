<?php

namespace VitorBari\ImageToColorPalette;

use Exception;

/**
 * ColorPalette.
 *
 * @category   ColorPalette
 *
 * @version    0.1, 2013-07-12
 */
class ColorPalette
{
    /**
     * Image file.
     *
     * @var string
     */
    private $image_file = null;

    /**
     * Number of colors in the palette.
     *
     * @var int
     */
    private $number_of_colors = 5;

    /**
     * Granularity.
     *
     * @var int
     */
    private $granularity = 5;

    /**
     * Palette colors.
     *
     * @var array
     */
    private $colors = [];

    /* Public Methods */

    /**
     * Create a new ColorPalette.
     *
     * @throws Exception
     */
    public function __construct()
    {
        if (!$this->_is_gd_enabled()) {
            throw new Exception('It looks like GD is not installed');
        }
    }

    /**
     * Set Image file.
     *
     * @param string $image_file
     *
     * @throws Exception
     */
    public function set_image_file($image_file = '')
    {
        if (!file_exists($image_file)) {
            throw new Exception("Image '{$image_file}' not found");
        }

        $this->image_file = $image_file;
    }

    public function get_image_file()
    {
        return $this->image_file;
    }

    public function set_number_of_colors($number_of_colors = 0)
    {
        if (!is_int($number_of_colors)) {
            throw new Exception('Number of this->colors must be numeric');
        }

        $this->number_of_colors = $number_of_colors;
    }

    public function get_number_of_colors()
    {
        return $this->number_of_colors;
    }

    public function set_granularity($granularity = 0)
    {
        if (!is_int($granularity)) {
            throw new Exception('Granularity must be numeric');
        }

        $this->granularity = $granularity;
    }

    public function get_granularity()
    {
        return $this->granularity;
    }

    public function get_palette()
    {
        return $this->_get_palette();
    }

    /*
        ==================
        Private Methods
        ==================
    */

    private function _get_palette()
    {
        $image_size = getimagesize($this->image_file);

        if ($image_size === false) {
            throw new Exception('Unable to get image image_size data');
        }

        if ($image_size[2] == 1) {
            $img = imagecreatefromgif($this->image_file);
        } elseif ($image_size[2] == 2) {
            $img = imagecreatefromjpeg($this->image_file);
        } elseif ($image_size[2] == 3) {
            $img = imagecreatefrompng($this->image_file);
        }

        if ($img === false) {
            throw new Exception('Unable to open image file');
        }

        for ($x = 0; $x < $image_size[0]; $x += $this->granularity) {
            for ($y = 0; $y < $image_size[1]; $y += $this->granularity) {
                $this_color = imagecolorat($img, $x, $y);
                $rgb = imagecolorsforindex($img, $this_color);
                $red = round(round(($rgb['red'] / 0x33)) * 0x33);
                $green = round(round(($rgb['green'] / 0x33)) * 0x33);
                $blue = round(round(($rgb['blue'] / 0x33)) * 0x33);
                $this_Rgb = sprintf('#%02X%02X%02X', $red, $green, $blue);

                if (array_key_exists($this_Rgb, $this->colors)) {
                    $this->colors[$this_Rgb]++;
                } else {
                    $this->colors[$this_Rgb] = 1;
                }
            }
        }

        arsort($this->colors);

        return array_slice(array_keys($this->colors), 0, $this->number_of_colors);
    }

    private function _is_gd_enabled()
    {
        return extension_loaded('gd') && function_exists('gd_info');
    }
}
