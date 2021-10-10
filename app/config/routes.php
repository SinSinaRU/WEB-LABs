<?php

return [
    '' => [
        'controller' => 'main',
        'action' => 'index',
    ],
    'about-me' => [
        'controller' => 'about_me',
        'action' => 'index',
    ],
    'feedback' => [
        'controller' => 'feedback',
        'action' => 'index',
    ],
    'cookie-history' => [
        'controller' => 'cookie_history',
        'action' => 'index',
    ],
    'my-interests' => [
        'controller' => 'my_interests',
        'action' => 'index',
    ],
    'photo-album' => [
        'controller' => 'photo_album',
        'action' => 'index',
    ],
    'study-plan' => [
        'controller' => 'study_plan',
        'action' => 'index',
    ],
    'test' => [
        'controller' => 'test',
        'action' => 'index',
    ],
    'guest-book' => [
        'controller'=>'guest_book',
        'action'=>'index',
    ],
    'guest-book/load' => [
        'controller'=>'guest_book',
        'action'=>'load',
    ],
    'blog/edit'=>[
        'controller' =>'blog',
        'action'=>'edit',
    ],
    'blog'=>[
        'controller' =>'blog',
        'action'=>'index',
    ],
    'blog/load'=>[
        'controller' =>'blog',
        'action'=>'load',
    ],
    'admin'=>[
        'controller' =>'main',
        'action'=>'index',
    ],
    'admin/guest-book/load' => [
        'controller'=>'guest_book',
        'action'=>'load',
    ],
    'admin/blog/edit'=>[
        'controller' =>'blog',
        'action'=>'edit',
    ],
    'admin/statistic'=>[
        'controller' =>'statistic',
        'action'=>'index',
    ],
    'admin/login'=>[
        'controller' =>'main',
        'action'=>'login',
    ],
    'admin/logout'=>[
        'controller' =>'main',
        'action'=>'logout',
    ],
    'users'=>[
        'controller' =>'users',
        'action'=>'login',
    ],
    'users/register'=>[
        'controller' =>'users',
        'action'=>'register',
    ],
    'users/logout'=>[
        'controller' =>'users',
        'action'=>'logout',
    ],
];