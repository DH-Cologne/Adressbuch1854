<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Streets Model
 *
 * @property \App\Model\Table\AddressesTable&\Cake\ORM\Association\HasMany $Addresses
 * @property \App\Model\Table\ArrondissementsTable&\Cake\ORM\Association\BelongsToMany $Arrondissements
 *
 * @method \App\Model\Entity\Street get($primaryKey, $options = [])
 * @method \App\Model\Entity\Street newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Street[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Street|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Street saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Street patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Street[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Street findOrCreate($search, callable $callback = null, $options = [])
 */
class StreetsTable extends Table
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

        $this->setTable('streets');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Addresses', [
            'foreignKey' => 'street_id',
        ]);
        $this->belongsToMany('Arrondissements', [
            'foreignKey' => 'street_id',
            'targetForeignKey' => 'arrondissement_id',
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
            ->scalar('name_old_verbatim')
            ->maxLength('name_old_verbatim', 62)
            ->allowEmptyString('name_old_verbatim');

        $validator
            ->scalar('name_old_clean')
            ->maxLength('name_old_clean', 62)
            ->allowEmptyString('name_old_clean');

        $validator
            ->scalar('name_new')
            ->maxLength('name_new', 62)
            ->allowEmptyString('name_new');

        $validator
            ->numeric('geo_long')
            ->allowEmptyString('geo_long');

        $validator
            ->numeric('geo_lat')
            ->allowEmptyString('geo_lat');

        return $validator;
    }
}
