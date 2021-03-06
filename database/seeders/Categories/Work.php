<?php


namespace Database\Seeders\Categories;


class Work extends AbstractCategories
{
	public function addData(&$data = [])
	{
		$data = array_merge($data, [
			'are-required' => ['parent_id' => 'work', 'priority' => 10],
			'i-search-for-work' => ['parent_id' => 'work', 'priority' => 9],
			'courses-education' => ['parent_id' => 'work', 'priority' => 8],
			'business-contacts' => ['parent_id' => 'work', 'priority' => 7],
			'legal-services' => ['parent_id' => 'work', 'priority' => 6],
			'finances' => ['parent_id' => 'work', 'priority' => 5],
			'text-translations' => ['parent_id' => 'work', 'priority' => 4],
			'internet-services' => ['parent_id' => 'work', 'priority' => 3],
			'other-work' => ['parent_id' => 'work', 'priority' => 2],
		]);

		$data = array_merge($data, [
			'vacancy' => null,
		]);

		$data = array_merge($data, [
			'Adītāja' => 'vacancy',
			'Administrātors' => 'vacancy',
			'Advokāts' => 'vacancy',
			'Aģents' => 'vacancy',
			'Agronoms' => 'vacancy',
			'Aktieris' => 'vacancy',
			'Alpīnists' => 'vacancy',
			'Analītiķis' => 'vacancy',
			'Aparātu uzraugs' => 'vacancy',
			'Apdrošināšanas aģents' => 'vacancy',
			'Apkopēja' => 'vacancy',
			'Apmetējs' => 'vacancy',
			'Apsargs' => 'vacancy',
			'Arhitekts' => 'vacancy',
			'Arhivārs' => 'vacancy',
			'Ārsta palīgs' => 'vacancy',
			'Ārsts' => 'vacancy',
			'Asistents' => 'vacancy',
			'Atslēdznieks' => 'vacancy',
			'Aukle' => 'vacancy',
			'Autoatslēdznieks' => 'vacancy',
			'Autoceltņa vadītājs' => 'vacancy',
			'Autoelektriķis' => 'vacancy',
			'Autokrāsotājs' => 'vacancy',
			'Automazgātājs' => 'vacancy',
			'Automehāniķis' => 'vacancy',
			'Autoservisa meistars' => 'vacancy',
			'Autoskārdnieks' => 'vacancy',
			'Autovadītājs' => 'vacancy',
			'Aviācijas speciālists' => 'vacancy',
			'Bārmenis' => 'vacancy',
			'Betonētājs' => 'vacancy',
			'Brigadieris' => 'vacancy',
			'Bruģētājs' => 'vacancy',
			'Bufetnieks' => 'vacancy',
			'Buldozerists' => 'vacancy',
			'Celtņa vadītājs' => 'vacancy',
			'Celtnieks' => 'vacancy',
			'Darbu vadītājs' => 'vacancy',
			'Dārznieks' => 'vacancy',
			'Datortehniķis' => 'vacancy',
			'Datortīklu administrators' => 'vacancy',
			'Datu aizsardzības speciālists' => 'vacancy',
			'Dejotāja' => 'vacancy',
			'Dejotājs' => 'vacancy',
			'Deklarants' => 'vacancy',
			'Dežurants' => 'vacancy',
			'Direktors' => 'vacancy',
			'Dispečers' => 'vacancy',
			'Dizainers' => 'vacancy',
			'Ekonomists' => 'vacancy',
			'Ekskavatorists' => 'vacancy',
			'Ekspeditors' => 'vacancy',
			'Elektriķis' => 'vacancy',
			'Elektromehāniķis' => 'vacancy',
			'Elektrometinātājs' => 'vacancy',
			'Farmaceits' => 'vacancy',
			'Fasētājs' => 'vacancy',
			'Filologs' => 'vacancy',
			'Finanšu analītiķis' => 'vacancy',
			'Flīžu licējs' => 'vacancy',
			'Florists' => 'vacancy',
			'Fotogrāfs' => 'vacancy',
			'Fotomodelis' => 'vacancy',
			'Frēzētājs' => 'vacancy',
			'Frizieris' => 'vacancy',
			'Galdnieks' => 'vacancy',
			'Gids' => 'vacancy',
			'Grāmatvedis' => 'vacancy',
			'Iestatītājs' => 'vacancy',
			'Ievācējs' => 'vacancy',
			'Instruktors' => 'vacancy',
			'Inženieris' => 'vacancy',
			'Istabene' => 'vacancy',
			'Jumiķis' => 'vacancy',
			'Jurists' => 'vacancy',
			'Jūrnieks' => 'vacancy',
			'Juvelieris' => 'vacancy',
			'Kalējs' => 'vacancy',
			'Kapteinis' => 'vacancy',
			'Kasieris' => 'vacancy',
			'Konditors' => 'vacancy',
			'Konstruktors' => 'vacancy',
			'Konsultants' => 'vacancy',
			'Kontrolieris' => 'vacancy',
			'Kopiraiters' => 'vacancy',
			'Korektors' => 'vacancy',
			'Kosmetologs' => 'vacancy',
			'Krāšņu mūrnieks' => 'vacancy',
			'Krāsotājs' => 'vacancy',
			'Krāvējs' => 'vacancy',
			'Krupjē' => 'vacancy',
			'Kurjers' => 'vacancy',
			'Kurpnieks' => 'vacancy',
			'Laborants' => 'vacancy',
			'Lakotājs' => 'vacancy',
			'Lietvedis' => 'vacancy',
			'Loģistiķis' => 'vacancy',
			'Logu meistars' => 'vacancy',
			'Lopkopis' => 'vacancy',
			'Māceklis' => 'vacancy',
			'Maiznieks' => 'vacancy',
			'Mājkalpotāja' => 'vacancy',
			'Maketētājs' => 'vacancy',
			'Mākleris' => 'vacancy',
			'Mākslinieks' => 'vacancy',
			'Manikīre' => 'vacancy',
			'Masieris' => 'vacancy',
			'Matrozis' => 'vacancy',
			'Mazgātājs' => 'vacancy',
			'Mēbeļmeistars' => 'vacancy',
			'Medmāsa' => 'vacancy',
			'Mehāniķis' => 'vacancy',
			'Meliorators' => 'vacancy',
			'Menedžeris' => 'vacancy',
			'Mērnieks' => 'vacancy',
			'Metinātājs' => 'vacancy',
			'Mežstrādnieks' => 'vacancy',
			'Miesnieks' => 'vacancy',
			'Modelis' => 'vacancy',
			'Montētājs' => 'vacancy',
			'Mūrnieks' => 'vacancy',
			'Mūziķis' => 'vacancy',
			'Namdaris' => 'vacancy',
			'Nekust. īpaš. aģents' => 'vacancy',
			'Noformētājs' => 'vacancy',
			'Noliktavas pārzinis' => 'vacancy',
			'Novērtētājs' => 'vacancy',
			'Operators' => 'vacancy',
			'Ostas strādnieks' => 'vacancy',
			'Palīgs' => 'vacancy',
			'Palīgstrādnieki' => 'vacancy',
			'Pārdevējs' => 'vacancy',
			'Pārzinis' => 'vacancy',
			'Pasniedzējs' => 'vacancy',
			'Pavārs' => 'vacancy',
			'Pedagogs' => 'vacancy',
			'Personāla vadītājs' => 'vacancy',
			'Pirtnieks' => 'vacancy',
			'Portjē, šveicars' => 'vacancy',
			'Prečzinis' => 'vacancy',
			'Programmētājs' => 'vacancy',
			'Psihologs' => 'vacancy',
			'Radioinženieris' => 'vacancy',
			'Redaktors' => 'vacancy',
			'Referents' => 'vacancy',
			'Reklāmas aģents' => 'vacancy',
			'Reklāmas menedžeris' => 'vacancy',
			'Riepu montētājs' => 'vacancy',
			'Sagādnieks' => 'vacancy',
			'Saiņotājs' => 'vacancy',
			'Santehniķis' => 'vacancy',
			'Šefpavārs' => 'vacancy',
			'Sekretārs' => 'vacancy',
			'Sētnieks' => 'vacancy',
			'Sietspiedējs' => 'vacancy',
			'Skārdnieks' => 'vacancy',
			'Šķirotājs' => 'vacancy',
			'Skolotājs' => 'vacancy',
			'Skroderis' => 'vacancy',
			'Slaucēja' => 'vacancy',
			'Slimnieku kopēja' => 'vacancy',
			'Sociālais darbinieks' => 'vacancy',
			'Speciālists' => 'vacancy',
			'Stiegrotājs' => 'vacancy',
			'Stiklinieks' => 'vacancy',
			'Stjuarts' => 'vacancy',
			'Stomatologs' => 'vacancy',
			'Strādnieks' => 'vacancy',
			'Striptīza dejotāja' => 'vacancy',
			'Students' => 'vacancy',
			'Šuvēja' => 'vacancy',
			'Tāmju sastādītājs' => 'vacancy',
			'Tehniķis' => 'vacancy',
			'Tehnologs' => 'vacancy',
			'Tekstu ievadītājs' => 'vacancy',
			'Testētājs' => 'vacancy',
			'Tipogrāfijas darbinieks' => 'vacancy',
			'Traktorists' => 'vacancy',
			'Trauku mazgātājs' => 'vacancy',
			'Treneris' => 'vacancy',
			'Tulks' => 'vacancy',
			'Tūroperators' => 'vacancy',
			'Veterinārārsts' => 'vacancy',
			'Viesmīlis' => 'vacancy',
			'Virpotājs' => 'vacancy',
			'Vizāžists' => 'vacancy',
			'Vokālists' => 'vacancy',
			'Zāģētājs' => 'vacancy',
			'Zivju apstrādātājs' => 'vacancy',
			'Žurnālists' => 'vacancy',
			'Zvejnieks' => 'vacancy',
			'Linux administrators' => 'vacancy',
			'Web dizaineris' => 'vacancy',
			'Citas profesijas' => ['parent_id' => 'vacancy', 'priority' => -1],
		]);

		$data = array_merge($data, [
			'Ainavu dizaineru kursi' => ['parent_id' => 'courses-education', 'priority' => 0],
			'Aktiermākslas kursi' => ['parent_id' => 'courses-education', 'priority' => 0],
			'Apmācība ārzemēs' => ['parent_id' => 'courses-education', 'priority' => 0],
			'Apsargu kursi' => ['parent_id' => 'courses-education', 'priority' => 0],
			'Aukļu, mājkalpotāju kursi' => ['parent_id' => 'courses-education', 'priority' => 0],
			'Autovadīšanas kursi' => ['parent_id' => 'courses-education', 'priority' => 0],
			'Datorapmācības kursi' => ['parent_id' => 'courses-education', 'priority' => 0],
			'Dejas' => ['parent_id' => 'courses-education', 'priority' => 0],
			'Floristu kursi' => ['parent_id' => 'courses-education', 'priority' => 0],
			'Frizieru kursi' => ['parent_id' => 'courses-education', 'priority' => 0],
			'Grāmatvedības kursi' => ['parent_id' => 'courses-education', 'priority' => 0],
			'Interjera dizaineru kursi' => ['parent_id' => 'courses-education', 'priority' => 0],
			'Kvalifikācijas paaugstināšanas kursi' => ['parent_id' => 'courses-education', 'priority' => 0],
			'Manikīra, pedikīra kursi' => ['parent_id' => 'courses-education', 'priority' => 0],
			'Muzikālā apmācība un dziedāšana' => ['parent_id' => 'courses-education', 'priority' => 0],
			'Pavāru&nbsp;un konditoru kursi' => ['parent_id' => 'courses-education', 'priority' => 0],
			'Pilotu kursi' => ['parent_id' => 'courses-education', 'priority' => 0],
			'Profesionālie kursi' => ['parent_id' => 'courses-education', 'priority' => 0],
			'Psiholoģijas kursi' => ['parent_id' => 'courses-education', 'priority' => 0],
			'Semināri un treniņi' => ['parent_id' => 'courses-education', 'priority' => 0],
			'Sporta apmācība' => ['parent_id' => 'courses-education', 'priority' => 0],
			'Stilistu, vizāžistu kursi' => ['parent_id' => 'courses-education', 'priority' => 0],
			'Šūšanas un&nbsp;rokdarbu kursi' => ['parent_id' => 'courses-education', 'priority' => 0],
			'Valodu kursi' => ['parent_id' => 'courses-education', 'priority' => 0],
			'Cits' => ['parent_id' => 'courses-education', 'priority' => 0],
			'Kursa darbi, referāti, diplomdarbi' => ['parent_id' => 'courses-education', 'priority' => 0],
			'Repetitora pakalpojumi' => ['parent_id' => 'courses-education', 'priority' => 0],
			'Bērniem' => ['parent_id' => 'courses-education', 'priority' => 0],
			'Sports' => ['parent_id' => 'courses-education', 'priority' => 0],
		]);

		$data = array_merge($data, [
			'Biznesa, kompāniju pārdošana' => ['parent_id' => 'business-contacts', 'priority' => 0],
			'Dīleru, mazumtirdzniecības izplatītāju meklēšana' => ['parent_id' => 'business-contacts', 'priority' => 0],
			'Ekspertīzes un novērtējums' => ['parent_id' => 'business-contacts', 'priority' => 0],
			'Investora meklēšana' => ['parent_id' => 'business-contacts', 'priority' => 0],
			'Izplatītāju meklēšana' => ['parent_id' => 'business-contacts', 'priority' => 0],
			'Izsoļu rīkošana' => ['parent_id' => 'business-contacts', 'priority' => 0],
			'Oficiālie kompāniju ziņojumi' => ['parent_id' => 'business-contacts', 'priority' => 0],
			'Partneru meklēšana' => ['parent_id' => 'business-contacts', 'priority' => 0],
			'Poligrāfija un prese' => ['parent_id' => 'business-contacts', 'priority' => 0],
			'Reklāma' => ['parent_id' => 'business-contacts', 'priority' => 0],
			'Vizītkartes, suvenīri, uzlīmes' => ['parent_id' => 'business-contacts', 'priority' => 0],
			'Zīmogi, spiedogi, plombas' => ['parent_id' => 'business-contacts', 'priority' => 0],
			'Dažādi' => ['parent_id' => 'business-contacts', 'priority' => 0],
			'Celtniecība' => ['parent_id' => 'business-contacts', 'priority' => 0],
			'Grāmatvedības pakalpojumi' => ['parent_id' => 'business-contacts', 'priority' => 0],
			'Parādu atgriešana' => ['parent_id' => 'business-contacts', 'priority' => 0],
			'Uzņēmumu reģistrācija' => ['parent_id' => 'business-contacts', 'priority' => 0],
		]);

		$data = array_merge($data, [
			'Administratīvās lietas' => ['parent_id' => 'legal-services', 'priority' => 0],
			'Civillietas' => ['parent_id' => 'legal-services', 'priority' => 0],
			'Ekspertīzes un novērtēšana' => ['parent_id' => 'legal-services', 'priority' => 0],
			'Ģimenes tiesības' => ['parent_id' => 'legal-services', 'priority' => 0],
			'Grāmatvedības pakalpojumi' => ['parent_id' => 'legal-services', 'priority' => 0],
			'Krimināllietas' => ['parent_id' => 'legal-services', 'priority' => 0],
			'Līdzdalība darijumos' => ['parent_id' => 'legal-services', 'priority' => 0],
			'Notāra pakalpojumi' => ['parent_id' => 'legal-services', 'priority' => 0],
			'Parādu atgriešana' => ['parent_id' => 'legal-services', 'priority' => 0],
			'Uzņēmumu juridiskā apkalpošana' => ['parent_id' => 'legal-services', 'priority' => 0],
			'Uzņēmumu reģistrācija' => ['parent_id' => 'legal-services', 'priority' => 0],
			'Vīzu un dokumentu noformēšana' => ['parent_id' => 'legal-services', 'priority' => 0],
			'Cits' => ['parent_id' => 'legal-services', 'priority' => -1],
		]);

		$data = array_merge($data, [
			'Apdrošināšana' => ['parent_id' => 'finances', 'priority' => 0],
			'Audits, aktīvu novērtējums' => ['parent_id' => 'finances', 'priority' => 0],
			'Grāmatvedības pakalpojumi' => ['parent_id' => 'finances', 'priority' => 0],
			'Kredīti un līzings' => ['parent_id' => 'finances', 'priority' => 0],
			'Nodokļu un finanšu konsultācijas' => ['parent_id' => 'finances', 'priority' => 0],
			'Dažādi' => ['parent_id' => 'finances', 'priority' => 0],
		]);

		$data = array_merge($data, [
			'Angļu' => ['parent_id' => 'text-translations', 'priority' => 0],
			'Franču' => ['parent_id' => 'text-translations', 'priority' => 0],
			'Igauņu' => ['parent_id' => 'text-translations', 'priority' => 0],
			'Itāļu' => ['parent_id' => 'text-translations', 'priority' => 0],
			'Krievu' => ['parent_id' => 'text-translations', 'priority' => 0],
			'Latviešu' => ['parent_id' => 'text-translations', 'priority' => 0],
			'Lietuviešu' => ['parent_id' => 'text-translations', 'priority' => 0],
			'Norvēģu' => ['parent_id' => 'text-translations', 'priority' => 0],
			'Poļu' => ['parent_id' => 'text-translations', 'priority' => 0],
			'Spāņu' => ['parent_id' => 'text-translations', 'priority' => 0],
			'Vācu' => ['parent_id' => 'text-translations', 'priority' => 0],
			'Zviedru' => ['parent_id' => 'text-translations', 'priority' => 0],
			'Citas valodas' => ['parent_id' => 'text-translations', 'priority' => 0],
			'Ortogrāfijas pārbaude' => ['parent_id' => 'text-translations', 'priority' => 0],
			'Dažādi' => ['parent_id' => 'text-translations', 'priority' => -1],
		]);

		$data = array_merge($data, [
			'Administrēšana' => ['parent_id' => 'internet-services', 'priority' => 0],
			'Domēnu pārdošana' => ['parent_id' => 'internet-services', 'priority' => 0],
			'Domēnu reģistrācija' => ['parent_id' => 'internet-services', 'priority' => 0],
			'Hostings' => ['parent_id' => 'internet-services', 'priority' => 0],
			'Interneta pieslēgšana' => ['parent_id' => 'internet-services', 'priority' => 0],
			'Web-dizains un saitu izstrāde' => ['parent_id' => 'internet-services', 'priority' => 0],
			'Dažādi' => ['parent_id' => 'internet-services', 'priority' => -1],
		]);
	}

