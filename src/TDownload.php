<?php

namespace Zhxdev\TDownload;

use DateTime;
use SebastianBergmann\FileIterator\Facade;

class TDownload extends Facade
{
    public const USER_AGENT = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36';
    public const COOKIE = 'tt_csrf_token=n2Mk4xsL-PZn2EpK-p9VLTgOOcX9rDNU-obs; _abck=085715E3CC7DECD220AC9E45DF70CA8F~-1~YAAQbf1eb/Ze9NGDAQAA6fDjCwj5oaERQFQDBQNvi6sdMHTF9PeceTy7REK5Xz6RnP7PEMU4Jm/EQFItta4cWZNjqmmN9shHw24QJUsuDR6AH+8AezeSZdUVESnrVdGaxENQ1rVnwBc/qHQB+szwUju1JtRwPNY3B0pBOm9X3SwfJMXTExKOolXaTifMAedEBDpbAROeR9BZ8Ak9MSQW899b5rI3+hypQn+qY8u4lJXuiLW1HZOg/frBpIuhaGQId4G91TG+P/EYimhfwRJUHm78eHfbp6paZPNxKVyE22Qolv/78vSRZ2UtRlGKjmA21hv9ItsWhEQAepN0nBNv2iDfoBB6a1/LcFCIDX1Is8w+Eadcu8K1awbFXwY=~-1~-1~-1; bm_sz=C040E0E7680D71EB0E88A24AD74CAF85~YAAQbf1eb/de9NGDAQAA6fDjCxE9jy78846cc+uPA5ZPsljey5DqtO/ulvUZxf7fff44MSzUR7OkUAs+q4gOQrdVCZT6yb6zp2yLxO8Wf9fDU1wq1yjud5xu9qhJOI0uQTprkw76g0IkRf+XQEwcfaMTmL1PKmqecxxtiFvGcn3fmm+K+Mxz1jO+gnxzk3j/nRg85617YU4rDwJLnuTDLuWCCMvzGcnfixnMOMUPEuvdY9ujJ0BEacm+zHWboLVUXLqtKuMwIekAb+waCCYyZjcGmxAh4+rBtu4gZc93q1qPF/4=~4403266~3749431; ttwid=1%7CHNjCYSChVhiebBP6zPypPjuYItnk7Ws8gCLJrgcYmfA%7C1666647065%7C16388b2f82000f7530bccee863c0472eab95bcfc858ebfe257741382952aea68; msToken=QzvZZ_4RKywMurHgo9iCZiEGU26uNQxBvjujdMJfh1vsQjP1y7DcK4EWIVbK9d4q3yyHZzJOUMnjfgN4oCi9Q2rupuXFUq2LtS-dnLQHBvNkKxVgtxnvFHPZ2zIMjw==';

    public function getPackageDetail()
    {
        return [
            'author' => [
                'name' => 'Muh Ezha Syafaat',
                'username' => 'ezhasyafaat',
                'email' => 'muhammadezhasyafaat08@gmail.com',
            ],
            'vendor' => [
                'name' => 'Zhxdev',
                'slug' => 'zhxdev',
            ],
            'package' => [
                'name' => 'TDownload',
                'slug' => 'tdownload',
                'description' => 'Package tiktok downloader',
            ],
        ];
    }

    public function getContentUrl($url, $getUrl = false)
    {
        $ch = curl_init();

        $options = [
            'CURLOPT_URL' => $url,
            'CURLOPT_RETURNTRANSFER' => true,
            'CURLOPT_HEADER' => false,
            'CURLOPT_FOLLOWLOCATION' => true,
            'CURLOPT_USERAGENT' => self::USER_AGENT,
            'CURLOPT_ENCODING' => 'utf-8',
            'CURLOPT_AUTOREFERER' => false,
            'CURLOPT_COOKIEJAR' => self::COOKIE,
            'CURLOPT_COOKIEFILE' => self::COOKIE,
            'CURLOPT_REFERER' => 'https://www.tiktok.com/',
            'CURLOPT_CONNECTTIMEOUT' => 30,
            'CURLOPT_SSL_VERIFYHOST' => false,
            'CURLOPT_SSL_VERIFYPEER' => false,
            'CURLOPT_TIMEOUT' => 30,
            'CURLOPT_MAXREDIRS' => 10,
        ];
        curl_setopt_array($ch, $options);
        if (defined('CURLOPT_IPRESOLVE') && defined('CURL_IPRESOLVE_V4')) {
            curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        }
        $data = curl_exec($ch);

        curl_close($ch);
        if ($getUrl === true) {
            return curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
        }
        curl_close($ch);

        return strval($data);
    }

    public function getKeyContent($url)
    {
        $ch = curl_init();
        $headers = [
            'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
            'Accept-Encoding: gzip, deflate, br',
            'Accept-Language: en-US,en;q=0.9',
            'Range: bytes=0-200000',
        ];

        $options = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_USERAGENT => self::USER_AGENT,
            CURLOPT_ENCODING => "utf-8",
            CURLOPT_AUTOREFERER => false,
            CURLOPT_COOKIEJAR => self::COOKIE,
            CURLOPT_COOKIEFILE => self::COOKIE,
            CURLOPT_REFERER => 'https://www.tiktok.com/',
            CURLOPT_CONNECTTIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_MAXREDIRS => 10,
        ];

        curl_setopt_array($ch, $options);
        if (defined('CURLOPT_IPRESOLVE') && defined('CURL_IPRESOLVE_V4')) {
            curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        }
        $data = curl_exec($ch);

        curl_close($ch);
        $tmp = explode("vid:", $data);

        if (count($tmp) > 1) {
            $key = trim(explode("%", $tmp[1])[0]);
        } else {
            $key = "";
        }

        return $key;
    }

    public function downloadVideo($url)
    {
        $url = trim($url);

        $contentUrl = $this->getContentUrl($url);
        $checkContent = explode('"downloadAddr":"', $contentUrl);

        if (count($checkContent) > 1) {
            $urlContent = explode("\"", $checkContent[1])[0];
            $urlContent = str_replace("\\u0026", "&", $urlContent);
            $urlContent = str_replace("\\u002F", "/", $urlContent);
            $thumbnail = explode("\"", explode('og:image" contet="', $contentUrl)[1])[0];
            $username = explode('"', explode('"uniqueId":"', $contentUrl)[1])[0];
            $createTime = explode('"', explode('"createTime":"', $contentUrl)[1])[0];
            $dateTime = new DateTime("@$createTime");
            $createTime = $dateTime->format("d M Y H:i:s A");
            $vKey = $this->getKeyContent($urlContent);
            $noWatermark = "https://api2-16-h2.musical.ly/aweme/v1/play/?video_id=$vKey&vr_type=0&is_play_url=1&source=PackSourceEnum_PUBLISH&media_type=4";
            $noWatermark = $this->getContentUrl($noWatermark, true);

            $json = [
                'success' => true,
                'data' => [
                    'url_download' => $contentUrl,
                    'url_download_no_watermark' => $noWatermark,
                ],
            ];

            return print_r(json_encode($json));
        }
    }
}
