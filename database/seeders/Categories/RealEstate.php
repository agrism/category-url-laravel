<?php


namespace Database\Seeders\Categories;


class RealEstate extends AbstractCategories
{
	public function addData(&$data = [])
	{
		$data = array_merge($data, [

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
			'region-dobele' => ['parent_id' => 'regions', 'priority' => 0],
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
			'pilskalnes-pag-aizkr' => ['parent_id' => 'region-aizkraukle', 'priority' => 0],
			'saces-pag' => ['parent_id' => 'region-aizkraukle', 'priority' => 0],
			'serenes-pag' => ['parent_id' => 'region-aizkraukle', 'priority' => 0],
			'skriveru-pag' => ['parent_id' => 'region-aizkraukle', 'priority' => 0],
			'staburaga-pag' => ['parent_id' => 'region-aizkraukle', 'priority' => 0],
			'sunakstes-pag' => ['parent_id' => 'region-aizkraukle', 'priority' => 0],
			'valles-pag' => ['parent_id' => 'region-aizkraukle', 'priority' => 0],
			'vietalvas-pag' => ['parent_id' => 'region-aizkraukle', 'priority' => 0],
			'zalves-pag' => ['parent_id' => 'region-aizkraukle', 'priority' => 0],
			'cits-aizkraukles' => ['parent_id' => 'region-aizkraukle', 'priority' => -1],

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

			'cesis' => ['parent_id' => 'region-cesis', 'priority' => 100],
			'ligatne' => ['parent_id' => 'region-cesis', 'priority' => 99],
			'amatas-pag' => ['parent_id' => 'region-cesis', 'priority' => 0],
			'drabesu-pag' => ['parent_id' => 'region-cesis', 'priority' => 0],
			'drustu-pag' => ['parent_id' => 'region-cesis', 'priority' => 0],
			'dzerbenes-pag' => ['parent_id' => 'region-cesis', 'priority' => 0],
			'inesu-pag' => ['parent_id' => 'region-cesis', 'priority' => 0],
			'jaunpiebalgas-pag' => ['parent_id' => 'region-cesis', 'priority' => 0],
			'kaives-pag' => ['parent_id' => 'region-cesis', 'priority' => 0],
			'liepas-pag' => ['parent_id' => 'region-cesis', 'priority' => 0],
			'ligatnes-pag' => ['parent_id' => 'region-cesis', 'priority' => 0],
			'marsenu-pag' => ['parent_id' => 'region-cesis', 'priority' => 0],
			'nitaures-pag' => ['parent_id' => 'region-cesis', 'priority' => 0],
			'priekulu-pag' => ['parent_id' => 'region-cesis', 'priority' => 0],
			'raiskuma-pag' => ['parent_id' => 'region-cesis', 'priority' => 0],
			'raunas-pag' => ['parent_id' => 'region-cesis', 'priority' => 0],
			'skujenes-pag' => ['parent_id' => 'region-cesis', 'priority' => 0],
			'stalbes-pag' => ['parent_id' => 'region-cesis', 'priority' => 0],
			'straupes-pag' => ['parent_id' => 'region-cesis', 'priority' => 0],
			'taurenes-pag' => ['parent_id' => 'region-cesis', 'priority' => 0],
			'vaives-pag' => ['parent_id' => 'region-cesis', 'priority' => 0],
			'vecpiebalgas-pag' => ['parent_id' => 'region-cesis', 'priority' => 0],
			'veselavas-pag' => ['parent_id' => 'region-cesis', 'priority' => 0],
			'zaubes-pag' => ['parent_id' => 'region-cesis', 'priority' => 0],
			'zosenu-pag' => ['parent_id' => 'region-cesis', 'priority' => 0],
			'cits-cesis' => ['parent_id' => 'region-cesis', 'priority' => 0],

			'daugavpils' => ['parent_id' => 'region-daugavpils', 'priority' => 100],
			'ilukste' => ['parent_id' => 'region-daugavpils', 'priority' => 99],
			'subate' => ['parent_id' => 'region-daugavpils', 'priority' => 98],
			'ambelu-pag' => ['parent_id' => 'region-daugavpils', 'priority' => 0],
			'abrenes-pag' => ['parent_id' => 'region-daugavpils', 'priority' => 0],
			'bikernieku-pag' => ['parent_id' => 'region-daugavpils', 'priority' => 0],
			'demenes-pag' => ['parent_id' => 'region-daugavpils', 'priority' => 0],
			'dubnas-pag' => ['parent_id' => 'region-daugavpils', 'priority' => 0],
			'dvietes-pag' => ['parent_id' => 'region-daugavpils', 'priority' => 0],
			'eglaines-pag' => ['parent_id' => 'region-daugavpils', 'priority' => 0],
			'kalkunes-pag' => ['parent_id' => 'region-daugavpils', 'priority' => 0],
			'kalupes-pag' => ['parent_id' => 'region-daugavpils', 'priority' => 0],
			'laucesas-pag' => ['parent_id' => 'region-daugavpils', 'priority' => 0],
			'liksnas-pag' => ['parent_id' => 'region-daugavpils', 'priority' => 0],
			'malinovas-pag' => ['parent_id' => 'region-daugavpils', 'priority' => 0],
			'medumu-pag' => ['parent_id' => 'region-daugavpils', 'priority' => 0],
			'naujienes-pag' => ['parent_id' => 'region-daugavpils', 'priority' => 0],
			'nicgales-pag' => ['parent_id' => 'region-daugavpils', 'priority' => 0],
			'pilskalnes-pag-daugavpils' => ['parent_id' => 'region-daugavpils', 'priority' => 0],
			'salienas-pag' => ['parent_id' => 'region-daugavpils', 'priority' => 0],
			'sederes-pag' => ['parent_id' => 'region-daugavpils', 'priority' => 0],
			'skrundlienas-pag' => ['parent_id' => 'region-daugavpils', 'priority' => 0],
			'subatas-lauku-teritotorija' => ['parent_id' => 'region-daugavpils', 'priority' => 0],
			'sventes-pag' => ['parent_id' => 'region-daugavpils', 'priority' => 0],
			'tabores-pag' => ['parent_id' => 'region-daugavpils', 'priority' => 0],
			'vaboles-pag' => ['parent_id' => 'region-daugavpils', 'priority' => 0],
			'vecalienas-pag' => ['parent_id' => 'region-daugavpils', 'priority' => 0],
			'visku-pag' => ['parent_id' => 'region-daugavpils', 'priority' => 0],
			'cits-daugavpils' => ['parent_id' => 'region-daugavpils', 'priority' => -1],


			'auce' => ['parent_id' => 'region-dobele', 'priority' => 100],
			'dobele' => ['parent_id' => 'region-dobele', 'priority' => 100],
			'annenieku-pag' => ['parent_id' => 'region-dobele', 'priority' => 0],
			'auces-lauku-teritorija' => ['parent_id' => 'region-dobele', 'priority' => 0],
			'augstkalnes-pag' => ['parent_id' => 'region-dobele', 'priority' => 0],
			'auru-pag' => ['parent_id' => 'region-dobele', 'priority' => 0],
			'benes-pag' => ['parent_id' => 'region-dobele', 'priority' => 0],
			'berzu-pag' => ['parent_id' => 'region-dobele', 'priority' => 0],
			'bikstu-pag' => ['parent_id' => 'region-dobele', 'priority' => 0],
			'bukaisu-pag' => ['parent_id' => 'region-dobele', 'priority' => 0],
			'dobeles-pag' => ['parent_id' => 'region-dobele', 'priority' => 0],
			'iles-pag' => ['parent_id' => 'region-dobele', 'priority' => 0],
			'jaunberzes-pag' => ['parent_id' => 'region-dobele', 'priority' => 0],
			'krimunu-pag' => ['parent_id' => 'region-dobele', 'priority' => 0],
			'lielauces-pag' => ['parent_id' => 'region-dobele', 'priority' => 0],
			'naudites-pag' => ['parent_id' => 'region-dobele', 'priority' => 0],
			'penkules-pag' => ['parent_id' => 'region-dobele', 'priority' => 0],
			'tervetes-pag' => ['parent_id' => 'region-dobele', 'priority' => 0],
			'ukru-pag' => ['parent_id' => 'region-dobele', 'priority' => 0],
			'vitinu-pag' => ['parent_id' => 'region-dobele', 'priority' => 0],
			'zebrenes-pag' => ['parent_id' => 'region-dobele', 'priority' => 0],
			'cits-dobeles' => ['parent_id' => 'region-dobele', 'priority' => -1],


			// - rooms

		]);
	}

