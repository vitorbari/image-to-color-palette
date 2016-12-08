<?php

use VitorBari\ImageToColorPalette\ColorPalette;

class ImageToColorPaletteTest extends PHPUnit_Framework_TestCase
{
    protected $img;

    public function setUp()
    {
        $this->img = new ColorPalette();
    }

    /** @test */
    public function it_sets_number_of_colors()
    {
        $colors = 3;

        $this->img->set_number_of_colors($colors);

        $this->assertEquals($colors, $this->img->get_number_of_colors());
    }

    /** @test */
    public function it_sets_granularity()
    {
        $granularity = 10;

        $this->img->set_granularity($granularity);

        $this->assertEquals($granularity, $this->img->get_granularity());
    }

    /** @test */
    public function it_sets_image_file()
    {
        $img = './examples/images/random.jpg';

        $this->img->set_image_file($img);

        $this->assertEquals($img, $this->img->get_image_file());
    }

    /** @test */
    public function it_gets_color_palette_from_image()
    {
        $img = './examples/images/random.jpg';

        $this->img->set_image_file($img);

        $palette = $this->img->get_palette();

        $this->assertNotEmpty($palette);
    }
}
