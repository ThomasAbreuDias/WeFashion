<?php

/**
 * shortcut function to resize an image
 */
function image(string $path, int $width, int $height): string {
    return app(\App\Service\ImagePathGenerator::class)->generate($path, $width, $height);
}