<?php

namespace App\Console\Commands;

use App\Jobs\TestJob;
use Illuminate\Console\Command;

class FireEvent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test RabbitMq';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        TestJob::dispatch();
    }
}
