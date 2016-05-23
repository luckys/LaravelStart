<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Pingpong\Modules\Facades\Module;

class InstallApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Realiza la migración y ejecuta los seeders de la aplicación';
    

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        
        $this->call('module:migrate');
        $this->call('module:seed');
    }
}
