<?php

namespace App\Http\Controllers;


class EncryptToolController extends Controller
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

    public function convertTextToBase64()
    {
        $result = '';

        if ($content = request()->input('content')) {
            $result = base64_encode($content);
        }

        return get_frontend_view('encrypt-tool.text-to-base64', ['result' => $result]);
    }

    public function convertBase64ToText()
    {
        $result = '';

        if ($content = request()->input('content')) {
            $result = base64_decode($content);
        }

        return get_frontend_view('encrypt-tool.base64-to-text', ['result' => $result]);
    }

    public function convertTextToHex()
    {
        $result = '';

        if ($content = request()->input('content')) {
            $result = bin2hex($content);
        }

        return get_frontend_view('encrypt-tool.text-to-hex', ['result' => $result]);
    }

    public function convertHexToText()
    {
        $result = '';

        if ($content = request()->input('content')) {
            $result = hex2bin($content);
        }

        return get_frontend_view('encrypt-tool.hex-to-text', ['result' => $result]);
    }


}
