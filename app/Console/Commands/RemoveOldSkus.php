<?php

namespace App\Console\Commands;

use App\Services\OldSkusRemover;
use App\Services\OldSupsRemover;
use Illuminate\Console\Command;

class RemoveOldSkus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'picfind:remove:old-skus';

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
    public function __construct(private OldSkusRemover $oldSkusRemover)
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
        $this->oldSkusRemover->run();
        return 0;
    }
}
