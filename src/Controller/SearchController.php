<?php
declare(strict_types=1);

namespace App\Controller;
use App\Controller\AppController;
use Cake\Http\Exception\NotFoundException;

class SearchController extends AppController
{
    public function initialize() : void
    {
		parent::initialize();

        // Load models for being able to access their data.
        $this->loadModel('Persons');
        $this->loadModel('Companies');
        $this->loadModel('Profession');
	}

    /**
     * Index method. Redirects to the query method
     * of this controller.
     *
     * @return
     */
    public function index()
    {
		return $this->redirect([
			'controller' => 'Search',
			'action' => 'query'
		]);
    }

    /**
     * Funtion rendering a search form view. Before rendering the view,
     * it loads all fields from the database containing preset selectable
     * values and transfers it to the view.
     */
    public function query()
    {
		$arrondissements = $this->Persons->Addresses->Streets->Arrondissements->find();
		$categories = $this->Persons->ProfCategories->find();
		$militaryStatuses = $this->Persons->MilitaryStatuses->find();
		$occupationStatuses = $this->Persons->OccupationStatuses->find();
		$persons = $this->Persons->find();
		$ranks = $this->Persons->LdhRanks->find();
		$socialStatuses = $this->Persons->SocialStatuses->find();

		$this->set(compact(
			'arrondissements',
			'categories',
			'militaryStatuses',
			'occupationStatuses',
			'persons',
			'ranks',
			'socialStatuses'
		));
	}

    /**
     * Function executing a database search with the given parameters
     * and rendering a view containing all results.
     */
    public function results()
    {
        // Initial loading of the persons, companies and all their necessary fields
        $persons = $this->Persons->find()
            ->contain([
                'LdhRanks',
                'MilitaryStatuses',
                'SocialStatuses',
                'OccupationStatuses',
                'Addresses.Streets.Arrondissements',
                'ExternalReferences.ReferenceTypes',
                'OriginalReferences',
                'ProfCategories',
                'Companies',
                'Profession',
            ]);

        $companies = $this->Companies->find()
            ->contain([
                'Persons',
                'Addresses.Streets.Arrondissements',
                'ExternalReferences.ReferenceTypes',
                'OriginalReferences',
                'ProfCategories',
                'Profession',
            ]);
        
            $total1 = $this->Persons->find()
            ->count();
            $total2 = $this->Companies->find()
            ->count();
        // Perform a search according to the given search type (simple or detailed)
        switch ($this->request->getQuery('type')) {
            case 'simp':
                $this->simpleSearch($persons, $companies);
            break;

            case 'det':
                $this->detailedSearch($persons, $companies);
            break;
        }

        // Order the results alphabetically ascending by their names
		$persons->order(['Persons.surname' => 'ASC']);
        $companies->order(['Companies.name' => 'ASC']);

        $format = $this->request->getQuery('export');
        if(!empty($format)){
            $format = strtolower($format);
        }
        $formats = [
            'xml' => 'Xml',
            'json' => 'Json'
        ];

        // Paginate if download is not requested
        // Note: This checking for download is important, since the download will
        // only return the results of the first page if the results have been paginated!
        if(empty($format) || !isset($formats[$format])){
            $this->paginate($persons, ['scope' => 'Persons']);
            $this->paginate($companies, ['scope' => 'Companies']);
        }
        $this->paginate($persons, ['scope' => 'Persons']);
        $this->paginate($companies, ['scope' => 'Companies']);
        $this->set(compact('persons', 'companies', 'total1', 'total2'));
	}

