<?php

use App\Models\Knowledgebase;
use App\Models\KnowledgebaseCategory;
use Diglactic\Breadcrumbs\Breadcrumbs;

use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;


Breadcrumbs::for('home', function(BreadcrumbTrail $trail){
    $trail->push('Home', route('homepage.index'));
});

//Knowledgebase
Breadcrumbs::for('knowledgebase.index', function(BreadcrumbTrail $trail){
    $trail->parent('home');
    $trail->push('Knowledgebase', route('knowledgebase.index'));
});
Breadcrumbs::for('knowledgebase.categoryShow', function(BreadcrumbTrail $trail, $slug){
    $trail->parent('knowledgebase.index');
    $knowledgebaseCategory = KnowledgebaseCategory::where('slug', $slug)->firstOrFail();

    $trail->push($knowledgebaseCategory->name, route('knowledgebase.categoryShow', ['slug', $slug]));
});
Breadcrumbs::for('knowledgebase.show', function($trail, $categorySlug, $slug) {
    // Retrieve the Knowledgebase model by its slugs
    $knowledgebaseCategory = KnowledgebaseCategory::where('slug', $categorySlug)->firstOrFail();
    $knowledgebase = Knowledgebase::where('slug', $slug)
        ->where('category_id', $knowledgebaseCategory->id)
        ->firstOrFail();

    $trail->parent('knowledgebase.categoryShow', $categorySlug); // Set the parent breadcrumb
    $trail->push($knowledgebase->title, route('knowledgebase.show', ['category' => $categorySlug, 'slug' => $slug]));
});











