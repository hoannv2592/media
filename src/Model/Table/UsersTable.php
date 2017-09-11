<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\AdgroupsTable|\Cake\ORM\Association\BelongsTo $Adgroups
 * @property \App\Model\Table\LandingpagesTable|\Cake\ORM\Association\BelongsTo $Landingpages
 * @property \App\Model\Table\DevicesTable|\Cake\ORM\Association\BelongsTo $Devices
 * @property \App\Model\Table\ServiceGroupsTable|\Cake\ORM\Association\BelongsTo $ServiceGroups
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->hasMany('Devices', [
            'className' => 'Devices'
        ]);
//        $this->belongsTo('Adgroups', [
//            'foreignKey' => 'adgroup_id',
//            'joinType' => 'INNER'
//        ]);
//        $this->belongsTo('Landingpages', [
//            'foreignKey' => 'landingpage_id',
//            'joinType' => 'INNER'
//        ]);
//        $this->belongsTo('Devices', [
//            'foreignKey' => 'device_id',
//            'joinType' => 'INNER'
//        ]);
//        $this->belongsTo('ServiceGroups', [
//            'foreignKey' => 'service_group_id',
//            'joinType' => 'INNER'
//        ]);
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
            ->requirePresence('email','create')
            ->notEmpty('username','Hãy nhập email');

        $validator
            ->requirePresence('password','create')
            ->notEmpty('password','Hãy nhập mật khẩu');
        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
//        $rules->add($rules->existsIn(['adgroup_id'], 'Adgroups'));
//        $rules->add($rules->existsIn(['landingpage_id'], 'Landingpages'));
//        $rules->add($rules->existsIn(['device_id'], 'Devices'));
//        $rules->add($rules->existsIn(['service_group_id'], 'ServiceGroups'));

        return $rules;
    }
}