	public function generatePath()
	{
        $this->categorySeeder->clearRoute()
                             ->addRouteFragment('root', 'real-estate')
                             ->addRouteFragment('real-estate', 'flats')
                             ->addRouteFragment('flat-series')
                             ->addRouteFragment('rooms')
                             ->addRouteFragment('regions')
                             ->createRoute('real_flats_regions');

        $this->categorySeeder->clearRoute()
                             ->addRouteFragment('root', 'real-estate')
                             ->addRouteFragment('real-estate', 'flats')
                             ->addRouteFragment('flat-series')
                             ->addRouteFragment('rooms')
                             ->addRouteFragment('regions', 'region-riga')
                             ->addRouteFragment('region-riga')
                             ->createRoute('real_flats_regions_riga');

        $this->categorySeeder->clearRoute()
                             ->addRouteFragment('root', 'real-estate')
                             ->addRouteFragment('real-estate', 'flats')
                             ->addRouteFragment('flat-series')
                             ->addRouteFragment('rooms')
                             ->addRouteFragment('regions', 'region-riga')
                             ->addRouteFragment('region-riga', 'riga')
                             ->addRouteFragment('riga')
                             ->createRoute('real_flats_regions_riga_riga');

        $this->categorySeeder->clearRoute()
                             ->addRouteFragment('root', 'real-estate')
                             ->addRouteFragment('real-estate', 'homes')
                             ->addRouteFragment('regions', null)
                             ->createRoute('real_homes_regions');

        $this->categorySeeder->clearRoute()
                             ->addRouteFragment('root', 'real-estate')
                             ->addRouteFragment('real-estate', 'homes')
                             ->addRouteFragment('regions', 'region-riga')
                             ->addRouteFragment('region-riga', null)
                             ->createRoute('real_homes_regions_riga');

        $this->categorySeeder->clearRoute()
                             ->addRouteFragment('root', 'real-estate')
                             ->addRouteFragment('real-estate', 'homes')
                             ->addRouteFragment('regions', 'region-riga')
                             ->addRouteFragment('region-riga', 'riga')
                             ->addRouteFragment('riga',)
                             ->createRoute('real_homes_regions_riga_distr');
	}
}