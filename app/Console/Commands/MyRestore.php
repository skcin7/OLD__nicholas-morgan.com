<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Storage;

class MyRestore extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:my-restore
        { sourceEnvironment=production }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Restore the database.';

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
        $sourcePath = config('app.name') . '/' . $this->argument('sourceEnvironment') . '/latest.gz';
        if(! Storage::disk('dropbox')->exists($sourcePath)) {
            $this->error('File `' . $sourcePath . '` does not exist.');
            return;
        }

        $this->call('db:restore', [
            '--source' => 'dropbox',
            '--sourcePath' => $sourcePath,
            '--database' => 'mysql',
            '--compression' => 'gzip',
        ]);
        $this->info('The restore was successful.');
    }
}
