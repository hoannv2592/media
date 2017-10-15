<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DeviceGroups Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Adgroups
 * @property \Cake\ORM\Association\BelongsTo $Devices
 *
 * @method \App\Model\Entity\DeviceGroup get($primaryKey, $options = [])
 * @method \App\Model\Entity\DeviceGroup newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DeviceGroup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DeviceGroup|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DeviceGroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DeviceGroup[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DeviceGroup findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DeviceGroupsTable extends Table
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

        $this->setTable('device_groups');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'created' => 'new',
                    'modified' => 'always',
                ],
                'Users.afterLogin' => [
                    'lastLogin' => 'always'
                ]
            ]
        ]);

        $this->belongsTo('Adgroups', [
            'foreignKey' => 'adgroup_id'
        ]);
        $this->belongsTo('Devices', [
            'foreignKey' => 'device_id'
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
            ->allowEmpty('back_ground');

        $validator
            ->allowEmpty('path');

        $validator
            ->allowEmpty('number_pass');

        $validator
            ->allowEmpty('tile_name');

        $validator
            ->allowEmpty('device_name');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
//    public function buildRules(RulesChecker $rules)
//    {
//        $rules->add($rules->existsIn(['adgroup_id'], 'Adgroups'));
//        $rules->add($rules->existsIn(['device_id'], 'Devices'));
//
//        return $rules;
//    }
}
