<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PartnerVoucherLogs Model
 *
 * @property \Cake\ORM\Association\BelongsTo $CampaignGroups
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Devices
 *
 * @method \App\Model\Entity\PartnerVoucherLog get($primaryKey, $options = [])
 * @method \App\Model\Entity\PartnerVoucherLog newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PartnerVoucherLog[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PartnerVoucherLog|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PartnerVoucherLog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PartnerVoucherLog[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PartnerVoucherLog findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PartnerVoucherLogsTable extends Table
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

        $this->setTable('partner_voucher_logs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('CampaignGroups', [
            'foreignKey' => 'campaign_group_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
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
            ->allowEmpty('num_clients_connect');

        $validator
            ->allowEmpty('client_mac');

        $validator
            ->boolean('confirm')
            ->allowEmpty('confirm');

        $validator
            ->allowEmpty('full_name');

        $validator
            ->allowEmpty('birthday');

        $validator
            ->allowEmpty('telephone');

        $validator
            ->allowEmpty('address');

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
        $rules->add($rules->existsIn(['campaign_group_id'], 'CampaignGroups'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['device_id'], 'Devices'));

        return $rules;
    }
}
