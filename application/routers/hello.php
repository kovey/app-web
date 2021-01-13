<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2021-01-13 10:30:04
 *
 */
use Kovey\Web\App\Http\Router\Route;

Route::post('/router/test', 'router@hello');

Route::post('/router/call', function ($request, $response) {
    return 'call';
});
