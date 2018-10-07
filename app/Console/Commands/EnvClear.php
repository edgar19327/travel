<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Artisan;

class EnvClear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear all cache...';

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
     * @return mixed
     */
    public function handle()
    {
        $output = new \Symfony\Component\Console\Output\ConsoleOutput();

        $output->writeln("\t<fg=green;>Started artisan commands...</>");

        for ($i = 0; $i < 50; $i++) {
            Artisan::call('config:cache');
        }
        $output->writeln("\tphp artisan config:cache");

        for ($i = 0; $i < 50; $i++) {
            Artisan::call('config:clear');
        }
        $output->writeln("\tphp artisan config:clear");

        for ($i = 0; $i < 50; $i++) {
            Artisan::call('cache:clear');
        }
        $output->writeln("\tphp artisan cache:clear");

        for ($i = 0; $i < 50; $i++) {
            Artisan::call('view:clear');
        }
        $output->writeln("\tphp artisan view:clear");

        for ($i = 0; $i < 50; $i++) {
            Artisan::call('route:clear');
        }
        $output->writeln("\tphp artisan route:clear");

        foreach ($_ENV as $key => $value) {
            $output->writeln("\t<fg=green;>$key - $value</>");
        }

        

        $output->writeln("\n<fg=green;>Cleaned end!</>");
    }
}
