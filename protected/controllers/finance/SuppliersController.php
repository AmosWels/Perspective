<?php

class SuppliersController extends Controller
{
	public function actionIndex()
	{
	$expenses = TUser::model()->findAll("Status IN ('A','C')");           
        
        if (isset($_POST['new-expense'])) { 
            $model = new TExpenditureItem();
            $model->name = $_POST['new-expense'];
            if($model->save()){
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }  
            $this->redirect(array('finance/expenses'));
        }           
        
         //changing status
        if (isset($_POST['expense-status'])) {            
            $status = $_POST['expense-status'];
            $expense_id = $_POST['expense-id'];
            
            $model = TExpenditureItem::model()->findByPk($expense_id);
            switch ($status){ 
                case 'A': $model->status = 'C';     break;
                case 'C': $model->status = 'A';     break;
            }
            if($model->update()){
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }    
        $this->redirect(array('finance/expenses'));
        }
        
//         update expense name
        if (isset($_POST['edit_expense_id'])) {
//            $new_type_name = $_POST['edit-type-name'];
            $id = $_POST['edit_expense_id'];
            $model = TExpenditureItem::model()->findByPk($id);
            $model->name = $_POST['new-expense_name'];
            if($model->update()){
                //LOG SUCCESS
            } else {
                //LOG ERROR
            } 
                $this->redirect(array('finance/expenses'));
        }
//        delete expense
        if (isset($_POST['expense_delete_id'])) {
//            $new_type_name = $_POST['edit-type-name'];
            $id = $_POST['expense_delete_id'];
            $model = TExpenditureItem::model()->findByPk($id);
            if($model->delete()){
                //LOG SUCCESS
            } else {
                //LOG ERROR
            } 
                $this->redirect(array('finance/expenses'));
        }
        $this->render('index', array('model' => $expenses,));
    }

	
}