<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ExternalReferences Model
 *
 * @property \App\Model\Table\ReferenceTypesTable&\Cake\ORM\Association\BelongsTo $ReferenceTypes
 * @property \App\Model\Table\CompaniesTable&\Cake\ORM\Association\BelongsToMany $Companies
 * @property \App\Model\Table\PersonsTable&\Cake\ORM\Association\BelongsToMany $Persons
 *
 * @method \App\Model\Entity\ExternalReference get($primaryKey, $options = [])
 * @method \App\Model\Entity\ExternalReference newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ExternalReference[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ExternalReference|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ExternalReference saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ExternalReference patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ExternalReference[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ExternalReference findOrCreate($search, callable $callback = null, $options = [])
 */
class ExternalReferencesTable extends Table
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

        $this->setTable('external_references');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('ReferenceTypes', [
            'foreignKey' => 'reference_type_id',
        ]);
        $this->belongsToMany('Companies', [
            'foreignKey' => 'external_reference_id',
            'targetForeignKey' => 'company_id',
            'joinTable' => 'companies_external_references',
        ]);
        $this->belongsToMany('Persons', [
            'foreignKey' => 'external_reference_id',
            'targetForeignKey' => 'person_id',
            'joinTable' => 'external_references_persons',
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
            ->scalar('reference')
            ->maxLength('reference', 128)
            ->allowEmptyString('reference');

        $validator
            ->scalar('short_description')
            ->maxLength('short_description', 256)
            ->allowEmptyString('short_description');

        $validator
            ->scalar('link')
            ->maxLength('link', 512)
            ->allowEmptyString('link');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['reference_type_id'], 'ReferenceTypes'));

        return $rules;
    }
}
