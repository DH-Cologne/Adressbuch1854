<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Arrondissements Model
 *
 * @property \App\Model\Table\StreetsTable&\Cake\ORM\Association\BelongsToMany $Streets
 *
 * @method \App\Model\Entity\Arrondissement get($primaryKey, $options = [])
 * @method \App\Model\Entity\Arrondissement newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Arrondissement[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Arrondissement|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Arrondissement saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Arrondissement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Arrondissement[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Arrondissement findOrCreate($search, callable $callback = null, $options = [])
 */
class ArrondissementsTable extends Table
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

        $this->setTable('arrondissements');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Streets', [
            'foreignKey' => 'arrondissement_id',
            'targetForeignKey' => 'street_id',
            'joinTable' => 'arrondissements_streets',
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
            ->allowEmptyString('no');

        $validator
            ->integer('insee_citycode')
            ->allowEmptyString('insee_citycode');

        $validator
            ->scalar('type')
            ->allowEmptyString('type');

        $validator
            ->integer('postcode')
            ->allowEmptyString('postcode');

        return $validator;
    }
}
