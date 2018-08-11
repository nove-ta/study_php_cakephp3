<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Wants Model
 *
 * @property \App\Model\Table\CategoriesTable|\Cake\ORM\Association\BelongsTo $Categories
 *
 * @method \App\Model\Entity\Want get($primaryKey, $options = [])
 * @method \App\Model\Entity\Want newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Want[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Want|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Want|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Want patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Want[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Want findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class WantsTable extends Table
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

        $this->setTable('wants');
        $this->setDisplayField('name');
        $this->setPrimaryKey('want_id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
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
            ->allowEmpty('want_id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 128)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->integer('width_min')
            ->requirePresence('width_min', 'create')
            ->notEmpty('width_min');

        $validator
            ->integer('width_max')
            ->requirePresence('width_max', 'create')
            ->notEmpty('width_max');

        $validator
            ->integer('min_depth')
            ->requirePresence('min_depth', 'create')
            ->notEmpty('min_depth');

        $validator
            ->integer('max_depth')
            ->requirePresence('max_depth', 'create')
            ->notEmpty('max_depth');

        $validator
            ->integer('min_height')
            ->requirePresence('min_height', 'create')
            ->notEmpty('min_height');

        $validator
            ->integer('max_height')
            ->requirePresence('max_height', 'create')
            ->notEmpty('max_height');

        $validator
            ->integer('num')
            ->requirePresence('num', 'create')
            ->notEmpty('num');

        $validator
            ->scalar('memo')
            ->requirePresence('memo', 'create')
            ->notEmpty('memo');

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
        $rules->add($rules->existsIn(['category_id'], 'Categories'));

        return $rules;
    }
}
