<?php
namespace App\Console\Commands;

use Illuminate\Support\Facades\File;
use Illuminate\Console\Command;
use Carbon\Carbon;

class DatabaseBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //protected $signature = 'command:name';
    protected $signature = 'database:backup';

    /**
     * The console command description.
     *
     * @var string
     */
   // protected $description = 'Command description';
    protected $description = 'Create copy of mysql dump for existing database.';

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
            $filename = 'backup-' . Carbon::now()->format('Y-m-d') . '.sql.gz';

    // Create the backup directory if it doesn't exist.
    $backupDir = storage_path('app/backup');
    if (!is_dir($backupDir)) {
        mkdir($backupDir, 0755, true);
    }

    // Generate the database backup file.
    $command = sprintf(
        'mysqldump -u %s -p%s -h %s %s | gzip > %s/%s',
        env('DB_USERNAME'),
        env('DB_PASSWORD'),
        env('DB_HOST'),
        env('DB_DATABASE'),
        $backupDir,
        $filename
    );

    exec($command);

    $this->info(sprintf('Database backup created: %s', $filename));
    }
}
