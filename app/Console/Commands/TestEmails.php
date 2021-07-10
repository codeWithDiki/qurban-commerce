<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\SendMail;
class TestEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:test {orderId} {customerEmail} {todo}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        SendMail::dispatch($this->argument('orderId'), $this->argument('customerEmail'), $this->argument("todo"))->onQueue("Mail_Sender");
        $this->info("Job Dispatched!");
        return 0;
    }
}
