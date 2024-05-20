<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Companies Controller
 *
 * @property \App\Model\Table\CompaniesTable $Companies
 *
 * @method \App\Model\Entity\Company[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CompaniesController extends AppController
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
                    'ProfCategories',
                    'Addresses.Streets',
                    'OriginalReferences'
                ]
            ];

            $companies = $this->paginate($this->Companies);
        } else{
            $companies = $this->Companies->find()
            ->contain(['ProfCategories',
            'OriginalReferences',
                'Addresses.Streets'])
            ->limit(20);
        }
         $companies = $this->paginate($this->Companies->find(
         'all', array('order'=>array('Companies.name ASC')))
         ->contain(['ProfCategories',
         'OriginalReferences',
                    'Addresses.Streets',
                    'Profession'])
         ->limit(20));
        {
        $this->set(compact('companies'));

    }
}
    /**
     * View method
     *
     * @param string|null $id Company id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if(!$id) return $this->redirect(['action' => 'index']);

        $company = $this->Companies->get($id, [
            'contain' => [
                'ProfCategories',
                'Addresses.Streets.Arrondissements',
                'ExternalReferences.ReferenceTypes',
                'OriginalReferences',
                'Profession',
                'Persons.ProfCategories',
                'Persons.SocialStatuses',
                'Persons.MilitaryStatuses',
                'Persons.OccupationStatuses',
                'Persons.Addresses.Streets',
                'Persons.Profession',
            ]
        ]);

        $this->set(compact('company'));
    


}
}