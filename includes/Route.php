<?php
namespace eCommerce\includes;

//used==================!
//    Route::add([
//        [
//            'regex' => '^controller/([a-zA-Z1-9]+)/?',
//            'query' => 'index.php?param=$matches[1]',
//            'controller'  => 'firstController'
//        ]
//    ]);
class Route
{
    private static $urls = [];

    public static function add($urls = [])
    {
        self::$urls = array_map(function ($url) {
            $url['params'] = [];
            $url['paramsKeys'] = [];
            $paramsString = parse_url($url['query'], PHP_URL_QUERY);
            if ($paramsString != null) {
                $url['params'] = explode('&', trim($paramsString));
                if (!empty($url['params'])) {
                    foreach ($url['params'] as $param) {
                        $url['paramsKeys'][] = explode('=', $param)[0];
                    }
                }
            }
            return $url;
        }, $urls);
        add_filter('rewrite_rules_array', __CLASS__.'::plugin_functionality_urls');
        add_filter('query_vars', __CLASS__.'::plugin_custom_query_vars');
        add_action('parse_request', __CLASS__.'::plugin_custom_request');
    }

    public static function plugin_functionality_urls($rules)
    {
        return array_column(self::$urls, 'query', 'regex') + $rules;
    }

    public static function plugin_custom_query_vars($vars)
    {
        return array_merge($vars, ...array_column(self::$urls, 'paramsKeys'));
    }

    public static function plugin_custom_request($wp)
    {
        global $wp;
        $vars = $wp->query_vars;
        if (!empty($vars)) {
            if (isset($vars['attachment'])) {
                unset($vars['attachment']);
            }
            foreach (self::$urls as $url) {
                if (
                    $url['paramsKeys'] == array_keys($vars)
                    ||
                    preg_match(sprintf('#%s#', $url['regex']), $wp->request)
                ) {
                    //import controller file
                    Helpers::controllerRequire($url['controller']);
                }
            }
        }
    }
}