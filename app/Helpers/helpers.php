<?php

//= GLOBAL
use Illuminate\Config\Repository;
use Illuminate\Contracts\View\Factory;

function is_debug()
{
    return get_system_config('APP_DEBUG', false);
}

function is_dev_env($env)
{
    return $env === get_system_config('DEBUG_ENVIRONMENT', 'webpack');
}

/**
 * Lấy config từ file app/configs/system.php
 * @param  null  $key
 * @param  null  $default
 * @return Repository|mixed
 */
function get_system_config($key = null, $default = null)
{
    return config("system.{$key}", $default);
}

function get_theme_configs() {
    return include(get_frontend_view('theme-configs')->getPath());
}

function get_theme_config($key = null, $default = null) {
    $configs = get_theme_configs();

    // Có thể dùng khóa key như company_info.name.full_name (Tương ứng các Array con bên trong)
    $extractedArr = explode('.', $key);

    if (count($extractedArr) > 1) {
        foreach ($extractedArr as $arrKey) {
            if (isset( $configs[$arrKey])) {
                $configs =  $configs[$arrKey];
            } else {
                return $default;
            }
        }
    }

    return $configs[$key] ?? $default;
}

//= ADMIN

/**
 * Trả về View
 * @param  null  $view
 * @param  array  $data
 * @param  array  $mergeData
 * @return Factory|\Illuminate\View\View
 */
function get_admin_view($view = null, $data = [], $mergeData = [])
{
    $folder = get_system_config('admin_view_folder', 'default');
    return view("admin.{$folder}.$view", $data, $mergeData);
}

/**
 * Trả về đường dẫn tới View
 * @param $view
 * @return string
 */
function get_admin_view_path($view)
{
    $folder = get_system_config('admin_view_folder', 'default');
    return "admin.{$folder}.$view";
}

/**
 * Đường dẫn tới thư mục Admin Theme
 * @param $url
 * @param $version
 * @return string
 */
function get_admin_asset($url, $version = null, $placeholder = null)
{
    $version = get_option('admin_asset_version', '1.0.0');
    $folder = get_system_config('admin_asset_folder', 'default');

    if (is_debug() && is_dev_env('webpack')) {
        return "https://localhost:8081/" . trim($url, '/');
    }

    if ($placeholder) {
        $url = $placeholder;
    }

    return asset("themes/admin/$folder/$url?v=$version");
}


//= FRONTEND

/**
 * Đuồng dẫn tới thư mục View
 * @param  null  $view
 * @param  array  $data
 * @param  array  $mergeData
 * @return Factory|\Illuminate\View\View
 */
function get_frontend_view($view = null, $data = [], $mergeData = [])
{
    $folder = get_system_config('frontend_view_folder');
    return view("frontend.{$folder}.$view", $data, $mergeData);
}

/**
 * Trả về đường dẫn tới View
 * @param $view
 * @return string
 */
function get_frontend_view_path($view)
{
    $folder = get_system_config('frontend_view_folder', 'default');
    return "frontend.{$folder}.$view";
}


/**
 * Đường dẫn tới thư mục Theme
 * @param $url
 */
function get_frontend_asset($url, $version = null, $placeholder = null)
{
    $version = get_system_config('frontend_asset_version', '1.0.0');
    $folder = get_system_config('frontend_asset_folder', 'default');

    if (is_debug() && is_dev_env('webpack')) {
        return "https://localhost:8080/$url";
    }

    if ($placeholder) {
        $url = $placeholder;
    }
    return url("themes/frontend/$folder/$url?v=$version");
}


function response_array($arr)
{
    return $arr;
}


if (!function_exists('get_currency')) {
    /**
     * Hiển thị thông tin tiền tệ
     * @param $price
     * @param bool $right
     * @return string
     */
    function get_currency($price, $right = true)
    {
        $config = get_system_config('currency');
        if ($right) {
            return number_format($price, $config['decimals'], $config['dec_point'], $config['thousands_sep']) . ' ' . $config['symbol'];
        } else {
            return $config['symbol'] . number_format($price, $config['decimals'], $config['dec_point'], $config['thousands_sep']);
        }
    }
}

if (!function_exists('generate_alt_id')) {
    /**
     * Dựa vào thời gian để tạo ra ID độc nhất
     * @param $id
     *
     * @return string
     */
    function generate_alt_id($id = null)
    {
        $id = $id . rand(12322, 898394);
        $timestamp = round(microtime(true) * 1000);
        $fragment_1 = substr($timestamp, -3);
        $fragment_2 = substr($timestamp, -6, 3);

        $altId = date('Ymd');
        $case = rand(1, 3);

        switch ($case) {
            case 1:
                $altId .= "{$id}{$fragment_1}{$fragment_2}";
                break;
            case 2:
                $altId .= "{$fragment_1}{$id}{$fragment_2}";
                break;
            case 3:
                $altId .= "{$fragment_1}{$fragment_2}{$id}";
                break;
        }

        return $altId;
    }
}

if (!function_exists('get_option')) {
    function get_option($key, $default = null) {
        // Có thể dùng khóa key như company_info.name.full_name (Tương ứng các Array con bên trong)
        $extractedArr = explode('.', $key);

        if ($option = \App\Models\Option::getOption($extractedArr[0])) {
            $jsonDecode = json_decode($option->value, true);

            if (json_last_error() === JSON_ERROR_NONE) {
                // Khi tồn tại khóa dạng tìm Array con thì sẽ thực hiện
                if (count($extractedArr) > 1) {
                    unset($extractedArr[0]);

                    foreach ($extractedArr as $arrKey) {
                        if (isset( $jsonDecode[$arrKey])) {
                            $jsonDecode =  $jsonDecode[$arrKey];
                        } else {
                            return $default;
                        }
                    }
                }

                return $jsonDecode;
            }

            if ($option->value) {
                return $option->value;
            }
        }

        return $default;
    }
}

