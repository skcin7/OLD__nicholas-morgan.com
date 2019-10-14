<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Storage;

class MyBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:my-backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup the database.';

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
        $timestamp = date('Y-m-d-H-i-s');
        $destinationPath = config('app.name') . '/' . config('app.env');
        $this->call('db:backup', [
            '--database' => 'mysql',
            '--destination' => 'dropbox',
            '--destinationPath' => $destinationPath . '/' . $timestamp,
//            '--timestamp' => 'Y-m-d-H-i-s',
            '--compression' => 'gzip',
        ]);

        // Now copy the backup just made to be the 'latest' one too.
        $latestPath = $destinationPath . '/latest.gz';
        if(Storage::disk('dropbox')->exists($latestPath)) {
            Storage::disk('dropbox')->delete($latestPath);
        }
        Storage::disk('dropbox')->copy($destinationPath . '/' . $timestamp . '.gz', $destinationPath . '/latest.gz');

        $this->info('The backup was successful.');
    }
}
