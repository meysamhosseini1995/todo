<?php

namespace App\Console\Commands;

use App\Models\Todo;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateTodoTaskOverdue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'todo:update-task-overdue';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command updated all task overdue';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Todo::query()->where('is_completed',0)->where('created_at','>',Carbon::now()->subDays(2))->update(['is_completed'=>1]);
        $this->info('All tasks that have been created for two days and have not yet been completed have been changed to completed');
    }
}
