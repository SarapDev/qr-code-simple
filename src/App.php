<?php
declare(strict_types=1);
namespace Src;

/**
 * Класс отвечающий за запуск инстанс приложения
 */
class App
{
    /**
     * Метод запуска приложения
     *
     * @return void
     * @throws \Exception
     */
    public function startApp(): void
    {
        if ($_SERVER['REQUEST_URI'] === '/generate' && $_POST) {
            $generator = new QRGenerator();
            echo json_encode($generator->generateQrCode($_POST['url'], (int) $_POST['size']));
        } else {
            require 'form.html';
        }
    }
}