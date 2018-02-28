<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AdMessages Model
 *
 * @method \App\Model\Entity\AdMessage get($primaryKey, $options = [])
 * @method \App\Model\Entity\AdMessage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AdMessage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AdMessage|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdMessage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AdMessage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AdMessage findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AdMessagesTable extends Table
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

        $this->setTable('ad_messages');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->allowEmpty('button_backgroud');

        $validator
            ->allowEmpty('button_popup');

        $validator
            ->allowEmpty('backgroud');

        $validator
            ->allowEmpty('options');

        return $validator;
    }
}
