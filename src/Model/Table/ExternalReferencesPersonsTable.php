<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ExternalReferencesPersons Model
 *
 * @property \App\Model\Table\ExternalReferencesTable&\Cake\ORM\Association\BelongsTo $ExternalReferences
 * @property \App\Model\Table\PersonsTable&\Cake\ORM\Association\BelongsTo $Persons
 *
 * @method \App\Model\Entity\ExternalReferencesPerson get($primaryKey, $options = [])
 * @method \App\Model\Entity\ExternalReferencesPerson newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ExternalReferencesPerson[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ExternalReferencesPerson|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ExternalReferencesPerson saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ExternalReferencesPerson patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ExternalReferencesPerson[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ExternalReferencesPerson findOrCreate($search, callable $callback = null, $options = [])
 */
class ExternalReferencesPersonsTable extends Table
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

        $this->setTable('external_references_persons');
        $this->setDisplayField('external_reference_id');
        $this->setPrimaryKey(['external_reference_id', 'person_id']);

        $this->belongsTo('ExternalReferences', [
            'foreignKey' => 'external_reference_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Persons', [
            'foreignKey' => 'person_id',
            'joinType' => 'INNER',
        ]);
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
        $rules->add($rules->existsIn(['external_reference_id'], 'ExternalReferences'));
        $rules->add($rules->existsIn(['person_id'], 'Persons'));

        return $rules;
    }
}
