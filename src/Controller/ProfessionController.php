<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Profession Controller
 *
 * @property \App\Model\Table\ProfessionTable $Profession
 * @method \App\Model\Entity\Profession[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProfessionController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
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
            ];
            $profession = $this->paginate($this->Profession,['limit' => 20]);


        } else{
            $profession = $this->Profession->find()
            ->limit(20);
        }
        $profession = $this->paginate($this->Profession->find( 'all', array('order'=>array('profession_verbatim ASC')))
            );
        
        $total = $this->Profession->find()
        ->count();

        $this->set(compact('profession', 'total'));
    }

    /**
     * View method
     *
     * @param string|null $id Profession id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        if(!$id) return $this->redirect(['action' => 'index']);

        $this->loadModel('Persons');
        $this->loadModel('Companies');

        $profession = $this->Profession->get($id, [
            'contain' => ['Companies',
                        'Companies.ProfCategories',
                        'Companies.Addresses.Streets',
                        'Persons',
                        'Persons.ProfCategories',
                        'Persons.SocialStatuses',
                        'Persons.MilitaryStatuses',
                        'Persons.OccupationStatuses',
                        'Persons.LdhRanks',
                        'Persons.Addresses.Streets'],
        ]);

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
            ->matching('Profession', function($q) use ($profession){
            return $q->where(['Profession.profession_verbatim LIKE' => $profession->profession_verbatim]);
            })
            ->distinct(['Persons.id']);
        
        $persons = $this->paginate($persons);

        $companies = $this->Companies->find()
        ->contain([
            'ProfCategories',
            'Profession',
            'Addresses.Streets'
        ]);

        $companies
            ->matching('Profession', function($q) use ($profession){
            return $q->where(['Profession.profession_verbatim LIKE' => $profession->profession_verbatim]);
            })
            ->distinct(['Companies.id']);
        
        $companies = $this->paginate($companies);

    $this->set(compact('profession','persons','companies'));

    }

 
}
