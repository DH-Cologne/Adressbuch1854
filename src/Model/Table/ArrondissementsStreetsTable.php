<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ArrondissementsStreets Model
 *
 * @property \App\Model\Table\ArrondissementsTable&\Cake\ORM\Association\BelongsTo $Arrondissements
 * @property \App\Model\Table\StreetsTable&\Cake\ORM\Association\BelongsTo $Streets
 *
 * @method \App\Model\Entity\ArrondissementsStreet get($primaryKey, $options = [])
 * @method \App\Model\Entity\ArrondissementsStreet newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ArrondissementsStreet[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ArrondissementsStreet|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ArrondissementsStreet saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ArrondissementsStreet patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ArrondissementsStreet[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ArrondissementsStreet findOrCreate($search, callable $callback = null, $options = [])
 */
class ArrondissementsStreetsTable extends Table
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

        $this->setTable('arrondissements_streets');
        $this->setDisplayField('arrondissement_id');
        $this->setPrimaryKey(['arrondissement_id', 'street_id']);

        $this->belongsTo('Arrondissements', [
            'foreignKey' => 'arrondissement_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Streets', [
            'foreignKey' => 'street_id',
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
        $rules->add($rules->existsIn(['arrondissement_id'], 'Arrondissements'));
        $rules->add($rules->existsIn(['street_id'], 'Streets'));

        return $rules;
    }
}
