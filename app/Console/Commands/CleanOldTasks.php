<?php

namespace App\Console\Commands;

use App\Models\Task;
use Illuminate\Console\Command;

class CleanOldTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete tasks older than 1 hour';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $cutoff = now()->subHour();
        Task::where('created_at', '<', $cutoff)->delete();
        $this->info('Old tasks cleaned.');
    }
}
