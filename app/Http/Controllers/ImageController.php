<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Contracts\Filesystem\Filesystem;
use League\Glide\Responses\LaravelResponseFactory;
use League\Glide\Signatures\SignatureFactory;
use League\Glide\Signatures\Signature;
use League\Glide\ServerFactory;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ImageController extends Controller
{
    /**
    * Display an resized image.
    * @see https://glide.thephpleague.com/2.0/config/integrations/laravel/#installation
    * @return \Illuminate\Http\Response
    */
    public function show(Filesystem $filesystem, Request $request, Signature $signature, string $path): StreamedResponse {
        $server = ServerFactory::create([
            'response' => new LaravelResponseFactory($request),
            'source' => $filesystem->getDriver(),
            'cache' => $filesystem->getDriver(),
            'cache_path_prefix' => '.cache',
            'base_url' => 'img',
        ]);
        
        //check if the sigature is correct
        $signature->validateRequest($request->path(), $request->all() );

        return $server->getImageResponse($path, $request->all());
    }
}
