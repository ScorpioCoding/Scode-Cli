<?php

return (object) array(

  '/post/create' => [
    'lang' => 'en',
    'module' => 'Api',
    'namespace' => 'Modules\Api\Controllers',
    'controller' => 'Post',
    'action' => 'create'
  ],

  '/post/readall' => [
    'lang' => 'en',
    'module' => 'Api',
    'namespace' => 'Modules\Api\Controllers',
    'controller' => 'Post',
    'action' => 'readAll'
  ],

  '/post/readbyid/{id:\d+}' => [
    'lang' => 'en',
    'module' => 'Api',
    'namespace' => 'Modules\Api\Controllers',
    'controller' => 'Post',
    'action' => 'readById'
  ],

  '/post/readbyslug/{slug:[a-z0-9]+(?:-[a-z0-9]+)*}' => [
    'lang' => 'en',
    'module' => 'Api',
    'namespace' => 'Modules\Api\Controllers',
    'controller' => 'Post',
    'action' => 'readBySlug'
  ],

  '/post/update/header' => [
    'lang' => 'en',
    'module' => 'Api',
    'namespace' => 'Modules\Api\Controllers',
    'controller' => 'Post',
    'action' => 'updateHeader'
  ],

  '/post/update/about' => [
    'lang' => 'en',
    'module' => 'Api',
    'namespace' => 'Modules\Api\Controllers',
    'controller' => 'Post',
    'action' => 'updateAbout'
  ],

  '/post/update/image' => [
    'lang' => 'en',
    'module' => 'Api',
    'namespace' => 'Modules\Api\Controllers',
    'controller' => 'Post',
    'action' => 'updateImage'
  ],

  '/post/delete/{id:\d+}' => [
    'lang' => 'en',
    'module' => 'Api',
    'namespace' => 'Modules\Api\Controllers',
    'controller' => 'Post',
    'action' => 'delete'
  ],


);