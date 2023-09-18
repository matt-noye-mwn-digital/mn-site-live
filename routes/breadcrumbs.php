<?php

use Diglactic\Breadcrumbs\Breadcrumbs;

use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;


Breadcrumbs::for('home', function(BreadcrumbTrail $trail){
    $trail->push('Home', route('homepage.index'));
});

Breadcrumbs::for('knowledgebase.index', function(BreadcrumbTrail $trail){
    $trail->parent('home');
    $trail->push('Knowledgebase', route('knowledgebase.index'));
});

