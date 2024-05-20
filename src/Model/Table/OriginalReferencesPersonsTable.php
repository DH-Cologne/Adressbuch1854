<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OriginalReferencesPersons Model
 *
 * @property \App\Model\Table\OriginalReferencesTable&\Cake\ORM\Association\BelongsTo $OriginalReferences
 * @property \App\Model\Table\PersonsTable&\Cake\ORM\Association\BelongsTo $Persons
 *
 * @method \App\Model\Entity\OriginalReferencesPerson get($primaryKey, $options = [])
 * @method \App\Model\Entity\OriginalReferencesPerson newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OriginalReferencesPerson[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OriginalReferencesPerson|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OriginalReferencesPerson saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OriginalReferencesPerson patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OriginalReferencesPerson[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OriginalReferencesPerson findOrCreate($search, callable $callback = null, $options = [])
 */
class OriginalReferencesPersonsTable extends Table
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

        $this->setTable('original_references_persons');
        $this->setDisplayField('original_reference_id');
        $this->setPrimaryKey(['original_reference_id', 'person_id']);

        $this->belongsTo('OriginalReferences', [
            'foreignKey' => 'original_reference_id',
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
        $rules->add($rules->existsIn(['original_reference_id'], 'OriginalReferences'));
        $rules->add($rules->existsIn(['person_id'], 'Persons'));

        return $rules;
    }
}
