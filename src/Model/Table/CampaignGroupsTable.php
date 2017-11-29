<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CampaignGroups Model
 *
 * @method \App\Model\Entity\CampaignGroup get($primaryKey, $options = [])
 * @method \App\Model\Entity\CampaignGroup newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CampaignGroup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CampaignGroup|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CampaignGroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CampaignGroup[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CampaignGroup findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CampaignGroupsTable extends Table
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

        $this->setTable('campaign_groups');
        $this->setDisplayField('name');
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
        $this->hasMany('PartnerVouchers', [
            'foreignKey' => 'campaign_group_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
//    public function validationDefault(Validator $validator)
//    {
//        $validator
//            ->integer('id')
//            ->allowEmpty('id', 'create');
//
//        $validator
//            ->scalar('name')
//            ->requirePresence('name', 'create')
//            ->notEmpty('name');
//
//        $validator
//            ->scalar('description')
//            ->requirePresence('description', 'create')
//            ->notEmpty('description');
//
//        $validator
//            ->scalar('start_date')
//            ->requirePresence('start_date', 'create')
//            ->notEmpty('start_date');
//
//        $validator
//            ->scalar('end_date')
//            ->requirePresence('end_date', 'create')
//            ->notEmpty('end_date');
//
//        $validator
//            ->requirePresence('delete_flag', 'create')
//            ->notEmpty('delete_flag');
//
//        return $validator;
//    }
}
