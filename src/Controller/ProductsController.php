<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Product;
use App\View\Helper\FormatHelper;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $products = $this->paginate($this->Products);

        $this->set(compact('products'));
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     * 
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('product'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
    try{
            $product = $this->Products->newEmptyEntity();
            if ($this->request->is('post')) {
                $product = new Product();
                $product->qtd = FormatHelper::formatDecimalUS((float) $this->request->getData('qtd'), 3);
                $product->name = $this->request->getData('name');
                $product->unit_measurement = $this->request->getData('unit_measurement');
                $product->price = FormatHelper::formatDecimalUS((float)$this->request->getData('price'), 4);
                $product->product_perishable = $this->request->getData('product_perishable');
                $product->date_validate = $this->request->getData('date_validate');
                $product->date_manufacturing = $this->request->getData('date_manufacturing');

                if (($product->unit_measurement < '1') && ($product->unit_measurement > '3')) {
                    $this->Flash->set('Unidade de medida inválida');
                    return $this->redirect(['action' => 'add']);
                }

                if(strlen($product->name) >50){
                    $this->Flash->set('Nome do produto deve ter no máximo 50 caracteres');
                    return $this->redirect(['action' => 'add']);
                }

                // PRODUTO PERECÍVEL
                // - DATA DE VALIDADE DEVE SER INFORMADA
                //- DATA DE VALIDADE E FABRICAÇÃO DE SER MAIOR QUE A DATA ATUAL
                // - DATA DE FABRICAÇÃO DEVE SER MAIOR QUE A DATA ATUAL
                if ($product->product_perishable == '2') {
                    if ($product->date_manufacturing < date('Y-m-d')) {
                        $this->Flash->set('Data de fabricação deve ser menor ou igual a data de hoje');
                        return $this->redirect(['action' => 'add']);
                    }
                    if ($product->date_manufacturing > $product->date_validate) {
                        $this->Flash->set('Data fabricação deve ser menor que a data de validade');

                        return $this->redirect(['action' => 'add']);
                    }
                    if ($product->date_validate < date('Y-m-d')) {
                        $this->Flash->set('Data validade deve ser maior ou igual a data de hoje');
                        return $this->redirect(['action' => 'add']);
                    }
                }
                if ($this->Products->save($product)) {
                    $this->Flash->set('Produto salvo com sucesso');
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->set('Erro ao salvar o produto');
            }
            $this->set(compact('product'));
        } catch (\Exception $e) {
            $this->Flash->set('Erro ao adicionar o produto. Tente novamente.');
          
        }
      
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {

        try {

            $product = $this->Products->get($id, [
                'contain' => [],
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {

                $product->qtd = FormatHelper::formatDecimalUS((float) $this->request->getData('qtd'), 3);
                $product->name = $this->request->getData('name');
                $product->unit_measurement = $this->request->getData('unit_measurement');
                $product->price = FormatHelper::formatDecimalUS((float)$this->request->getData('price'), 4);
                $product->product_perishable = $this->request->getData('product_perishable');
                $product->date_validate = $this->request->getData('date_validate');
                $product->date_manufacturing = $this->request->getData('date_manufacturing');

                if (($product->unit_measurement < '1') && ($product->unit_measurement > '3')) {
                    $this->Flash->set('Unidade de medida inválida');
                    return $this->redirect(['action' => 'add']);
                }

                // LIMITA EM 50 CARACTERES O NOME DO PRODUTO
                if(strlen($product->name) >50){
                    $this->Flash->set('Nome do produto deve ter no máximo 50 caracteres');
                    return $this->redirect(['action' => 'add']);
                }
                // PRODUTO PERECÍVEL
                // - DATA DE VALIDADE DEVE SER INFORMADA
                //- DATA DE VALIDADE E FABRICAÇÃO DE SER MAIOR QUE A DATA ATUAL
                // - DATA DE FABRICAÇÃO DEVE SER MAIOR QUE A DATA ATUAL
                if ($product->product_perishable == '2') {
                    if ($product->date_manufacturing < date('Y-m-d')) {
                        $this->Flash->set('Data de fabricação deve ser menor ou igual a data de hoje');
                        return $this->redirect(['action' => 'add']);
                    }
                    if ($product->date_manufacturing > $product->date_validate) {
                        $this->Flash->set('Data fabricação deve ser menor que a data de validade');
                        return $this->redirect(['action' => 'add']);
                    }
                    if ($product->date_validate < date('Y-m-d')) {
                        $this->Flash->set('Data validade deve ser maior ou igual a data de hoje');
                        return $this->redirect(['action' => 'add']);
                    }
                }
                if ($this->Products->save($product)) {
                    $this->Flash->set('Atualizado com sucesso');
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->set('Erro ao atualizar o produto. Tente novamente.');
            }
            $this->set(compact('product'));
        } catch (\Exception $e) {
            $this->Flash->set('Erro ao atualizar o produto. Tente novamente.');
          
        }
       
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        try {
            $this->request->allowMethod(['post', 'delete']);
            $product = $this->Products->get($id);
            if ($this->Products->delete($product)) {
                $this->Flash->set('Removido com sucesso.');
            } else {
                $this->Flash->set('O produto não foi removido. Tente novamente.');
            }
        } catch (\Exception $e) {
            $this->Flash->set('Produto não  removido. Verifique se ele não posui vínculo com alguma venda');
        }
        return $this->redirect(['action' => 'index']);
    }
}
