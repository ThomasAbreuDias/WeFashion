<?php

/**
 * shortcut function to resize an image
 */
function image(string $path, int $width, int $height, string $fit = 'crop'): string { 
    return app(\App\Service\ImagePathGenerator::class)->generate($path, $width, $height, $fit);
}

/**
 *  Return true if the url is admin side
 * @return bool
 */
function isBack(): bool { 
    return strpos(Request::url(), \App\Providers\RouteServiceProvider::HOME) !== false;
}