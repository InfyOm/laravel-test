<?php

namespace App\Console\Commands;

use App\Jobs\MessageDeleteJob;
use Illuminate\Console\Command;

class MessageDeleteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:message-delete-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        MessageDeleteJob::dispatch();
    }
}
