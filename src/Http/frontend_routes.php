<?php

$router->group(['namespace' => 'Pta\Contact\Http\Controllers\Frontend'], function () use ($router) {

  $router->get(config('contact.contact_page_uri'),  ['as' => 'contact.frontend', 'uses' => 'ContactController@contact']);
});