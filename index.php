<?php
require_once __DIR__ . '/src/router.php';

$router = new Router();

$router->add_route('/', function () {
  echo 'Home Page';
});

$router->add_route('/about', function () {
  echo 'About Page';
});

$router->dispatch();

?>

<ul>
  <li>
    <a href="/">Home</a>
    <a href="/about">About</a>
  </li>
</ul>