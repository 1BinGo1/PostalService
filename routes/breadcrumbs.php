<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('home', function ($breadcrumbs) {
    $breadcrumbs->push(__('Main'), route('home'));
});

Breadcrumbs::for('office.list_dispatch', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(__('Dispatch list'), route('office.main'));
});

Breadcrumbs::for('office.list_dispatch_info', function ($breadcrumbs) {
    $breadcrumbs->parent('office.list_dispatch');
    $breadcrumbs->push(__('Information about dispatch'));
});

Breadcrumbs::for('profile.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(__('Profile'), route('profile.index'));
});

Breadcrumbs::for('profile.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('profile.index');
    $breadcrumbs->push(__('Edit'));
});

Breadcrumbs::for('profile.create', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(__('Create a new user'));
});

Breadcrumbs::for('dispatch.create', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(__('Create new dispatch'));
});

Breadcrumbs::for('dispatch.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(__('Edit dispatch'));
});
