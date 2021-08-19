<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Exception\NotFoundException;
/**
 * Persons Controller
 *
 * @property \App\Model\Table\PersonsTable $Persons
 *
 * @method \App\Model\Entity\Person[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PersonsController extends AppController
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
            $this->paginate = [
                'contain' => [
                    'LdhRanks',
                    'MilitaryStatuses',
                    'SocialStatuses',
                    'OccupationStatuses',
                    'ProfCategories',
                    'Addresses.Streets',

                    
                ]
            ];

            $persons = $this->paginate($this->Persons, ['order'=>['id'=>'ASC']],['limit' => 20]);

        } else{
            $persons = $this->Persons->find()
            ->contain([
                'LdhRanks',
                'MilitaryStatuses',
                'SocialStatuses',
                'OccupationStatuses',
                'ProfCategories',
                'Addresses.Streets',
                
            ]);
        }
        $persons = $this->paginate($this->Persons, ['contain' =>['Addresses.Streets']], ['order'=>['id'=>'ASC']],['limit' => 20]);
    {
        $this->set(compact('persons'));
    }
    
}
    /**
     * View method
     *
     * @param string|null $id Person id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
   
public function view($id = null)
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
                

            ]
        ]);

        $this->set(compact('person'));
        
    }
}