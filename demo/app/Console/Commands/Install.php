<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;


class Install extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run first-time application setup';

    /**
     * Run the command
     *
     * @return void
     */
    public function handle() : void {
        foreach ($this->commands() as $command => $message) {
            $this->info("$message...");
            $this->callSilent($command);
        }
    }

    /**
     * Get the installer sub-routines
     *
     * @return array
     */
    protected function commands() : array {
        return  [
            'migrate:install' => 'Installing database',
            'migrate'         => 'Running migrations',
            'db:seed'         => 'Installing demo data',
            'module:seed'     => 'Installing modules',
        ];
    }

}
