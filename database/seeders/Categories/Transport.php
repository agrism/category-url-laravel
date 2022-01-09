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


            'lorry' => 'transport',
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
    }
}