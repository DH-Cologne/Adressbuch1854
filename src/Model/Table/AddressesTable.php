<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Addresses Model
 *
 * @property \App\Model\Table\StreetsTable&\Cake\ORM\Association\BelongsTo $Streets
 * @property \App\Model\Table\CompaniesTable&\Cake\ORM\Association\BelongsToMany $Companies
 * @property \App\Model\Table\PersonsTable&\Cake\ORM\Association\BelongsToMany $Persons
 *
 * @method \App\Model\Entity\Address get($primaryKey, $options = [])
 * @method \App\Model\Entity\Address newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Address[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Address|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Address saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Address patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Address[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Address findOrCreate($search, callable $callback = null, $options = [])
 */
class AddressesTable extends Table
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

        $this->setTable('addresses');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Streets', [
            'foreignKey' => 'street_id',
        ]);
        $this->belongsToMany('Companies', [
            'foreignKey' => 'address_id',
            'targetForeignKey' => 'company_id',
            'joinTable' => 'addresses_companies',
        ]);
        $this->belongsToMany('Persons', [
            'foreignKey' => 'address_id',
            'targetForeignKey' => 'person_id',
            'joinTable' => 'addresses_persons',
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
            ->allowEmptyString('houseno');

        $validator
            ->scalar('houseno_specification')
            ->maxLength('houseno_specification', 42)
            ->allowEmptyString('houseno_specification');

        $validator
            ->numeric('geo_long')
            ->allowEmptyString('geo_long');

        $validator
            ->numeric('geo_lat')
            ->allowEmptyString('geo_lat');

        $validator
            ->scalar('address_specification_verbatim')
            ->maxLength('address_specification_verbatim', 128)
            ->allowEmptyString('address_specification_verbatim');

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
        $rules->add($rules->existsIn(['street_id'], 'Streets'));

        return $rules;
    }
}
