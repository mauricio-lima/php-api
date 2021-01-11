<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
/*                                                                                 */
/*   API Framework                                                                 */
/*                                                                                 */
/*   class Application                                                             */
/*                                                                                 */
/*                                                                                 */
/*   Mauricio Lima (c)  -  2021 January                                            */
/*                                                                                 */
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

class Application 
{
    private $routes;

    public function __construct($file_settings = 'settings.json') 
    {
        try
        {
            if (!file_exists($file_settings))
                throw new Exception('Settings file not found');

            $contents = file_get_contents($file_settings);
            $this->settings = json_decode($contents);

            $this->routes = array(
                'get'    => [],
                'post'   => [],
                'put'    => [],
                'delete' => []
            );
        }
        catch (Exception $e)
        {
            print($e->getMessage() . PHP_EOL . PHP_EOL);
        }
    }

    private function register($key, $route, $callback)
    {
        if (array_key_exists($route, $this->routes[$key]))
            throw new Exception('Route already exists');

        $this->routes[$key][$route] = $callback;
    }

    public function get($route, $callback)
    {
        $this->register('get', $route, $callback);
    }

    public function push($route, $callback)
    {
        $this->register('push', $route, $callback);
    }

    public function put($route, $callback)
    {
        $this->register('put', $route, $callback);
    }

    public function delete($route, $callback)
    {
        $this->register('delete', $route, $callback);
    }

    public function run()
    {
        print('RUN' . PHP_EOL);
        print('Method : ' . $_SERVER['REQUEST_METHOD'] . PHP_EOL);
        
        try
        {
            $this->routes['get']['/']      (null);
            $this->routes['get']['/teste'] (null);
        }
        catch (Exception $e)
        {
            print('Exception' . PHP_EOL);
        }
    }
}

?>
