<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Streets Controller
 *
 * @property \App\Model\Table\StreetsTable $Streets
 *
 * @method \App\Model\Entity\Street[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StreetsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
		// Take only distinct streets (don't count each orthographical variety as own street)
        $streets = $this->Streets->find()
            ->contain(['Arrondissements'])
            ->distinct(['name_old_clean']);

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
            $this->paginate($streets,['order'=>['id'=>'ASC']]);
        }
        $this->paginate($streets,['order'=>['id'=>'ASC']],['limit'=>20]);
        $this->set(compact('streets'));
    }

    /**
     * View method
     *
     * @param string|null $id Street id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if(!$id) return $this->redirect(['action' => 'index']);

        // Load additional models for being able to access their data.
		$this->loadModel('Persons');
		$this->loadModel('Companies');

        $street = $this->Streets->get($id, [
            'contain' => [
                'Arrondissements'
            ],
        ]);

        // Find all the streets with the same old name clean -> duplicates,
        // either containing an alternate old name or representing just a part of
        // the old street, that has been given a new name in modern times.
        $sameStreets = $this->Streets->find()
            ->where(['name_old_clean' => $street->name_old_clean]);

        // After fetching the street, find all persons and companies,
        // that have addresses with this street. Use 'distinct' to avoid
        // doubled persons/companies (some may have different addresses with
		// the same street and may therefore be selected mutiple times).

        $persons = $this->Persons->find()
            ->contain([
                'LdhRanks',
                'MilitaryStatuses',
                'SocialStatuses',
                'OccupationStatuses',
                'ProfCategories',
                'Profession',
                'Addresses.Streets'
            ]);

        $persons
            ->matching('Addresses.Streets', function($q) use ($street){
                return $q->where(['Streets.name_old_clean LIKE' => $street->name_old_clean]);
            })
            ->distinct(['Persons.id']);

        $persons = $this->paginate($persons);

        $companies = $this->Companies->find()
            ->contain([
                'Addresses.Streets',
                'ProfCategories',
                'Profession',
            ]);

        $companies
            ->matching('Addresses.Streets', function($q) use ($street){
                return $q->where(['Streets.name_old_clean LIKE' => $street->name_old_clean]);
            })
            ->distinct(['Companies.id']);

        // Set street as well as sameStreets, persons and companies to be
        // able to access their data in the view
        $this->set(compact('street', 'sameStreets', 'persons', 'companies'));
        
    }
}
