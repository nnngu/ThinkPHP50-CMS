<?php
/**
 * Created by PhpStorm.
 * Author: nnngu
 * Date: 30/05/2018
 * Time: 21:53
 */



class YoukuVideo
{
    public $vid;
    public $ccode;
    public $cna;
    public $request;
    /**
     * YoukuVideo constructor.
     */
    public function __construct($vid)
    {
        $this->vid = $vid;
        $cna = $this->fetch_cna();
        //$cna = '2V06EwrKJjICAbczegzDzfoV';
        $params = array(
            'vid' => $this->vid,
            'ccode' => '0502',
            'client_ip' => '192.168.1.1',
            'utid' => urlencode($cna),
            'client_ts' => intval(time()),
            'ckey' => 'DIl58SLFxFNndSV1GFNnMQVYkx1PP5tKe1siZu%2F86PR1u%2FWh1Ptd%2BWOZsHHWxysSfAOhNJpdVWsdVJNsfJ8Sxd8WKVvNfAS8aS8fAOzYARzPyPc3JvtnPHjTdKfESTdnuTW6ZPvk2pNDh4uFzotgdMEFkzQ5wZVXl2Pf1%2FY6hLK0OnCNxBj3%2Bnb0v72gZ6b0td%2BWOZsHHWxysSo%2F0y9D2K42SaB8Y%2F%2BaD2K42SaB8Y%2F%2BahU%2BWOZsHcrxysooUeND%20HTTP%2F1.1',
        );
        $cookies = array(
            '__ysuid' => intval(time()),
            'cna' => $cna
        );
        $headers = array(
            'Referer' => 'http://v.youku.com',
            'Host' => 'ups.youku.com'
        );
        $this->request = new Request();
        $this->request->http_get('https://ups.youku.com/ups/get.json', $params, $cookies, $headers);
        // debug
        /*echo($request->info['request_header']);
        echo '<br>';
        echo $request->full_url;
        echo '<br>';
        echo $request->body;*/
    }
    public function fetch_cna()
    {
        $url = 'http://gm.mmstat.com/yt/ykcomment.play.commentInit?cna=';
        $request = new Request();
        $request->http_get($url);
        //$request->response_headers['Set-Cookie'];
        // echo json_encode($request->info);
        // var_dump($request->info);
        // var_dump($request->response_headers);
        // echo "<textarea>" . $response . "</textarea>";
        $values = $request->get_res_header('Set-Cookie');
        $cna = false;
        foreach ($values as $value) {
            preg_match('/cna=([^;]+)/', $value, $matches);
            if (count($matches) > 0) {
                $cna = $matches[1];
                break;
            }
        }
        if (!$cna) {
            $cna = 'oqikEO1b7CECAbfBdNNf1PM1';
        }
        return $cna;
        /*req = urlopen(url)
        cookies = req.info()['Set-Cookie']
        cna = match1(cookies, "cna=([^;]+)")
        return cna if cna else "oqikEO1b7CECAbfBdNNf1PM1"*/
    }
    public function get_json()
    {
        return json_decode($this->request->body, true);
    }
}
class Request
{
    public $info;
    public $req_cookies;
    public $full_url;
    public $response;
    public $header;
    public $response_headers = array();
    public $body;
    public function merge_default_header($headers)
    {
        $defaults = array(
            'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
            'Accept-Language' => 'zh-CN,zh;q=0.8,en-US;q=0.5,en;q=0.3',
            'Accept-Encoding' => 'gzip, deflate',
            'cache-control' => 'no-cache',
            'User-Agent' => "Mozilla/5.0 (X11; Linux x86_64; rv:38.0) Gecko/20100101 Firefox/38.0 Iceweasel/38.2.1"
        );
        $array_merge = array_merge($defaults, $headers);
        return $array_merge;
    }
    /**
     * GET 请求
     * @param string $url
     */
    public function http_get($url, $params = array(), $cookies = array(), $headers = array())
    {
        $this->full_url = $url;
        $oCurl = curl_init();
        if (stripos($url, "https://") !== FALSE) {
            curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($oCurl, CURLOPT_SSLVERSION, 1); //CURL_SSLVERSION_TLSv1
        }
        curl_setopt($oCurl, CURLOPT_HEADER, TRUE);//至关重要，CURLINFO_HEADER_OUT选项可以拿到请求头信息
        curl_setopt($oCurl, CURLINFO_HEADER_OUT, TRUE);//请求头信息
        curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($oCurl, CURLOPT_NOBODY, TRUE);// 不获取body
        curl_setopt($oCurl, CURLOPT_ENCODING, "");
        // 参数
        if (is_array($params)) {
            $params_str = $this->get_params_str($params);
            if (strpos($this->full_url, '?') === FAlSE) {
                $this->full_url .= '?' . $params_str;
            } else {
                $this->full_url .= '&' . $params_str;
            }
        }
        // cookies
        if (is_array($cookies)) {
            $cookies_str = $this->get_cookies_str($cookies);
            curl_setopt($oCurl, CURLOPT_COOKIE, $cookies_str); //使用cookies
        }
        // headers
        $headers = $this->merge_default_header($headers);
        $headers = self::flatten($headers);
        curl_setopt($oCurl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($oCurl, CURLOPT_URL, $this->full_url);
        $response = curl_exec($oCurl);
        $this->info = curl_getinfo($oCurl);
        curl_close($oCurl);
        if (intval($this->info["http_code"]) == 200) {
            $this->process_response_headers($response);
            return $response;
        } else {
            return false;
        }
    }
    public function process_response_headers($response)
    {
        $header_size = $this->info['header_size'];
        $this->header = substr($response, 0, $header_size);
        $this->body = substr($response, $header_size);
        $headArr = explode("\r\n", $this->header);
        foreach ($headArr as $line) {
            preg_match('/(.*?):(.+)/', $line, $matches, PREG_OFFSET_CAPTURE);
            if (count($matches) == 3) {
                $key = trim($matches[1][0]);
                $this->response_headers[] = array($key => trim($matches[2][0]));
                /*if (isset($this->response_headers[$key])) {
                    $this->response_headers[$key] .= ';' . trim($matches[2][0]);
                } else {
                    //$this->response_headers[$key] = trim($matches[2][0]);
                }*/
                // var_dump($matches);
                // echo "<br>";
                /*
                array (size=3)
                  0 =>
                    array (size=2)
                      0 => string 'Date: Thu, 22 Mar 2018 07:35:59 GMT' (length=35)
                      1 => int 0
                  1 =>
                    array (size=2)
                      0 => string 'Date' (length=4)
                      1 => int 0
                  2 =>
                    array (size=2)
                      0 => string ' Thu, 22 Mar 2018 07:35:59 GMT' (length=30)
                      1 => int 5
                 */
            }
//            echo $line . "<br>";
        }
    }
    public function get_res_header($key)
    {
        $arr = array();
        foreach ($this->response_headers as $header) {
            if (isset($header[$key])) {
                $arr[] = $header[$key];
            }
        }
        return $arr;
    }
    private function arr_join_str($arr, $separator)
    {
        $str = '';
        foreach ($arr as $key => $value) {
            $str .= $key . '=' . $value . $separator;
        }
        $str = substr($str, 0, strlen($str) - strlen($separator));
        return $str;
    }
    public function get_params_str($params)
    {
        return $this->arr_join_str($params, '&');
    }
    public function get_cookies_str($cookies_arr)
    {
        return $this->arr_join_str($cookies_arr, ';');
    }
    public static function flatten($array)
    {
        $return = array();
        foreach ($array as $key => $value) {
            $return[] = sprintf('%s: %s', $key, $value);
        }
        return $return;
    }
}