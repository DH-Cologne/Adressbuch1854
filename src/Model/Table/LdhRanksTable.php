<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LdhRanks Model
 *
 * @property \App\Model\Table\PersonsTable&\Cake\ORM\Association\HasMany $Persons
 *
 * @method \App\Model\Entity\LdhRank get($primaryKey, $options = [])
 * @method \App\Model\Entity\LdhRank newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\LdhRank[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LdhRank|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LdhRank saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LdhRank patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LdhRank[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\LdhRank findOrCreate($search, callable $callback = null, $options = [])
 */
class LdhRanksTable extends Table
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

        $this->setTable('ldh_ranks');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Persons', [
            'foreignKey' => 'ldh_rank_id',
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
            ->scalar('rank')
            ->maxLength('rank', 42)
            ->allowEmptyString('rank');

        $validator
            ->requirePresence('index_no', 'create')
            ->notEmptyString('index_no');

        return $validator;
    }
}
