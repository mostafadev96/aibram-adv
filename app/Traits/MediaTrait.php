<?php


namespace App\Traits;

use Optix\Media\HasMedia;

trait MediaTrait
{
    use HasMedia;

    public $mainImageCollection = 'main';

    public $secondaryImagesCollection ='secondary';

    public function getMainImage(){
        return !empty($this->getFirstMediaUrl($this->mainImageCollection)) ? $this->getFirstMediaUrl($this->mainImageCollection) : asset('600.png');
    }
    public function getSecondaryImages(){
        return $this->getMedia($this->secondaryImagesCollection)
                    ->map(fn($media, $key) => $media->getUrl(''));
    }
}