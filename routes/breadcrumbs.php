<?php

// Main
Breadcrumbs::register('main', function($breadcrumbs)
{
    $breadcrumbs->push('Main', route('main'));
});

Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('home'));
});

Breadcrumbs::register('login', function($breadcrumbs)
{
    $breadcrumbs->parent('main');
    $breadcrumbs->push('Login', route('login'));
});