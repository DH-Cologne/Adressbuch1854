<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CompaniesExternalReferences Model
 *
 * @property \App\Model\Table\CompaniesTable&\Cake\ORM\Association\BelongsTo $Companies
 * @property \App\Model\Table\ExternalReferencesTable&\Cake\ORM\Association\BelongsTo $ExternalReferences
 *
 * @method \App\Model\Entity\CompaniesExternalReference get($primaryKey, $options = [])
 * @method \App\Model\Entity\CompaniesExternalReference newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CompaniesExternalReference[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CompaniesExternalReference|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CompaniesExternalReference saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CompaniesExternalReference patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CompaniesExternalReference[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CompaniesExternalReference findOrCreate($search, callable $callback = null, $options = [])
 */
class CompaniesExternalReferencesTable extends Table
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

        $this->setTable('companies_external_references');
        $this->setDisplayField('company_id');
        $this->setPrimaryKey(['company_id', 'external_reference_id']);

        $this->belongsTo('Companies', [
            'foreignKey' => 'company_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('ExternalReferences', [
            'foreignKey' => 'external_reference_id',
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
        $rules->add($rules->existsIn(['company_id'], 'Companies'));
        $rules->add($rules->existsIn(['external_reference_id'], 'ExternalReferences'));

        return $rules;
    }
}
