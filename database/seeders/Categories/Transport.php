<?php


namespace Database\Seeders\Categories;


class Transport extends AbstractCategories
{
    public function addData(&$data = [])
    {
        $data = array_merge($data, [
            'car' => 'transport',
            'audi' => 'car',
            'a1' => 'audi',
            'a2' => 'audi',
            'a3' => 'audi',
            'a5' => 'audi',
            'a6' => 'audi',
            'a7' => 'audi',
            'a8' => 'audi',
            'q3' => 'audi',
            'q5' => 'audi',
            'q7' => 'audi',
            'q8' => 'audi',

            'bmw' => 'car',
            '1-series' => 'bmw',
            '2-series' => 'bmw',
            '3-series' => 'bmw',
            '4-series' => 'bmw',
            '5-series' => 'bmw',
            '6-series' => 'bmw',
            '7-series' => 'bmw',
            '8-series' => 'bmw',
            'x-series' => 'bmw',

            'vw' => 'car',
            'Polo' => 'vw',
            'Golf' => 'vw',
            'Jetta' => 'vw',
            'Passat' => 'vw',


            'cargo-cars' => 'transport',
            'asphalt-pavers' => 'cargo-cars',
            'dump-truck' => 'cargo-cars',
            'busses' => 'cargo-cars',
            'tank-lorry' => 'cargo-cars',
            'lorry-loader' => 'cargo-cars',
            'auto-car' => 'cargo-cars',
            'crane-truck' => 'cargo-cars',
            'car-lift' => 'cargo-cars',
            'cartower' => 'cargo-cars',
            'car-truck' => 'cargo-cars',
            'road-train' => 'cargo-cars',
            'concrete-stacker' => 'cargo-cars',
            'concrete-mixer' => 'cargo-cars',
            'buldozer' => 'cargo-cars',
            'rollers' => 'cargo-cars',
            'cement-trucks' => 'cargo-cars',
            'petrol-fillers' => 'cargo-cars',
            'excavators-crawler' => 'cargo-cars',
            'excavators-wheeled' => 'cargo-cars',
            'excavators' => 'cargo-cars',
            'vans' => 'cargo-cars',
            'gas-trucks' => 'cargo-cars',
            'grader' => 'cargo-cars',
            'loaders-front' => 'cargo-cars',
            'campings' => 'cargo-cars',
            'tree-trucks' => 'cargo-cars',
            'container-trucks' => 'cargo-cars',
            'cranes' => 'cargo-cars',
            'microvans' => 'cargo-cars',
            'mini-trucks' => 'cargo-cars',
            'tip-up-lorry' => 'cargo-cars',
            'trailerss' => 'cargo-cars',
            'milk-trucks' => 'cargo-cars',
            'refrigerators' => 'cargo-cars',
            'scrappers' => 'cargo-cars',
            'lorries' => 'cargo-cars',
            'taxi' => 'cargo-cars',
            'towers' => 'cargo-cars',
            'mini-tractors' => 'cargo-cars',
            'crawler-tractors' => 'cargo-cars',
            'wheeled-tractors' => 'cargo-cars',
            'trailers' => 'cargo-cars',
            'towing-cranes' => 'cargo-cars',
            'off-road-vehicle' => 'cargo-cars',
            'others' => 'cargo-cars',
        ]);
    }

    public function generatePath()
    {
        $this->categorySeeder->clearRoute()
                             ->addRouteFragment('root', 'transport')
                             ->addRouteFragment('transport', 'car')
                             ->addRouteFragment('color')
                             ->addRouteFragment('car')
                             ->createRoute('transport_car_color');

        $this->categorySeeder->clearRoute()
                             ->addRouteFragment('root', 'transport')
                             ->addRouteFragment('transport', 'car')
                             ->addRouteFragment('color')
                             ->addRouteFragment('car', 'bmw')
                             ->addRouteFragment('bmw', )
                             ->createRoute('transport_car_color_bmw');

        $this->categorySeeder->clearRoute()
                             ->addRouteFragment('root', 'transport')
                             ->addRouteFragment('transport', 'cargo-cars')
                             ->addRouteFragment('cargo-cars')
                             ->createRoute('transport_cargo-cars');
    }
}