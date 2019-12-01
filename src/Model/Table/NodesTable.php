<?php
namespace Blog\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Nodes Model
 *
 * @method \Blog\Model\Entity\Node get($primaryKey, $options = [])
 * @method \Blog\Model\Entity\Node newEntity($data = null, array $options = [])
 * @method \Blog\Model\Entity\Node[] newEntities(array $data, array $options = [])
 * @method \Blog\Model\Entity\Node|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Blog\Model\Entity\Node saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Blog\Model\Entity\Node patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Blog\Model\Entity\Node[] patchEntities($entities, array $data, array $options = [])
 * @method \Blog\Model\Entity\Node findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class NodesTable extends Table
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

        $this->setTable('nodes');
        $this->setDisplayField('title');
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->allowEmptyString('title');

        $validator
            ->scalar('body')
            ->allowEmptyString('body');

        return $validator;
    }
}
