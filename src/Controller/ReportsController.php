<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

/**
 * Sales Controller
 *
 * @property \App\Model\Table\SalesTable $Sales
 * @method \App\Model\Entity\Sale[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */


class ReportsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        if ($this->request->is('post')) {
            $articles = TableRegistry::getTableLocator()->get('Sales');
       
            $sales = $articles->find(
                'all',
                ['contain' => ['Products', 'Clients', 'Salesmans'],
            ]
            )->where(['date_sale >=' => $this->request->getData('dateStart')]                
            )->where(['date_sale <=' => $this->request->getData('dateEnd')] );
          
            $this->set(compact('sales'));
        }
        
    }
}
