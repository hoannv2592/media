<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;

/**
 * AdgroupChangeHistories Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Adgroups
 *
 * @method \App\Model\Entity\AdgroupChangeHistory get($primaryKey, $options = [])
 * @method \App\Model\Entity\AdgroupChangeHistory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AdgroupChangeHistory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AdgroupChangeHistory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdgroupChangeHistory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AdgroupChangeHistory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AdgroupChangeHistory findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AdgroupChangeHistoriesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('adgroup_change_histories');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Adgroups', [
            'foreignKey' => 'adgroup_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('contents');

        return $validator;
    }
}
