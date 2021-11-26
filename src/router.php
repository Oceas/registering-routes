<?php

class Router {

    /**
     * Holds the registered routes
     *
     * @var array $routes
     */
    protected $routes = [];

    /**
     * Register a new route.
     * 
     * @param string   $action   Name of route.
     * @param \Closure $callback Callback function.
     */
    public function add_route($action, $callback)
    {
        $action = trim($action, '/');
        $this->routes[$action] = $callback;
    }

    /**
     * Dispatch the router
     */
    public function dispatch()
    {
        $action   = trim($_SERVER['REQUEST_URI'], '/');
        //Cleanup action in case there are any URL parameters.
        if ( false !== strpos($action, "?") ) {
            $action   = substr($action, 0, strpos($action, "?"));
        }
        $callback = $this->routes[$action];
        call_user_func($callback);
    }
    
}
