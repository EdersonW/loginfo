<?php

declare(strict_types=1);

namespace App\Controller;


/**
 * Salesmans Controller
 *
 * @property \App\Model\Table\SalesmansTable $Salesmans
 * @method \App\Model\Entity\Salesman[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SalesmansController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $salesmans = $this->paginate($this->Salesmans);

        $this->set(compact('salesmans'));
    }

    /**
     * View method
     *
     * @param string|null $id Salesman id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $salesman = $this->Salesmans->get($id, [
            'contain' => ['Sales'],
        ]);

        $this->set(compact('salesman'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $salesman = $this->Salesmans->newEmptyEntity();
        if ($this->request->is('post')) {
            $salesman = $this->Salesmans->patchEntity($salesman, $this->request->getData());
            if ($this->Salesmans->save($salesman)) {
                $this->Flash->success(__('Vendedor cadastrado com sucesso'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível realizar o cadastro. Tente novamente'));
        }
        $this->set(compact('salesman'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Salesman id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $salesman = $this->Salesmans->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $salesman = $this->Salesmans->patchEntity($salesman, $this->request->getData());
            if ($this->Salesmans->save($salesman)) {
                $this->Flash->success(__('Alterado com sucesso'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível realizar a alteração. Tente novamente'));
        }
        $this->set(compact('salesman'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Salesman id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        try {
            $this->request->allowMethod(['post', 'delete']);
            $salesman = $this->Salesmans->get($id);
            if ($this->Salesmans->delete($salesman)) {
                $this->Flash->success(__('Excluído com sucesso'));
            } else {
                $this->Flash->error(__('Não foi possível excluir. Tente novamente'));
            }
        } catch (\Exception $e) {
            $this->Flash->error(__('Não foi possível excluir. Verifique se não existe venda vinculada a esse vendedor'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
