<?php

class SuppliersController extends Controller
{
	public function actionIndex()
	{
	$suppliers = TUser::model()->findAll("Status IN ('A','C')");           
        
        if (isset($_POST['new-supplier'])) { 
            $random = new RandomID;
            $number = $random->three_digit(); //generating the random numbers
            
            $myStr = $_POST['new-supplier']; // get user input
            $result = substr($myStr, 0, 2);
            $resultready = strtoupper($result); //converting to upper case
            $staff_id = $resultready.$number;
            
            $model = new TUser();
            $model->staff_id = $staff_id;
            $model->names = $_POST['new-supplier'];
            $model->gender = $_POST['new-gender'];
            if($model->save()){
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }  
            $this->redirect(array('finance/suppliers'));
        }
        
        
         //changing status
        if (isset($_POST['supplier-status'])) {            
            $status = $_POST['supplier-status'];
            $supplier_id = $_POST['supplier-id'];
            
            $model = Tuser::model()->findByPk($supplier_id);
            switch ($status){ 
                case 'A': $model->status = 'C';     break;
                case 'C': $model->status = 'A';     break;
            }
            if($model->update()){
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }    
        $this->redirect(array('finance/suppliers'));
        }
        
//         update expense name
        if (isset($_POST['edit_supplier_id'])) {
//            $new_type_name = $_POST['edit-type-name'];
            $id = $_POST['edit_supplier_id'];
            $model = TUser::model()->findByPk($id);
            $model->names = $_POST['new-supplier_name'];
            $model->gender = $_POST['new-gender'];
            if($model->update()){
                //LOG SUCCESS
            } else {
                //LOG ERROR
            } 
                $this->redirect(array('finance/suppliers'));
        }
//        delete expense
        if (isset($_POST['supplier_delete_id'])) {
//            $new_type_name = $_POST['edit-type-name'];
            $id = $_POST['supplier_delete_id'];
            $model = TUser::model()->findByPk($id);
            $model->status = 'X';
            if($model->update()){
                //LOG SUCCESS
            } else {
                //LOG ERROR
            } 
                $this->redirect(array('finance/suppliers'));
        }
        $this->render('index', array('model' => $suppliers,));
    }
}