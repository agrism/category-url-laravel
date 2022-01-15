<?php

namespace App\Console\Commands;

use App\Services\AdService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SeedAds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:ads';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    private $adsService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->adsService = AdService::factory();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('ad_data')->truncate();
        DB::table('ads')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        dump('start add ads');
        foreach(range(0,20) as $i){

            dump('foreach '. $i);
            $this->adsService->clearAd()->addAdCategory('root', 'transport')
            ->addAdCategory('transport', 'car')
            ->addAdCategory('color', 'black')
            ->addAdCategory('car', 'bmw')
            ->addAdCategory('bmw', '5-series')
            ->createAd('black bmw 1 '.uniqid());
        }

        $this->adsService->clearAd()->addAdCategory('root', 'transport')
        ->addAdCategory('transport', 'car')
        ->addAdCategory('color', 'red')
        ->addAdCategory('car', 'bmw')
        ->addAdCategory('bmw', '5-series')
        ->createAd('red bmw 1 '.uniqid());

        dump('end add ads');

        return 0;
    }
}
