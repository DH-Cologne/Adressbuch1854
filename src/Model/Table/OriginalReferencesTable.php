<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OriginalReferences Model
 *
 * @property \App\Model\Table\CompaniesTable&\Cake\ORM\Association\BelongsToMany $Companies
 * @property \App\Model\Table\PersonsTable&\Cake\ORM\Association\BelongsToMany $Persons
 *
 * @method \App\Model\Entity\OriginalReference get($primaryKey, $options = [])
 * @method \App\Model\Entity\OriginalReference newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OriginalReference[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OriginalReference|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OriginalReference saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OriginalReference patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OriginalReference[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OriginalReference findOrCreate($search, callable $callback = null, $options = [])
 */
class OriginalReferencesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('original_references');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Companies', [
            'foreignKey' => 'original_reference_id',
            'targetForeignKey' => 'company_id',
            'joinTable' => 'companies_original_references',
        ]);
        $this->belongsToMany('Persons', [
            'foreignKey' => 'original_reference_id',
            'targetForeignKey' => 'person_id',
            'joinTable' => 'original_references_persons',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->allowEmptyString('scan_no');

        $validator
            ->allowEmptyString('begin_page_no');

        $validator
            ->allowEmptyString('end_page_no');

        return $validator;
    }
}
