<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('To-Do List', route('dashboard'));
});

Breadcrumbs::for('todo.show', function (BreadcrumbTrail $trail, $todo) {
    $trail->parent('dashboard');
    $trail->push($todo->title, route('todo.show', ['todo' => $todo->id]));
});

Breadcrumbs::for('todo.edit', function (BreadcrumbTrail $trail, $todo) {
    // $trail->parent('dashboard');
    $trail->parent('todo.show', $todo);
    $trail->push('Edit', route('todo.edit', ['todo' => $todo]));
});

Breadcrumbs::for('todo.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Add', route('todo.create'));
});
