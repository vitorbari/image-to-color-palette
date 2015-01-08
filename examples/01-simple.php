<?php
/**
 * ImageToColorPalette
 * @version 0.1, 2013-07-12
 *
 *
 * This file demonstrates the simpliest way to use the class.
 * It sets a image, gets the color palette as a array and print it.
 *
 */

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

/** Include ImageToColorPalette */
include '../ImageToColorPalette.php';
include '../helpers.php';

try 
{
    // Create new ColorPalette object
    $Palette = new ColorPalette();

    // Set image
    $Palette->set_image_file('images/random.jpg');

    // Get colors
    $colors = $Palette->get_palette();

    // Show image
    echo "<img src='images/random.jpg'>";

    // Print colors
    echo "<pre>";
    print_r($colors);

    // Generate a table
    echo colors_table($colors);

} 
catch (Exception $e) 
{
    echo $e->getMessage();
}
