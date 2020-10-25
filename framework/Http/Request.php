<?php


namespace Gaibz\CoffeePHP\Http;


use Gaibz\CoffeePHP\IO\Http;
use Psr\Http\Message\RequestInterface;

class Request extends \Gaibz\CoffeePHP\IO\Psr7\Request implements RequestInterface
{
    public function __construct() {
        $headers = Http::getAllHeaders();
        parent::__construct($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI'], $headers);
    }

    /**
     * Get Query Parameter from request uri
     *
     * @param string $key if specified it will return from specific query key (Case Sensitive)
     * @param bool $parse parse query string into array
     * @return array | string | null
     */
    public function getGet(string $key = '', $parse = true)
    {
        $uri = $this->getUri();
        $query = $uri->getQuery();
        // return original query string a=b&c=d...
        if(!$parse) return $query;
        // return as array [ a => b, c => d]
        parse_str($query, $query_arr);
        if(!empty($key) && isset($query_arr[$key])) return $query_arr[$key];

        return $query_arr;
    }

    /**
     * Get Post Body from HTTP POST
     *
     * @param string $key
     * @return array|string|null
     */
    public function getPost(string $key = '')
    {
        if(empty($key)) return $_POST;

        if(!isset($_POST[$key])) return null;

        return $_POST[$key];
    }

    /**
     * Get Raw Data (Unformatted)
     * This function will helpful if you want to get input from HTTP method other than GET | POST.
     * Something like : PUT | DELETE | etc
     *
     * @param mixed $formatter <code>COFFEE_PHP_FORMAT_NOTHING | COFFEE_PHP_FORMAT_JSON | COFFEE_PHP_FORMAT_QUERY</code>
     * @return false|string
     */
    public function getRaw($formatter = COFFEE_PHP_FORMAT_NOTHING)
    {
        $input = file_get_contents('php://input');
        if($formatter === COFFEE_PHP_FORMAT_JSON) {
            return json_decode($input);
        }
        else if($formatter === COFFEE_PHP_FORMAT_QUERY) {
            parse_str($input, $query);
            return $query;
        }
        else
        {
            return $input;
        }
    }
}