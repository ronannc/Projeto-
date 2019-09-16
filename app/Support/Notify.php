<?php

namespace App\Support;

abstract class Notify
{
    const ERROR_MESSAGE = 'Ocorreu um erro. Não se preocupe, a equipe já foi informada sobre o ocorrido';

    public static function response($title, $message, $color = 'info', $url = '#')
    {
        return [
            'title'   => $title,
            'message' => $message,
            'color'   => $color,
            'url'     => $url
        ];
    }

    public static function log(\Exception $exception)
    {
        $message = 'File:' . $exception->getFile() . PHP_EOL;
        $message .= 'Line:' . $exception->getLine() . PHP_EOL;
        $message .= 'Message:' . $exception->getMessage() . PHP_EOL;
        $message .= 'Stacktrace:' . PHP_EOL;
        $message .= $exception->getTraceAsString();

        return $message;
    }
}