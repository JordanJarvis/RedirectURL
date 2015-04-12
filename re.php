<?PHP
    //get url parameter
    $url = $_GET['url'];



    // send the right headers
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Transfer-Encoding: binary');
    header('Connection: Keep-Alive');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    header('Content-Disposition: attachment; filename="toDownload.html"');


    //then download the new file using curl to follow redirection :
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_ENCODING, "gzip"); // Important 
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 50);

    $st = curl_exec($ch);
    curl_close($ch);

    exit;
?>