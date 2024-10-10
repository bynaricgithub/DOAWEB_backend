<?php

use Illuminate\Support\Facades\Config;

function en($data)
{
    $apiTest = Config::get('constants.APITEST');
    if ($apiTest == 1) {
        return '' . $data . '';
    }

    if ($data == null) {
        return '';
    }
    $uuid = strtoupper(genUUID());
    $key = hex2bin(Config::get('constants.ID1'));
    if ($uuid) {
        $iv = hex2bin($uuid);
    } else {
        $iv = hex2bin(Config::get('constants.ID2'));
    }
    $text = $data;
    $encrypted = openssl_encrypt($text, 'AES-128-CBC', $key, null, $iv);
    $encrypted = urlencode(base64_encode(trim($encrypted) . '' . $uuid));

    return $encrypted;
}

function de($data)
{
    $apiTest = Config::get('constants.APITEST');
    if ($apiTest == 1) {
        return '' . $data . '';
    }

    $data = base64_decode(urldecode($data));
    $uuid = substr($data, -32);
    $data = substr($data, 0, strpos($data, $uuid));

    if ($data == null) {
        return '';
    }

    $key = hex2bin(Config::get('constants.ID1'));
    if ($uuid) {
        $iv = hex2bin($uuid);
    } else {
        $iv = hex2bin(Config::get('constants.ID2'));
    }
    $encrypted = $data;
    $decrypted = openssl_decrypt($encrypted, 'AES-128-CBC', $key, OPENSSL_ZERO_PADDING, $iv);
    $decrypted = trim($decrypted);

    return $decrypted;
}

function genUUID($length = 16)
{
    if (!isset($length) || intval($length) <= 8) {
        $length = 16;
    }
    if (function_exists('random_bytes')) {
        return bin2hex(random_bytes($length));
    }
    if (function_exists('mcrypt_create_iv')) {
        return bin2hex(mcrypt_create_iv($length, MCRYPT_DEV_URANDOM));
    }
    if (function_exists('openssl_random_pseudo_bytes')) {
        return bin2hex(openssl_random_pseudo_bytes($length));
    }
}

function getIp()
{
    foreach (['HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR'] as $key) {
        if (array_key_exists($key, $_SERVER) === true) {
            foreach (explode(',', $_SERVER[$key]) as $ip) {
                $ip = trim($ip);
                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                    return $ip;
                }
            }
        }
    }

    return request()->ip();
}
