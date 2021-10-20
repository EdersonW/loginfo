<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Sale;

/**
 * Sales Controller
 *
 * @property \App\Model\Table\SalesTable $Sales
 * @method \App\Model\Entity\Sale[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SalesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Products', 'Clients', 'Salesmans'],
        ];
        $sales = $this->paginate($this->Sales);

        $this->set(compact('sales'));
    }

    /**
     * View method
     *
     * @param string|null $id Sale id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sale = $this->Sales->get($id, [
            'contain' => ['Products', 'Clients', 'Salesmans'],
        ]);

        $this->set(compact('sale'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sale = $this->Sales->newEmptyEntity();
        if ($this->request->is('post')) {
          
            $product = $this->request->getData('product');
           
            $product = $this->Sales->Products->get($product);
            
            $sale = new Sale();
            $sale->qtd_product = $product->qtd;
            $sale->total = $product->price;
            $sale->client_id = $this->request->getData('client');
            $sale->product_id =  $this->request->getData('product');
            $sale->salesman_id =  $this->request->getData('salesman');
            $sale->date_sale =  date('Y-m-d');
           
           
            if ($this->Sales->save($sale)) {
                $this->Flash->success(__('Venda criada com sucesso'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível realizar o cadastro. Tente novamente'));
          


        }
        $products = $this->Sales->Products->find();
        $clients = $this->Sales->Clients->find();
        $salesmans = $this->Sales->Salesmans->find();
        $this->set(compact('sale', 'products', 'clients', 'salesmans'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Sale id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sale = $this->Sales->get($id);
        if ($this->Sales->delete($sale)) {
            $this->Flash->success(__('Excluído com sucesso'));
        } else {
            $this->Flash->error(__('Não foi possível removber. Tente novamente'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
