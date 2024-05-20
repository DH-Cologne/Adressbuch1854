<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Arrondissements Controller
 *
 * @property \App\Model\Table\ArrondissementsTable $Arrondissements
 *
 * @method \App\Model\Entity\Arrondissement[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArrondissementsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
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
            $arrondissements = $this->paginate($this->Arrondissements);
        } else{
            $arrondissements = $this->Arrondissements->find();
        }

        $this->set(compact('arrondissements'));
    }

    /**
     * View method
     *
     * @param string|null $id Arrondissement id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if(!$id) return $this->redirect(['action' => 'index']);

        // Load additional models for being able to access their data.
        $this->loadModel('Persons');
		$this->loadModel('Companies');

        $arrondissement = $this->Arrondissements->get($id);

        // After fetching the arrondissement, find all persons and companies,
        // that have addresses in this arrondissement. Use 'distinct' to avoid
        // doubled persons/companies (some may have different addresses with
		// the same arrondissement and may therefore be selected mutiple times).
        $persons = $this->Persons->find()
            ->contain([
                'LdhRanks',
                'MilitaryStatuses',
                'SocialStatuses',
                'OccupationStatuses',
                'ProfCategories',
                'Addresses.Streets']
            );

        $persons
            ->leftJoinWith('Addresses.Streets.Arrondissements')
			->where(['Arrondissements.id' => $id])
			->distinct(['Persons.id']);

//to fix pagination because we have many people foreach arrondissements.
    $persons = $this->paginate($persons);

        $companies = $this->Companies->find()
            ->contain([
                'Addresses.Streets',
                'ProfCategories'
            ]);

        $companies
            ->leftJoinWith('Addresses.Streets.Arrondissements')
			->where(['Arrondissements.id' => $id])
			->distinct(['Companies.id']);


        // Set arrondissement as well as persons and companies to be
        // able to access their data in the view
        $this->set(compact('arrondissement', 'persons', 'companies'));
    }
}
