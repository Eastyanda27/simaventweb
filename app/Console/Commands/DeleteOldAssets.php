<?php

namespace App\Console\Commands;

use App\Models\Kendaraan;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeleteOldAssets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'assets:force-delete';

    /**
     * The console command description.
     *
     * @var string
     */

    /**
     * Execute the console command.
     */

    public function __construct()
    {
        parent::__construct();
    }
    
    public function handle()
    {

    }
}
