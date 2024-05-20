<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Profession Model
 *
 * @property \App\Model\Table\CompaniesTable&\Cake\ORM\Association\HasMany $Companies
 * @property \App\Model\Table\PersonsTable&\Cake\ORM\Association\HasMany $Persons
 *
 * @method \App\Model\Entity\Profession newEmptyEntity()
 * @method \App\Model\Entity\Profession newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Profession[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Profession get($primaryKey, $options = [])
 * @method \App\Model\Entity\Profession findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Profession patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Profession[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Profession|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Profession saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Profession[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Profession[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Profession[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Profession[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ProfessionTable extends Table
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

        $this->setTable('profession');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Companies', [
            'foreignKey' => 'profession_id',
        ]);
        $this->hasMany('Persons', [
            'foreignKey' => 'profession_id',
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
            ->scalar('profession_verbatim')
            ->maxLength('profession_verbatim', 120)
            ->allowEmptyString('profession_verbatim');
        
        $validator
            ->scalar('name')
            ->maxLength('name', 120)
            ->allowEmptyString('name');
        
        $validator
            ->scalar('norm')
            ->maxLenght('norm', 120)
            ->allowEmptyString('norm');

        $validator
            ->scalar('ohab_ges')
            ->maxLength('ohab_ges', 120)
            ->allowEmptyString('ohab_ges');

        $validator
            ->scalar('OhdAB_01')
            ->maxLength('OhdAB_01', 250)
            ->allowEmptyString('OhdAB_01');
        
        $validator
            ->scalar('Anforderungsniveau')
            ->maxLength('Anforderungsniveau', 120)
            ->allowEmptyString('Anforderungsniveau');

        $validator
            ->scalar('q_fact')
            ->maxLength('q_fact', 7);

        return $validator;
    }
}
