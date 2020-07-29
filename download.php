<?php
ob_end_clean();
ob_implicit_flush(1);

set_time_limit(0);
@header("Content-Type:video/mp4");
$url = 'https://micupyun.wonderit.cn/mic-api/files/2020/07/22/1595395169GRUuAu8I.mp4';
$ch = curl_init();
$count = 0;
$callback = function ($ch, $str) {
    global $count;

    if(($count++)==0) header("Content-Length: ".curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD)."");
    echo $str;
//    flush();
    return strlen($str);
};
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_WRITEFUNCTION, $callback);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1000);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_exec($ch);
curl_close($ch);