	/**
     * Simple search function. Takes the query param 'text' as input
     * and looks for database entries containing all tokens of the
     * query. Only the following fields are searched:
     * - Persons.surname
     * - Persons.first_name
     * - Persons.title
     * - Persons.name_predicate
     * - Companies.name
     * - profession_verbatim (for persons and companies)
     * - specification_verbatim (for persons and companies)
     * - Streets.name_old_clean
     * - Streets.name_new
     * - Addresses.address_specification_verbatim
     *
     * Note: If no query text (= only non-word characters) has been entered, this
     * function will return without filtering the initial queryObjects at all,
     * causing the results to be the entire database!!! (To change this uncomment the marked lines)
     *
     * The function params are passed by value (&), so that they are changed and
     * remain changed without having to explicitly return and reassign them.
     *
     * @param $persons An initial queryObject containing all persons with the needed fields of person
     * @param $companies An initial queryObject containing all companies with the needed fields of company
     */
    private function simpleSearch(&$persons, &$companies)
    {
		$text = $this->request->getQuery('text');

		// Check if the submitted form input contains word characters. If not, return without modifying the results.
        if(!isset($text) || preg_match('/\w/', $text) === 0) return;

        // UNCOMMENT these lines instead of the above ones if you want to return zero results for an empty query text:
        // if(!isset($text) || preg_match('/\w/', $text) === 0){
        //     $persons->where(['Persons.id' => 0]);
        //     $companies->where(['Companies.id' => 0]);
        // }

		// Split the text around any number of commas, points and whitespaces
		$tokens = preg_split('/[,.\s]+/', $text);

		// For each token
		// Search for persons/companies that contain the current token in either one of the specified data base fields
		foreach($tokens as $token){

			$persons
				->leftJoinWith('Addresses')
				->leftJoinWith('Addresses.Streets')
                ->leftJoinWith('Profession')
				->where([
					'OR' => [
						['Persons.surname LIKE' => '%'.$token.'%'],
						['Persons.first_name LIKE' => '%'.$token.'%'],
						['Persons.zusatz LIKE' => '%'.$token.'%'],
                        ['Profession.norm LIKE' => '%'.$token.'%'],
                        ['Profession.profession_verbatim LIKE' => '%'.$token.'%'],
						['Persons.specification_verbatim LIKE' => '%'.$token.'%'],
						['Persons.name_predicate LIKE' => '%'.$token.'%'],
						['Streets.name_old_clean LIKE' => '%'.$token.'%'],
						['Streets.name_new LIKE' => '%'.$token.'%'],
						['Addresses.address_specification_verbatim LIKE' => '%'.$token.'%']
					]
				])
				->group('Persons.id');

			$companies
				->leftJoinWith('Addresses')
				->leftJoinWith('Addresses.Streets')
                ->innerJoinWith('Profession')
				->where([
					'OR' => [
						['Companies.name LIKE' => '%'.$token.'%'],
						['Profession.norm LIKE' => '%'.$token.'%'],
                        ['Profession.profession_verbatim LIKE' => '%'.$token.'%'],
						['Companies.specification_verbatim LIKE' => '%'.$token.'%'],
						['Streets.name_old_clean LIKE' => '%'.$token.'%'],
						['Streets.name_new LIKE' => '%'.$token.'%'],
						['Addresses.address_specification_verbatim LIKE' => '%'.$token.'%']
					]
				])
                ->group('Companies.id');
		}
    }

