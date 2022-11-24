<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class NoteDump extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'note:dump';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dump DB Note_Board';

    public function handle()
    {
        $dataTime = 'note_' . date('d.m.Y') . '_' . date('H:i:s');
        $mysqldump="mysqldump '--user=pc' '--password=pc' note_board > storage/db-dumps/$dataTime.sql";
        $output = [];

        exec ( $mysqldump,$output );
    }
}
