<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Language extends Model
{
    use HasFactory;
    protected $casts = ["translations" => "array"];

    public function writeLanguageFile()
    {
        $langFilePath = resource_path("lang/{$this->code}.json");

        // Dosya veya dizin yoksa, oluştur
        if (!file_exists($langFilePath)) {
            // Dizin yoksa oluştur
            if (!is_dir(dirname($langFilePath))) {
                mkdir(dirname($langFilePath), 0755, true);
            }

            // Dosyayı oluştur
            touch($langFilePath);
        }

        // JSON dosyasını güncelle
        File::put($langFilePath, json_encode($this->translations, JSON_PRETTY_PRINT));
    }

}
