<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Salesmans Model
 *
 * @property \App\Model\Table\SalesTable&\Cake\ORM\Association\HasMany $Sales
 *
 * @method \App\Model\Entity\Salesman newEmptyEntity()
 * @method \App\Model\Entity\Salesman newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Salesman[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Salesman get($primaryKey, $options = [])
 * @method \App\Model\Entity\Salesman findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Salesman patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Salesman[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Salesman|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Salesman saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Salesman[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Salesman[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Salesman[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Salesman[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SalesmansTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('salesmans');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Sales', [
            'foreignKey' => 'salesman_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 200)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }
}