    /**
     * Detailed search function. Takes the detailed query params as query
     * and looks for database entries containing all the set params.
     * For each param only the specified field is searched.
     * If one or more fields have been selected, that exist in persons and companies,
     * both persons and companies are treated as possible results and are
     * filtered by the query. If only fields have been selected, that exist
     * in persons, only persons are treated as possible results, while companies
     * are excluded from the search and zero company-results will be returned.
     *
     * Note: If no fields at all have been selected, this function will return
     * without filtering the initial queryObjects at all, causing the results to
     * be the entire database!!! (To change this uncomment the marked lines)
     *
     * The function params are passed by value (&), so that they are changed and
     * remain changed without having to explicitly return and reassign them.
     *
     * @param $persons An initial queryObject containing all persons with the needed fields of person
     * @param $companies An initial queryObject containing all companies with the needed fields of company
     */
    private function detailedSearch(&$persons, &$companies)
    {
        // Get param values for fields existing in persons as well as in companies
		$name = $this->request->getQuery('name');
		$prof = $this->request->getQuery('prof');
		$street = $this->request->getQuery('street');
		$profCat = $this->request->getQuery('prof_cat');
		$arrOld = $this->request->getQuery('arr_old');
		$arrNew = $this->request->getQuery('arr_new');
		$bold = $this->request->getQuery('bold');
		$advert = $this->request->getQuery('advert');
        $nc = $this->request->getQuery('notable_commercant');

        // Get param values for fields existing only in persons
		$firstName = $this->request->getQuery('first_name');
		$dlI = $this->request->getQuery('institut');
		$ldh = $this->request->getQuery('ldh_rank');
		$gender = $this->request->getQuery('gender');
		$soc = $this->request->getQuery('soc_stat');
		$mil = $this->request->getQuery('mil_stat');
		$occup = $this->request->getQuery('occ_stat');

        // Checking if all values for company or person are empty and either empty the query object
        // for companies or return without modifying the query objects
		if(empty($name.$street.$prof.$profCat.$arrOld.$arrNew) && $bold === null && $advert === null && $nc === null){
            if(empty($firstName.$soc.$mil.$occup.$ldh) && $dlI === null && $gender === null) return;
            $companies->where(['Companies.id' => 0]);
        }

        // UNCOMMENT these lines instead of the above ones if you want to return zero results for an empty query form:
        // if(empty($name.$street.$prof.$profCat.$arrOld.$arrNew) && $bold === null && $advert === null){
        //     if(empty($firstName.$soc.$mil.$occup.$ldh) && $dlI === null && $gender === null){
        //         $persons->where(['Persons.id' => 0]);
        //         $companies->where(['Companies.id' => 0]);
        //         return;
        //     }
        //     $companies->where(['Companies.id' => 0]);
        // }

		// Query for $name (surname of persons/name of companies)
		if(!empty($name)){
			$persons->where(['Persons.surname LIKE' => '%'.$name.'%']);
			$companies->where(['Companies.name LIKE' => '%'.$name.'%']);
		}

		// Query for $prof (given profession of a person or company)
		if(!empty($prof)){
            $persons->matching('Profession', function($q) use ($prof){
                return $q->where(['Profession.profession_verbatim LIKE' => '%'.$prof.'%']);
            }
        );
        $companies->matching('Profession', function($q) use ($prof){
                return $q->where(['Profession.profession_verbatim LIKE' => '%'.$prof.'%']);
            }
        );
		}

        // Query for $street (a person or company, that has at least one associated
        // street that contains the given string as old or new street name)
		if(!empty($street)){
			$persons->matching('Addresses.Streets', function($q) use ($street){
					return $q->where(['OR' => [
                        ['Streets.name_old_clean LIKE' => '%'.$street.'%'],
                        ['Streets.name_new LIKE' => '%'.$street.'%']
					]]);
				}
			);
			$companies->matching('Addresses.Streets', function($q) use ($street){
					return $q->where(['OR' => [
                        ['Streets.name_old_clean LIKE' => '%'.$street.'%'],
                        ['Streets.name_new LIKE' => '%'.$street.'%']
					]]);
				}
			);
		}

		//Query for $profCat (profession category of person/company)
		if(!empty($profCat)){
			$persons->where(['Persons.prof_category_id' => $profCat]);
			$companies->where(['Companies.prof_category_id' => $profCat]);
		}

        //Query for $arrOld/$arrNew (a person or company, that has at least one associated
        // street that lies at least partially within the given arrondissement)
		$arrs = [];
		if(!empty($arrOld)){
			array_push($arrs, intval($arrOld));
		}
		if(!empty($arrNew)){
			array_push($arrs, intval($arrNew));
		}
		foreach($arrs as $arr){
			$persons->matching('Addresses.Streets.Arrondissements', function ($q) use ($arr){
				return $q->where(['Arrondissements.id' => $arr]);
			});
			$companies->matching('Addresses.Streets.Arrondissements', function ($q) use ($arr){
				return $q->where(['Arrondissements.id' => $arr]);
			});
		}

		// Query for $bold (the fact, that a person's/company's name is written bold in the address book)
		if($bold === '1'){
			$persons->where(['Persons.bold' => true]);
			$companies->where(['Companies.bold' => true]);
		} elseif($bold === '0'){
			$persons->where(['Persons.bold' => false]);
			$companies->where(['Companies.bold' => false]);
		}

        if($nc === '1'){
			$persons->where(['Persons.notable_commercant' => true]);
			$companies->where(['Companies.notable_commercant' => true]);
		} elseif($nc === '0'){
			$persons->where(['Persons.notable_commercant' => false]);
			$companies->where(['Companies.notable_commercant' => false]);
		}

        // Query for $advert (the fact, that a person's/company's name appears in the entreprise list of
        // the address book)
		if($advert === '1'){
			$persons->where(['Persons.advert' => true]);
			$companies->where(['Companies.advert' => true]);
		} elseif($advert === '0'){
			$persons->where(['Persons.advert' => false]);
			$companies->where(['Companies.advert' => false]);
		}

		/* Queries that only concern persons */

		//Query for $firstName (first name of person)
		if(!empty($firstName)){
			$persons->where(['Persons.first_name LIKE' => '%'.$firstName.'%']);
		}

		// Query for $dlI (the fact, that a person is marked "de l'Institut" in the address book)
		if($dlI === '1'){
			$persons->where(['Persons.de_l_institut' => true]);
		} elseif($dlI === '0'){
			$persons->where(['Persons.de_l_institut' => false]);
		}

		//Query for $ldh (a person's rank in the Légion d'Honneur)
		if(!empty($ldh)){
			$persons->where(['Persons.ldh_rank_id' => $ldh]);
		}

		//Query for $gender (a person's gender)
		if(!empty($gender)){
			$persons->where(['Persons.gender' => $gender]);
		}

		// Query for $soc (the social status of a person)
		if(!empty($soc)){
			$persons->where(['Persons.social_status_id' => $soc]);
		}

		// Query for $mil (the military status of a person)
		if(!empty($mil)){
			$persons->where(['Persons.military_status_id' => $mil]);
		}

		// Query for $occup (the occupational status of a person)
		if(!empty($occup)){
			$persons->where(['Persons.occupation_status_id' => $occup]);
		}
	}

public function persons()
    {
        if(!$id) return $this->redirect(['action' => 'index']);

        $person = $this->Persons->get($id, [
            'contain' => [
                'LdhRanks',
                'MilitaryStatuses',
                'SocialStatuses',
                'OccupationStatuses',
                'ProfCategories',
                'Addresses.Streets.Arrondissements',
                'Companies.ProfCategories',
                'Companies.Addresses.Streets',
                'ExternalReferences.ReferenceTypes',
                'OriginalReferences',
                'Profession'
            ]
        ]);

        $this->set(compact('person'));
    }

    
}


 