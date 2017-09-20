<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ServiceGroups Model
 *
 * @method \App\Model\Entity\ServiceGroup get($primaryKey, $options = [])
 * @method \App\Model\Entity\ServiceGroup newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ServiceGroup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ServiceGroup|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ServiceGroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ServiceGroup[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ServiceGroup findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ServiceGroupsTable extends Table
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

        $this->setTable('service_groups');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'created' => 'new',
                    'updated' => 'always',
                ],
                'Users.afterLogin' => [
                    'lastLogin' => 'always'
                ]
            ]
        ]);
    }

//    /**
//     * Default validation rules.
//     *
//     * @param \Cake\Validation\Validator $validator Validator instance.
//     * @return \Cake\Validation\Validator
//     */
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
//            ->requirePresence('delete_flag', 'create')
//            ->notEmpty('delete_flag');
//
//        return $validator;
//    }
}
