<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Careers Controller
 *
 * @property \App\Model\Table\CareersTable $Careers
 * @method \App\Model\Entity\Career[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CareersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $careers = $this->paginate($this->Careers);

        $this->set(compact('careers'));
    }

    /**
     * View method
     *
     * @param string|null $id Career id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $career = $this->Careers->get($id, [
            'contain' => ['Professors', 'Students'],
        ]);

        $this->set(compact('career'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $career = $this->Careers->newEmptyEntity();
        if ($this->request->is('post')) {
            $career = $this->Careers->patchEntity($career, $this->request->getData());
            if ($this->Careers->save($career)) {
                $this->Flash->success(__('The career has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The career could not be saved. Please, try again.'));
        }
        $this->set(compact('career'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Career id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $career = $this->Careers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $career = $this->Careers->patchEntity($career, $this->request->getData());
            if ($this->Careers->save($career)) {
                $this->Flash->success(__('The career has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The career could not be saved. Please, try again.'));
        }
        $this->set(compact('career'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Career id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $career = $this->Careers->get($id);
        if ($this->Careers->delete($career)) {
            $this->Flash->success(__('The career has been deleted.'));
        } else {
            $this->Flash->error(__('The career could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
