<?php

namespace App\Providers;

use App\Service\ImagePathGenerator;
use Illuminate\Support\ServiceProvider;
use League\Glide\Signatures\SignatureFactory;
use League\Glide\Signatures\Signature;


class GlideProvider extends ServiceProvider
{
    /**
     * /!\ Make sure GLIDE_KEY is define /!\
     * Register ImagePathGenerator to use secure resize image url.
     * @see https://glide.thephpleague.com/2.0/config/security/
     *
     * @return void
     */
    public function register() {
        $this->app->singleton(ImagePathGenerator::class, function () {
            return new ImagePathGenerator(env('GLIDE_KEY'));
        });
        
        $this->app->singleton(Signature::class, function () {
            return new Signature(env('GLIDE_KEY'));
        });
    }
}