<?php

arch()->preset()->php();

test('that all `App\Traits` classes are traits.', function () {
    expect('App\Traits')
        ->toBeTraits();
});

test('that all `App\Concerns` classes are traits.', function () {
    expect('App\Concerns')
        ->toBeTraits();
});

test('that all classes outside `App\Enums` are not enums.', function () {
    expect('App')
        ->not->toBeEnums()
        ->ignoring('App\Enums');
});

test('that all classes in `App\Exceptions` are throwable.', function () {
    expect('App\Exceptions')
        ->classes()
        ->toImplement('Throwable')
        ->ignoring('App\Exceptions\Handler');
});

test('that all classes outside `App\Exceptions` are not throwable.', function () {
    expect('App')
        ->not->toImplement(Throwable::class)
        ->ignoring('App\Exceptions');
});

test('that all classes in `App\Http\Middleware` have a `handle` method.', function () {
    expect('App\Http\Middleware')
        ->classes()
        ->toHaveMethod('handle');
});

test('that all classes in `App\Models` extend `Illuminate\Database\Eloquent\Model`.', function () {
    expect('App\Models')
        ->classes()
        ->toExtend('Illuminate\Database\Eloquent\Model')
        ->ignoring('App\Models\Scopes');
});

test('that all classes in `App\Models` do not end with `Model`', function () {
    expect('App\Models')
        ->classes()
        ->not->toHaveSuffix('Model');
});

test('that all classes outside `App\Models` do not extend `Illuminate\Database\Eloquent\Model`.', function () {
    expect('App')
        ->not->toExtend('Illuminate\Database\Eloquent\Model')
        ->ignoring('App\Models');
});

test('that all classes in `App\Http\Requests` end with `Request`.', function () {
    expect('App\Http\Requests')
        ->classes()
        ->toHaveSuffix('Request');
});

test('that all classes in `App\Http\Requests` extend `Illuminate\Foundation\Http\FormRequest`.', function () {
    expect('App\Http\Requests')
        ->toExtend('Illuminate\Foundation\Http\FormRequest');
});

test('that all classes in `App\Http\Requests` have a `rules` method.', function () {
    expect('App\Http\Requests')
        ->toHaveMethod('rules');
});

test('that all classes outside `App\Http\Requests` do not extend `Illuminate\Foundation\Http\FormRequest`.', function () {
    expect('App')
        ->not->toExtend('Illuminate\Foundation\Http\FormRequest')
        ->ignoring('App\Http\Requests');
});

test('that all classes in `App\Console\Commands` end with `Command`.', function () {
    expect('App\Console\Commands')
        ->classes()
        ->toHaveSuffix('Command');
});

test('that all classes in `App\Console\Commands` extend `Illuminate\Console\Command`.', function () {
    expect('App\Console\Commands')
        ->classes()
        ->toExtend('Illuminate\Console\Command');
});

test('that all classes in `App\Console\Commands` have a `handle` method.', function () {
    expect('App\Console\Commands')
        ->classes()
        ->toHaveMethod('handle');
});

test('that all classes outside `App\Console\Commands` do not extend `Illuminate\Console\Command`.', function () {
    expect('App')
        ->not->toExtend('Illuminate\Console\Command')
        ->ignoring('App\Console\Commands');
});

test('that all classes in `App\Mail` extend `Illuminate\Mail\Mailable`.', function () {
    expect('App\Mail')
        ->classes()
        ->toExtend('Illuminate\Mail\Mailable');
});

test('that all classes in `App\Mail` implement `Illuminate\Contracts\Queue\ShouldQueue`.', function () {
    expect('App\Mail')
        ->classes()
        ->toImplement('Illuminate\Contracts\Queue\ShouldQueue');
});

test('that all classes outside `App\Mail` do not extend `Illuminate\Mail\Mailable`.', function () {
    expect('App')
        ->not->toExtend('Illuminate\Mail\Mailable')
        ->ignoring('App\Mail');
});

test('that all classes in `App\Jobs` implement `Illuminate\Contracts\Queue\ShouldQueue`.', function () {
    expect('App\Jobs')
        ->classes()
        ->toImplement('Illuminate\Contracts\Queue\ShouldQueue');
});

test('that all classes in `App\Jobs` have a `handle` method.', function () {
    expect('App\Jobs')
        ->classes()
        ->toHaveMethod('handle');
});

test('that all classes in `App\Listeners` have a `handle` method.', function () {
    expect('App\Listeners')
        ->toHaveMethod('handle');
});

test('that all classes in `App\Notifications` extend `Illuminate\Notifications\Notification`.', function () {
    expect('App\Notifications')
        ->toExtend('Illuminate\Notifications\Notification');
});

test('that all classes outside `App\Notifications` do not extend `Illuminate\Notifications\Notification`.', function () {
    expect('App')
        ->not->toExtend('Illuminate\Notifications\Notification')
        ->ignoring('App\Notifications');
});

test('that all classes in `App\Providers` end with `ServiceProvider`.', function () {
    expect('App\Providers')
        ->toHaveSuffix('ServiceProvider');
});

test('that all classes in `App\Providers` extend `Illuminate\Support\ServiceProvider`.', function () {
    expect('App\Providers')
        ->toExtend('Illuminate\Support\ServiceProvider');
});

test('that all classes outside `App\Providers` are not used.', function () {
    expect('App\Providers')
        ->not->toBeUsed();
});

test('that all classes outside `App\Providers` do not extend `Illuminate\Support\ServiceProvider`.', function () {
    expect('App')
        ->not->toExtend('Illuminate\Support\ServiceProvider')
        ->ignoring('App\Providers');
});

test('that all classes outside `App\Providers` do not end with `ServiceProvider`.', function () {
    expect('App')
        ->not->toHaveSuffix('ServiceProvider')
        ->ignoring('App\Providers');
});

test('that all classes in `App\Http\Controllers` do not end with `Controller`.', function () {
    expect('App')
        ->not->toHaveSuffix('Controller')
        ->ignoring('App\Http\Controllers');
});

test('that all classes in `App\Http\Controllers` end with `Controller`.', function () {
    expect('App\Http\Controllers')
        ->classes()
        ->toHaveSuffix('Controller');
});

test('that dd, ddd, dump, env, exit, ray are not used.', function () {
    expect([
        'dd',
        'ddd',
        'dump',
        'env',
        'exit',
        'ray',
    ])->not->toBeUsed();
});

test('that all classes in `App\Policies` end with `Policy`.', function () {
    expect('App\Policies')
        ->classes()
        ->toHaveSuffix('Policy');
});
