<?php

namespace Src;

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
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
    #[ArrayShape(['base64' => "string"])]
    public function generateQrCode(string $url, int $size): array
    {
        $QROptions = new QROptions(['scale' => $size]);
        $qrCode = new QRCode($QROptions);
        $data = $qrCode->render($url);

        return [
            'base64' => $data,
        ];
    }
}