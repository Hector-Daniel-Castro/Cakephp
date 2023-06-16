<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Careers Model
 *
 * @property \App\Model\Table\ProfessorsTable&\Cake\ORM\Association\HasMany $Professors
 * @property \App\Model\Table\StudentsTable&\Cake\ORM\Association\HasMany $Students
 *
 * @method \App\Model\Entity\Career newEmptyEntity()
 * @method \App\Model\Entity\Career newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Career[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Career get($primaryKey, $options = [])
 * @method \App\Model\Entity\Career findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Career patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Career[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Career|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Career saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Career[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Career[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Career[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Career[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CareersTable extends Table
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

        $this->setTable('careers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Professors', [
            'foreignKey' => 'career_id',
        ]);
        $this->hasMany('Students', [
            'foreignKey' => 'career_id',
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }
}
