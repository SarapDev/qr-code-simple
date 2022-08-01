<?php

namespace Src;

use chillerlan\QRCode\QRCode;
use JetBrains\PhpStorm\ArrayShape;

/**
 * Класс отвечающий за генерацию QR кодов
 */
class QRGenerator
{
    /**
     * Метод, который генерирует qr изображение и возвращает ссылку на него
     *
     * @param string $url
     * @return string[]
     */
    #[ArrayShape(['url' => "string"])]
    public function generateQrCode(string $url): array
    {
        $qrCode = new QRCode();
        $data = $qrCode->render($url);

        list($type, $data) = explode(';', $data);
        list(,$data) = explode(',', $data);

        $data = base64_decode($data);

        $fileExt = explode('/', $type)[1];
        $fileName = 'tmp/code_' . time() . '.' . $fileExt;

        file_put_contents($fileName, $data);

        return [
            'url' => "http://" . $_SERVER['HTTP_HOST'] . '/' . $fileName
        ];
    }
}