<?php

namespace App\Console\Commands;

use App\Http\Repository\CityRepository;
use App\Http\Repository\ProvinceRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CreateCity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:city {city} {province}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for city with province creation Example: php artisan create:city Parana, EntreRios';

    protected $provinceRepository;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ProvinceRepository $provinceRepository)
    {
        $this->provinceRepository = $provinceRepository;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $city = $this->cleanCityField($this->argument('city'));
        $province = trim($this->argument('province'));
        return $this->provinceRepository->createCityWithProvince($city, $province);
    }

    public function cleanCityField($value)
    {
        $value = trim($value);
        if (Str::endsWith($value, ',')) return Str::replaceLast(',', '', $value);
        return $value;
    }
}
