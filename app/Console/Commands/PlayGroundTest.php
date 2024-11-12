<?php

namespace App\Console\Commands;

use App\Models\Company;
use Illuminate\Console\Command;

class PlayGroundTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:play-ground-test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Company::create([
            'category_id' => 2,
            'name' => 'Braz Contrução',
            'cnpj' => '144.111.3333/01',
            'domain' => 'brazconstrucao.com',
        ]);
    }
}
