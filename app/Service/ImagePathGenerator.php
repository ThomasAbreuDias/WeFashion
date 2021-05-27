<?php
    namespace App\Service;

    use League\Glide\Urls\UrlBuilderFactory;
    use League\Glide\Urls\UrlBuilder;

    class ImagePathGenerator 
    {
        /**
         * @var League\Glide\Urls\UrlBuilder
         */
        protected $urlBuilder;
        
        public function __construct(string $signature) {
            $this->urlBuilder = UrlBuilderFactory::create('/img/', $signature);
            
        }
        /**
         * Generate an resize image url 
         */
        public function generate(string $path, int $width, int $height, string $fit): string {
            return $this->urlBuilder->getUrl($path, ['w'=> $width, 'h'=>$height, 'fit' => $fit]);
        }
    }