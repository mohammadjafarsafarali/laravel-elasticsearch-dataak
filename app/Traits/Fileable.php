<?php

namespace App\Traits;

use App\Models\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

trait Fileable
{
    /**
     * @param array $urls
     * @param Model $model
     * @author mj.safarali
     */
    public function attachFiles(array $urls, Model $model): void
    {
        $files = [];
        foreach ($urls as $url) {
            array_push($files, new File([
                'url' => $url,
                'extension' => Arr::last(explode('.', $url)),
            ]));
        }

        $model->gallery()->saveMany($files);
    }
}
