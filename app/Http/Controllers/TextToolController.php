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

    }
}
