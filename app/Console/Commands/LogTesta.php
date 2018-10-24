<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Models\ServiceSubcategory;

class LogTesta extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:testa';

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
        //
        //Log::info('Mi Comando Funciona!');
        ServiceSubcategory::create([
            'name'=>'Subcategoria1',
            'description'=>'Descripcíón o ayuda del servicio',
            'service_category_id'=>1,
            'isActive' => 0
        ]);

    }
}
