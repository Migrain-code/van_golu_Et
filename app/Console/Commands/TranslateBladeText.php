<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class TranslateBladeText extends Command
{
    protected $signature = 'translate:blade-text';
    protected $description = 'Tüm Blade dosyalarındaki düzgün metinleri bulup dil dosyasına ekler';

    public function handle()
    {
        $viewPath = resource_path('views/frontend');
        $langFilePath = resource_path('lang/tr.json');
        $translations = [];

        // JSON dosyası varsa içeriği al
        if (File::exists($langFilePath)) {
            $translations = json_decode(File::get($langFilePath), true);
        }

        // Tüm Blade dosyalarını tara
        $bladeFiles = File::allFiles($viewPath);
        foreach ($bladeFiles as $file) {
            $content = File::get($file->getPathname());

            // Düzgün metinleri bul (örneğin sadece harfler ve boşluklardan oluşan)
            preg_match_all('/>([a-zA-ZĞÜŞİÖÇğüşiöç\s]+)</u', $content, $matches);

            foreach ($matches[1] as $text) {
                $text = trim($text);

                // Metin zaten çevrilmişse veya boşsa atla
                if (isset($translations[$text]) || empty($text)) {
                    continue;
                }

                // Metni __() fonksiyonuyla sar
                $content = str_replace(">{$text}<", ">{{ __('{$text}') }}<", $content);

                // Yeni çeviri metnini boş değerle ekle
                $translations[$text] = '';
                $this->info("Çeviriye eklendi: {$text}");
            }

            // Güncellenmiş içeriği Blade dosyasına yaz
            File::put($file->getPathname(), $content);
        }

        // Güncellenmiş JSON çevirilerini kaydet
        File::put($langFilePath, json_encode($translations, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        $this->info('Tüm metinler dil dosyasına eklendi ve Blade dosyaları güncellendi.');
    }
}
