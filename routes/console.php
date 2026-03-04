<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Schedule::call(function () {
    // Delete tasks older than 1 hour
    \App\Models\Task::where('created_at', '<', now()->subHour())->delete();
})->hourly()->description('Clean up old tasks');
