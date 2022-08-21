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

        return [
            'base64' => $data,
        ];
    }
}