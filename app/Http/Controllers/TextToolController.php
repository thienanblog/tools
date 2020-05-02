<?php

namespace App\Http\Controllers;


class TextToolController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function convertBlankSpaceToBreakLine()
    {
        $result = '';

        if ($content = trim(request()->input('content'))) {
            $result = implode(PHP_EOL, array_map(function ($text) {
                return trim($text);
            }, array_values(array_filter(explode(' ', $content)))));
        }

        return get_frontend_view('text-tool.convert-blank-space-to-break-line', ['result' => $result]);
    }

    public function convertBreakLineToBlankSpace()
    {
        $result = '';

        if ($content = trim(request()->input('content'))) {

            $result = implode(' ', array_map(function ($text) {
                return trim($text);
            }, array_values(array_filter(explode(PHP_EOL, $content)))));
        }

        return get_frontend_view('text-tool.convert-break-line-to-blank-space', ['result' => $result]);
    }

    public function countChars() {
        $result = 0;

        // Counting characters will not trimmed anything
        if ($content = request()->input('content')) {
            $result = mb_strlen($content, 'UTF-8');
        }

        return get_frontend_view('text-tool.count-chars', ['result' => $result]);
    }

    public function convertChars() {
        $result = '';
        $mode = request()->input('mode', 'uppercase');

        // Counting characters will not trimmed anything
        if ($content = trim(request()->input('content'))) {
            switch ($mode) {
                case 'uppercase':
                    $result = mb_strtoupper($content, 'UTF-8');
                    break;
                case 'lowercase':
                    $result = mb_strtolower($content, 'UTF-8');
                    break;
                case 'capitalize':
                    $result = ucwords($content);
                    break;
            }
        }

        return get_frontend_view('text-tool.convert-chars', ['result' => $result]);
    }
}
