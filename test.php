<?php

require 'vendor/autoload.php';

use Zhxdev\TDownload\TDownload;

function downloadTiktok()
{
  $response = TDownload::downloadVideo('https://www.tiktok.com/@gusangga2_/video/7154905203353931034?is_from_webapp=1&sender_device=pc');

  print_r($response);
}

downloadTiktok();