	public function generatePath()
	{
        $this->categorySeeder->clearRoute()
                             ->addRouteFragment('root', 'work')
                             ->addRouteFragment('work', 'are-required')
                             ->addRouteFragment('vacancy')
                             ->createRoute('root_work_are-required');

        $this->categorySeeder->clearRoute()
                             ->addRouteFragment('root', 'work')
                             ->addRouteFragment('work', 'i-search-for-work')
                             ->addRouteFragment('vacancy')
                             ->createRoute('root_work_i-search-for-work');

        $this->categorySeeder->clearRoute()
                             ->addRouteFragment('root', 'work')
                             ->addRouteFragment('work', 'courses-education')
                             ->addRouteFragment('courses-education')
                             ->createRoute('root_work_courses-education');

        $this->categorySeeder->clearRoute()
                             ->addRouteFragment('root', 'work')
                             ->addRouteFragment('work', 'business-contacts')
                             ->addRouteFragment('business-contacts')
                             ->createRoute('root_work_business-contacts');

        $this->categorySeeder->clearRoute()
                             ->addRouteFragment('root', 'work')
                             ->addRouteFragment('work', 'legal-services')
                             ->addRouteFragment('legal-services')
                             ->createRoute('root_work_legal-services');

        $this->categorySeeder->clearRoute()
                             ->addRouteFragment('root', 'work')
                             ->addRouteFragment('work', 'finances')
                             ->addRouteFragment('finances')
                             ->createRoute('root_work_finances');

        $this->categorySeeder->clearRoute()
                             ->addRouteFragment('root', 'work')
                             ->addRouteFragment('work', 'text-translations')
                             ->addRouteFragment('text-translations')
                             ->createRoute('root_work_text-translations');

        $this->categorySeeder->clearRoute()
                             ->addRouteFragment('root', 'work')
                             ->addRouteFragment('work', 'internet-services')
                             ->addRouteFragment('internet-services')
                             ->createRoute('root_work_internet-services');

        $this->categorySeeder->clearRoute()
                             ->addRouteFragment('root', 'work')
                             ->addRouteFragment('work', 'other-work')
                             ->createRoute('root_work_other-work');
	}
}