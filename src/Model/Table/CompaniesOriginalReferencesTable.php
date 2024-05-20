<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CompaniesOriginalReferences Model
 *
 * @property \App\Model\Table\CompaniesTable&\Cake\ORM\Association\BelongsTo $Companies
 * @property \App\Model\Table\OriginalReferencesTable&\Cake\ORM\Association\BelongsTo $OriginalReferences
 *
 * @method \App\Model\Entity\CompaniesOriginalReference get($primaryKey, $options = [])
 * @method \App\Model\Entity\CompaniesOriginalReference newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CompaniesOriginalReference[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CompaniesOriginalReference|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CompaniesOriginalReference saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CompaniesOriginalReference patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CompaniesOriginalReference[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CompaniesOriginalReference findOrCreate($search, callable $callback = null, $options = [])
 */
class CompaniesOriginalReferencesTable extends Table
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

        $this->setTable('companies_original_references');
        $this->setDisplayField('company_id');
        $this->setPrimaryKey(['company_id', 'original_reference_id']);

        $this->belongsTo('Companies', [
            'foreignKey' => 'company_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('OriginalReferences', [
            'foreignKey' => 'original_reference_id',
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
        $rules->add($rules->existsIn(['original_reference_id'], 'OriginalReferences'));

        return $rules;
    }
}
