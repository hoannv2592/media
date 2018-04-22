<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Facebooks Model
 *
 * @property \Cake\ORM\Association\BelongsTo $CampaignGroups
 * @property \Cake\ORM\Association\BelongsTo $Devices
 *
 * @method \App\Model\Entity\Facebook get($primaryKey, $options = [])
 * @method \App\Model\Entity\Facebook newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Facebook[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Facebook|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Facebook patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Facebook[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Facebook findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FacebooksTable extends Table
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

        $this->setTable('facebooks');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('CampaignGroups', [
            'foreignKey' => 'campaign_group_id',
            'joinType' => 'INNER'
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
            ->integer('confirm')
            ->allowEmpty('confirm');

        $validator
            ->allowEmpty('mac');

        $validator
            ->allowEmpty('name');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->allowEmpty('link_login_only');

        $validator
            ->allowEmpty('birthday');

        $validator
            ->allowEmpty('client_mac');

        $validator
            ->allowEmpty('apt_device_pass');

        $validator
            ->allowEmpty('address');

        $validator
            ->allowEmpty('phone');

        $validator
            ->allowEmpty('auth_target');

        $validator
            ->allowEmpty('role');

        $validator
            ->integer('sex')
            ->allowEmpty('sex');

        $validator
            ->integer('num_clients_connect')
            ->allowEmpty('num_clients_connect');

        $validator
            ->integer('flag_face')
            ->allowEmpty('flag_face');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['campaign_group_id'], 'CampaignGroups'));
        $rules->add($rules->existsIn(['device_id'], 'Devices'));

        return $rules;
    }
}
