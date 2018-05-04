<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Partners Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Devices
 *
 * @method \App\Model\Entity\Partner get($primaryKey, $options = [])
 * @method \App\Model\Entity\Partner newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Partner[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Partner|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Partner patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Partner[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Partner findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PartnersTable extends Table
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

        $this->setTable('partners');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Devices', [
            'foreignKey' => 'device_id'
        ]);

        $this->hasMany('PartnerVouchers', [
            'foreignKey' => 'partner_id'
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
            ->allowEmpty('client_mac');

        $validator
            ->allowEmpty('auth_target');

        $validator
            ->allowEmpty('apt_device_number');

        $validator
            ->allowEmpty('num_clients_connect');

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
        $rules->add($rules->existsIn(['device_id'], 'Devices'));

        return $rules;
    }

    /**
     * @param array $conditions
     * @return $this|array
     */
    public function getOders($conditions = array())
    {
        $fields = $this->getLableField();
        $fields = array_merge($fields, ['Devices.name']);
        $query = $this->find('all');
        $result = $query->hydrate(false)
            ->select($fields)
            ->join([
                'Devices' => [
                    'table' => 'devices',
                    'type' => 'LEFT',
                    'conditions' => 'Devices.id = Partners.device_id',
                ]
            ])->order([
                'Partners.created' => 'DESC',
                'Partners.num_clients_connect' => 'DESC'
            ]);
        ;
        if (!empty($conditions)) {
            $result->where($conditions);
        }
        return $result;
    }

    /**
     * @param array $conditions
     * @return $this|array
     */
    public function getOdersDownload($conditions = array())
    {
        $fields = [
            'Devices.name',
            'Partners.name',
            'Partners.phone',
            'Partners.email',
            'Partners.birthday',
            'Partners.address',
            'Partners.num_clients_connect',
            'Partners.client_mac',
            'Partners.created',
        ];
        $query = $this->find('all');
        $result = $query->hydrate(false)
            ->select($fields)
            ->join([
                'Devices' => [
                    'table' => 'devices',
                    'type' => 'LEFT',
                    'conditions' => 'Devices.id = Partners.device_id',
                ]
            ])->order([
                'Partners.created' => 'DESC',
                'Partners.num_clients_connect' => 'DESC'
            ]);
        ;
        if (!empty($conditions)) {
            $result->where($conditions);
        }
        return $result;
    }



    /**
     * get Label of table member_history and t_member
     * @return array
     */
    public function getLableField()
    {
        $fields_member_histoty = $this->query()->aliasFields(
            $this->schema()->columns(), $this->alias()
        );
        return $fields_member_histoty;
    }

}
