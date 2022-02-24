<?php

namespace App\View\Components;

use App\Models\Picture as PictureModel;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Picture extends Component
{
    public $img;
    public $sourceArr = [];
    public $title = 'Bez obrázka!';
    public $alt = 'Obrázok neexistuje!';
    public $url = 'http://via.placeholder.com/450x200';
    public $source = 'Obrázok neexistuje!';
    public $author = null;

    public function __construct(
        public int $columns = 4,
        public string $arrival = "left",
        public string $sourceSmall = "false",
        public string $titleSlug,
    ) {
        $this->img = PictureModel::whereSlug($titleSlug)->with('media')->first();

        if(isset($this->img)) {
            $this->url = $this->img->getFirstMediaUrl($this->img->media[0]->collection_name);
            $this->alt = $this->img->description;
            $this->title = $this->img->title;
            $this->sourceArr = [
                'source'      => $this->img->source,
                'source_url'  => $this->img->source_url,
                'author'      => $this->img->author,
                'author_url'  => $this->img->author_url,
                'license'     => $this->img->license,
                'license_url' => $this->img->license_url,
            ];
        }
    }

    public function render(): View {
        return view('components.picture.index');
    }
}
