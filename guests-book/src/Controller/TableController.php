<?php

namespace Controller;

use Model\CRUDInterface;
use View\View;

class TableController extends AbstractController
{

    protected  $table;

    protected  $view;

    public function __construct(CRUDInterface $table, View $view)
    {
        $this->table = $table;
        $this->view = $view;
        $this->view->setTemplate('table');
    }

    public function actionShow()
    {
    //    print_r($this->table->get());
       $this
       ->view
       ->setData(['table' => $this->table->get()])
       ->view();
    }

    public function actionAdd(array $data)
    {
        $this->table->add($data['post']);
        $this->redirect('?action=show');    // header("Location:?action=show") Оставляет нас на этой же страничке
    }

    public function actionDel(array $data)
    {
        print_r($data);
        if(isset($data['get']['id'])){
            $this->table->delete($data['get']['id']); 
        }
        $this->redirect('?action=show');
    }

    public function actionDefault()
    {
    //    print_r($this->table->get());
       $this
       ->view
       ->setTemplate('default')
       ->view();
    }
}
