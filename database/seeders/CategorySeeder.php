<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
	private $insertMany = [];

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->insertMany = [
			'root' => null,
			'transport' => 'root',

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

			'real-estate' => 'root',
			'flats' => ['parent_id' => 'real-estate', 'priority' => 10],
			'homes' => ['parent_id' => 'real-estate', 'priority' => 9],
			'farms' => ['parent_id' => 'real-estate', 'priority' => 8],
			'premises' => ['parent_id' => 'real-estate', 'priority' => 7],
			'offices' => ['parent_id' => 'real-estate', 'priority' => 6],
			'plots-and-lands' => ['parent_id' => 'real-estate', 'priority' => 5],
			'wood' => ['parent_id' => 'real-estate', 'priority' => 4],
			'broker-services' => ['parent_id' => 'real-estate', 'priority' => 3],
			'other' => ['parent_id' => 'real-estate', 'priority' => -1],

			'regions' => null,

			'region-riga' => ['parent_id' => 'regions', 'priority' => 100],
			'region-aluksne' => ['parent_id' => 'regions', 'priority' => 0],
			'region-aizkraukle' => ['parent_id' => 'regions', 'priority' => 0],
			'region-balvi' => ['parent_id' => 'regions', 'priority' => 0],
			'region-bauska' => ['parent_id' => 'regions', 'priority' => 0],
			'region-cesis' => ['parent_id' => 'regions', 'priority' => 0],
			'region-daugavpils' => ['parent_id' => 'regions', 'priority' => 0],
			'region-dobeele' => ['parent_id' => 'regions', 'priority' => 0],
			'region-gulbene' => ['parent_id' => 'regions', 'priority' => 0],
			'region-jekabpils' => ['parent_id' => 'regions', 'priority' => 0],
			'region-jelgava' => ['parent_id' => 'regions', 'priority' => 0],
			'region-kraslava' => ['parent_id' => 'regions', 'priority' => 0],
			'region-kuldiga' => ['parent_id' => 'regions', 'priority' => 0],
			'region-liepaja' => ['parent_id' => 'regions', 'priority' => 0],
			'region-limbazi' => ['parent_id' => 'regions', 'priority' => 0],
			'region-ludza' => ['parent_id' => 'regions', 'priority' => 0],
			'region-madona' => ['parent_id' => 'regions', 'priority' => 0],
			'region-ogre' => ['parent_id' => 'regions', 'priority' => 0],
			'region-preili' => ['parent_id' => 'regions', 'priority' => 0],
			'region-rezekne' => ['parent_id' => 'regions', 'priority' => 0],
			'region-saldu' => ['parent_id' => 'regions', 'priority' => 0],
			'region-talsi' => ['parent_id' => 'regions', 'priority' => 0],
			'region-tukums' => ['parent_id' => 'regions', 'priority' => 0],
			'region-valka' => ['parent_id' => 'regions', 'priority' => 0],
			'region-valmiera' => ['parent_id' => 'regions', 'priority' => 0],
			'region-venspils' => ['parent_id' => 'regions', 'priority' => 0],
			'region-cits' => ['parent_id' => 'regions', 'priority' => -1],
			'region-arpus-lv' => ['parent_id' => 'regions', 'priority' => -2],


			'riga' => ['parent_id' => 'region-riga', 'priority' => 100],
			'marupes-pag' => ['parent_id' => 'region-riga', 'priority' => 0],
			'stopinu-pag' => ['parent_id' => 'region-riga', 'priority' => 0],
			'balozi' => ['parent_id' => 'region-riga', 'priority' => 99],
			'baldone' => ['parent_id' => 'region-riga', 'priority' => 99],
			'salaspils' => ['parent_id' => 'region-riga', 'priority' => 99],
			'vangazi' => ['parent_id' => 'region-riga', 'priority' => 99],
			'sigulda' => ['parent_id' => 'region-riga', 'priority' => 99],
			'saulrasti' => ['parent_id' => 'region-riga', 'priority' => 99],
			'olaine' => ['parent_id' => 'region-riga', 'priority' => 99],
			'adazu-nov' => ['parent_id' => 'region-riga', 'priority' => 0],
			'siguldas-nov' => ['parent_id' => 'region-riga', 'priority' => 0],
			'olaines-nov' => ['parent_id' => 'region-riga', 'priority' => 0],
			'allazu-nov' => ['parent_id' => 'region-riga', 'priority' => 0],


			'centrs' => ['parent_id' => 'riga', 'priority' => 100],
			'agenskalns' => ['parent_id' => 'riga', 'priority' => 0],
			'aplokciems' => ['parent_id' => 'riga', 'priority' => 0],
			'beberbeki' => ['parent_id' => 'riga', 'priority' => 0],
			'berki' => ['parent_id' => 'riga', 'priority' => 0],
			'biekensala' => ['parent_id' => 'riga', 'priority' => 0],
			'bierini' => ['parent_id' => 'riga', 'priority' => 0],
			'bolderaja' => ['parent_id' => 'riga', 'priority' => 0],
			'breksi' => ['parent_id' => 'riga', 'priority' => 0],
			'bukulti' => ['parent_id' => 'riga', 'priority' => 0],
			'bulli' => ['parent_id' => 'riga', 'priority' => 0],
			'ciekurkalns' => ['parent_id' => 'riga', 'priority' => 0],
			'darzciems' => ['parent_id' => 'riga', 'priority' => 0],
			'darzini' => ['parent_id' => 'riga', 'priority' => 0],
			'daugavgriva' => ['parent_id' => 'riga', 'priority' => 0],
			'dreilini' => ['parent_id' => 'riga', 'priority' => 0],
			'dzeguzkalns-dzirciems' => ['parent_id' => 'riga', 'priority' => 0],
			'grizinkalns' => ['parent_id' => 'riga', 'priority' => 0],
			'ilguciems' => ['parent_id' => 'riga', 'priority' => 0],
			'imanta' => ['parent_id' => 'riga', 'priority' => 0],
			'janavarti' => ['parent_id' => 'riga', 'priority' => 0],
			'jaunciems' => ['parent_id' => 'riga', 'priority' => 0],
			'jaunmilgravis' => ['parent_id' => 'riga', 'priority' => 0],
			'jugla' => ['parent_id' => 'riga', 'priority' => 0],
			'katlakalns' => ['parent_id' => 'riga', 'priority' => 0],
			'kengarags' => ['parent_id' => 'riga', 'priority' => 0],
			'kiburga' => ['parent_id' => 'riga', 'priority' => 0],
			'kipsala' => ['parent_id' => 'riga', 'priority' => 0],
			'kleisti' => ['parent_id' => 'riga', 'priority' => 0],
			'kriversala' => ['parent_id' => 'riga', 'priority' => 0],
			'krasta-rajons' => ['parent_id' => 'riga', 'priority' => 0],
			'kremeri' => ['parent_id' => 'riga', 'priority' => 0],
			'kundzinsala' => ['parent_id' => 'riga', 'priority' => 0],
			'lucavsala' => ['parent_id' => 'riga', 'priority' => 0],
			'mangali' => ['parent_id' => 'riga', 'priority' => 0],
			'mangalsala' => ['parent_id' => 'riga', 'priority' => 0],
			'maskavas-priekspilseta' => ['parent_id' => 'riga', 'priority' => 0],
			'mezaparks' => ['parent_id' => 'riga', 'priority' => 0],
			'mezciems' => ['parent_id' => 'riga', 'priority' => 0],
			'ozolciems' => ['parent_id' => 'riga', 'priority' => 0],
			'plavnieki' => ['parent_id' => 'riga', 'priority' => 0],
			'purvciems' => ['parent_id' => 'riga', 'priority' => 0],
			'rumbula' => ['parent_id' => 'riga', 'priority' => 0],
			'sampeteris-pleskodale' => ['parent_id' => 'riga', 'priority' => 0],
			'skirotava' => ['parent_id' => 'riga', 'priority' => 0],
			'stacija-tirgus' => ['parent_id' => 'riga', 'priority' => 0],
			'teika' => ['parent_id' => 'riga', 'priority' => 0],
			'tornkalns' => ['parent_id' => 'riga', 'priority' => 0],
			'trisciems' => ['parent_id' => 'riga', 'priority' => 0],
			'vecaki' => ['parent_id' => 'riga', 'priority' => 0],
			'vevdaugava' => ['parent_id' => 'riga', 'priority' => 0],
			'vecmilgravis' => ['parent_id' => 'riga', 'priority' => 0],
			'vecriga' => ['parent_id' => 'riga', 'priority' => 0],
			'voleri' => ['parent_id' => 'riga', 'priority' => 0],
			'zakusala' => ['parent_id' => 'riga', 'priority' => 0],
			'zasulauks' => ['parent_id' => 'riga', 'priority' => 0],
			'ziepniekkalns' => ['parent_id' => 'riga', 'priority' => 0],
			'zolitude' => ['parent_id' => 'riga', 'priority' => 0],
			'vef' => ['parent_id' => 'riga', 'priority' => 0],
			'cits-riga' => ['parent_id' => 'riga', 'priority' => -1],

			'aluksne' => ['parent_id' => 'region-aluksne', 'priority' => 100],
			'ape' => ['parent_id' => 'region-aluksne', 'priority' => 100],
			'alsviku-pag' => ['parent_id' => 'region-aluksne', 'priority' => 0],
			'annas-pag' => ['parent_id' => 'region-aluksne', 'priority' => 0],
			'apes-lauku-teritorija' => ['parent_id' => 'region-aluksne', 'priority' => 0],
			'gaujienas-pag' => ['parent_id' => 'region-aluksne', 'priority' => 0],
			'ilzenes-pag' => ['parent_id' => 'region-aluksne', 'priority' => 0],
			'jaunaluksnes-pag' => ['parent_id' => 'region-aluksne', 'priority' => 0],
			'jaunannas-pag' => ['parent_id' => 'region-aluksne', 'priority' => 0],
			'jaunlaicenes-pag' => ['parent_id' => 'region-aluksne', 'priority' => 0],
			'kalncempju-pag' => ['parent_id' => 'region-aluksne', 'priority' => 0],
			'liepnas-pag' => ['parent_id' => 'region-aluksne', 'priority' => 0],
			'malienas-pag' => ['parent_id' => 'region-aluksne', 'priority' => 0],
			'malupes-pag' => ['parent_id' => 'region-aluksne', 'priority' => 0],
			'markalnes-pag' => ['parent_id' => 'region-aluksne', 'priority' => 0],
			'pededzes-pag' => ['parent_id' => 'region-aluksne', 'priority' => 0],
			'trapenes-pag' => ['parent_id' => 'region-aluksne', 'priority' => 0],
			'veclaicenes-pag' => ['parent_id' => 'region-aluksne', 'priority' => 0],
			'viresu-pag' => ['parent_id' => 'region-aluksne', 'priority' => 0],
			'zeltinu-pag' => ['parent_id' => 'region-aluksne', 'priority' => 0],
			'ziemeru-pag' => ['parent_id' => 'region-aluksne', 'priority' => 0],
			'cits-aluksnes' => ['parent_id' => 'region-aluksne', 'priority' => -1],

			'aizkraukle' => ['parent_id' => 'region-aizkraukle', 'priority' => 100],
			'jaunjelgava' => ['parent_id' => 'region-aizkraukle', 'priority' => 99],
			'plavinas' => ['parent_id' => 'region-aizkraukle', 'priority' => 99],
			'aiviekstes-pag' => ['parent_id' => 'region-aizkraukle', 'priority' => 0],
			'aizraukles-pag' => ['parent_id' => 'region-aizkraukle', 'priority' => 0],
			'bebru-pag' => ['parent_id' => 'region-aizkraukle', 'priority' => 0],
			'daudzes-pag' => ['parent_id' => 'region-aizkraukle', 'priority' => 0],
			'irsu-pag' => ['parent_id' => 'region-aizkraukle', 'priority' => 0],
			'klintaines-pag' => ['parent_id' => 'region-aizkraukle', 'priority' => 0],
			'kokneses-pag' => ['parent_id' => 'region-aizkraukle', 'priority' => 0],
			'kurmenes-pag' => ['parent_id' => 'region-aizkraukle', 'priority' => 0],
			'mazzalves-pag' => ['parent_id' => 'region-aizkraukle', 'priority' => 0],
			'neretas-pag' => ['parent_id' => 'region-aizkraukle', 'priority' => 0],
			'pilskalnes-pag' => ['parent_id' => 'region-aizkraukle', 'priority' => 0],
			'saces-pag' => ['parent_id' => 'region-aizkraukle', 'priority' => 0],
			'serenes-pag' => ['parent_id' => 'region-aizkraukle', 'priority' => 0],
			'skriveru-pag' => ['parent_id' => 'region-aizkraukle', 'priority' => 0],
			'staburaga-pag' => ['parent_id' => 'region-aizkraukle', 'priority' => 0],
			'sunakstes-pag' => ['parent_id' => 'region-aizkraukle', 'priority' => 0],
			'valles-pag' => ['parent_id' => 'region-aizkraukle', 'priority' => 0],
			'vietalvas-pag' => ['parent_id' => 'region-aizkraukle', 'priority' => 0],
			'zalves-pag' => ['parent_id' => 'region-aizkraukle', 'priority' => 0],
			'cits-aizkraukles' => ['parent_id' => 'region-aizkraukle', 'priority' => 0],


			'bauska' => ['parent_id' => 'region-bauska', 'priority' => 100],
			'barbeles-pag' => ['parent_id' => 'region-bauska', 'priority' => 0],
			'brunavas-pag' => ['parent_id' => 'region-bauska', 'priority' => 0],
			'ceraukstes-pag' => ['parent_id' => 'region-bauska', 'priority' => 0],
			'codes-pag' => ['parent_id' => 'region-bauska', 'priority' => 0],
			'davinu-pag' => ['parent_id' => 'region-bauska', 'priority' => 0],
			'gailisu-pag' => ['parent_id' => 'region-bauska', 'priority' => 0],
			'iecavas-pag' => ['parent_id' => 'region-bauska', 'priority' => 0],
			'islices-pag' => ['parent_id' => 'region-bauska', 'priority' => 0],
			'mezotnes-pag' => ['parent_id' => 'region-bauska', 'priority' => 0],
			'rundales-pag' => ['parent_id' => 'region-bauska', 'priority' => 0],
			'skaistkalnes-pag' => ['parent_id' => 'region-bauska', 'priority' => 0],
			'stelpes-pag' => ['parent_id' => 'region-bauska', 'priority' => 0],
			'svitenes-pag' => ['parent_id' => 'region-bauska', 'priority' => 0],
			'vecsaules-pag' => ['parent_id' => 'region-bauska', 'priority' => 0],
			'vecumnieku-pag' => ['parent_id' => 'region-bauska', 'priority' => 0],
			'viestura-pag' => ['parent_id' => 'region-bauska', 'priority' => 0],
			'cits-bauskas' => ['parent_id' => 'region-bauska', 'priority' => -1],

			'balvi' => ['parent_id' => 'region-balvi', 'priority' => 100],
			'vilaka' => ['parent_id' => 'region-balvi', 'priority' => 99],
			'baltinavas-pag' => ['parent_id' => 'region-balvi', 'priority' => 0],
			'balvu-pag' => ['parent_id' => 'region-balvi', 'priority' => 0],
			'berzkalnes-pag' => ['parent_id' => 'region-balvi', 'priority' => 0],
			'berzpils-pag' => ['parent_id' => 'region-balvi', 'priority' => 0],
			'briezciems-pag' => ['parent_id' => 'region-balvi', 'priority' => 0],
			'krisjanu-pag' => ['parent_id' => 'region-balvi', 'priority' => 0],
			'kubulu-pag' => ['parent_id' => 'region-balvi', 'priority' => 0],
			'kupravas-pag' => ['parent_id' => 'region-balvi', 'priority' => 0],
			'lazdukalna-pag' => ['parent_id' => 'region-balvi', 'priority' => 0],
			'lazdulejas-pag' => ['parent_id' => 'region-balvi', 'priority' => 0],
			'mednevas-pag' => ['parent_id' => 'region-balvi', 'priority' => 0],
			'rugaju-pag' => ['parent_id' => 'region-balvi', 'priority' => 0],
			'skilbenu-pag' => ['parent_id' => 'region-balvi', 'priority' => 0],
			'susaju-pag' => ['parent_id' => 'region-balvi', 'priority' => 0],
			'tilzas-pag' => ['parent_id' => 'region-balvi', 'priority' => 0],
			'veztilzas-pag' => ['parent_id' => 'region-balvi', 'priority' => 0],
			'vezumu-pag' => ['parent_id' => 'region-balvi', 'priority' => 0],
			'viksnas-pag' => ['parent_id' => 'region-balvi', 'priority' => 0],
			'ziguru-pag' => ['parent_id' => 'region-balvi', 'priority' => 0],
			'cits-balvu' => ['parent_id' => 'region-balvi', 'priority' => -1],


			'color' => ['parent_id' => null, 'priority' => 0],
			'red' => ['parent_id' => 'color', 'priority' => 0],
			'blue' => ['parent_id' => 'color', 'priority' => 0],
			'yellow' => ['parent_id' => 'color', 'priority' => 0],
			'brown' => ['parent_id' => 'color', 'priority' => 0],
			'green' => ['parent_id' => 'color', 'priority' => 0],
			'black' => ['parent_id' => 'color', 'priority' => 0],
			'white' => ['parent_id' => 'color', 'priority' => 0],
		];


		foreach ($this->insertMany as $name => &$insert) {

			if (!is_array($insert)) {
				$insert = [
					'name' => $name,
					'parent_id' => $insert,
				];
			}

			$insert['name'] = $name;

			if (!empty($insert['parent_id'])) {
				if ($id = $this->getCategoryIdByName($insert['parent_id'])) {
					$insert['parent_id'] = $id;
				} else {
					$insert['parent_id'] = null;
				}
			}


			$catId = DB::table('categories')->insertGetId($insert);
			$insert['id'] = $catId;
		}


		///////////////////////////////////////////////////////////////////////////////////////
		// path starts here!

		$root_transport_color_car = [
			'root' => [$this->getCategoryIdByName('transport')],
			'color' => $this->getChildrenCategoriesIdsByName('color'),
			'transport' => [$this->getCategoryIdByName('car')],
		];

		$this->createPath('path_1', array_merge($root_transport_color_car, [
			'car' => [$this->getCategoryIdByName('audi')],
			'audi' => $this->getChildrenCategoriesIdsByName('audi'),
		]));

		$this->createPath('path_2', array_merge($root_transport_color_car, [
			'car' => [$this->getCategoryIdByName('bmw')],
			'bmw' => $this->getChildrenCategoriesIdsByName('bmw'),
		]));

		$this->createPath('path_3', array_merge($root_transport_color_car, [
			'car' => [$this->getCategoryIdByName('vw')],
			'vw' => $this->getChildrenCategoriesIdsByName('vw'),
		]));

		// real+++++++++++

		$regionsData = [
			[
				'regions' => [$this->getCategoryIdByName('region-riga')],
				'region-riga' => $this->getChildrenCategoriesIdsByName('region-riga'),
				'riga' => $this->getChildrenCategoriesIdsByName('riga'),
			],
			[
				'regions' => [$this->getCategoryIdByName('region-aluksne')],
				'region-aluksne' => $this->getChildrenCategoriesIdsByName('region-aluksne'),
			],
			[
				'regions' => [$this->getCategoryIdByName('region-balvi')],
				'region-balvi' => $this->getChildrenCategoriesIdsByName('region-balvi'),
			],
			[
				'regions' => [$this->getCategoryIdByName('region-bauska')],
				'region-bauska' => $this->getChildrenCategoriesIdsByName('region-bauska'),
			],
			[
				'regions' => [$this->getCategoryIdByName('region-aizkraukle')],
				'region-aizkraukle' => $this->getChildrenCategoriesIdsByName('region-aizkraukle'),
			],
		];


		foreach ($regionsData as $regions) {
			$data = [];
			$data['root'] = [$this->getCategoryIdByName('real-estate')];
			$data['real-estate'] = $this->getChildrenCategoriesIdsByName('real-estate');
			$counter = 0;
			foreach ($regions as $key => $val) {
					$data[$key] = $val;
			}
			$this->createPath('path_real_flats_', $data);
		}

	}


	private function getCategoryIdByName(string $name)
	{
		return $this->insertMany[$name]['id'] ?? null;

	}

	private function getChildrenCategoriesIdsByName(string $name)
	{
		if (!$id = $this->getCategoryIdByName($name)) {
			return [];
		}

		$return = [];

		foreach ($this->insertMany as $name => $data) {
			if ($id === $data['parent_id']) {
				$return[] = $data['id'];
			}
		}

		return $return;
	}

	private function createPath($name, $data)
	{

//		$data = [
//			'root' => [
//				2, //'transport'
//			],
//			'color' => [
//				4,//'blue',
//				5,//'red',
//			],
//			'transport' => [
//				3,//'car',
//				6,//'lorry',
//			]
//		];

		$pathId = DB::table('paths')->insertGetId([
			'name' => $name,
		]);


		foreach ($data as $keyName => $catIds) {
			// 1.element
			$pathElementId = DB::table('path_elements')->insertGetId([
				'path_id' => $pathId,
				'category_id' => $this->getCategoryIdByName($keyName),
			]);

			foreach ($catIds as $catId) {
				$path_element_should_be_selected_categoriesId = DB::table('path_element_should_be_selected_categories')->insertGetId([
					'path_element_id' => $pathElementId,
					'category_id' => $catId,
				]);
			}
		}


	}


}
