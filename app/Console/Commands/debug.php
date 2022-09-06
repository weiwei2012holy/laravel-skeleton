<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class debug extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'debug';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'debug';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        dump(resource_path('model_schemas/'));
        return 0;
    }
}
