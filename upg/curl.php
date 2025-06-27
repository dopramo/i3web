<?php
    $curl = curl_init();
    curl_setopt ($curl, CURLOPT_URL, "http://curl.haxx.se/libcurl/php/");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec ($curl);
    curl_close ($curl);
    print $result;
?>