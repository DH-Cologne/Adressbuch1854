<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MilitaryStatuses Model
 *
 * @property \App\Model\Table\PersonsTable&\Cake\ORM\Association\HasMany $Persons
 *
 * @method \App\Model\Entity\MilitaryStatus get($primaryKey, $options = [])
 * @method \App\Model\Entity\MilitaryStatus newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MilitaryStatus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MilitaryStatus|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MilitaryStatus saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MilitaryStatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MilitaryStatus[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MilitaryStatus findOrCreate($search, callable $callback = null, $options = [])
 */
class MilitaryStatusesTable extends Table
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

        $this->setTable('military_statuses');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Persons', [
            'foreignKey' => 'military_status_id',
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
            ->scalar('status')
            ->maxLength('status', 42)
            ->allowEmptyString('status');

        return $validator;
    }
}
