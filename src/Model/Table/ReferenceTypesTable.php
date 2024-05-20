<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ReferenceTypes Model
 *
 * @property \App\Model\Table\ExternalReferencesTable&\Cake\ORM\Association\HasMany $ExternalReferences
 *
 * @method \App\Model\Entity\ReferenceType get($primaryKey, $options = [])
 * @method \App\Model\Entity\ReferenceType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ReferenceType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ReferenceType|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ReferenceType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ReferenceType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ReferenceType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ReferenceType findOrCreate($search, callable $callback = null, $options = [])
 */
class ReferenceTypesTable extends Table
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

        $this->setTable('reference_types');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('ExternalReferences', [
            'foreignKey' => 'reference_type_id',
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
            ->scalar('type')
            ->maxLength('type', 42)
            ->allowEmptyString('type');

        return $validator;
    }
}
