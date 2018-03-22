<?php

class ReimbursementController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            //maker
            array('allow', // allow all users to perform 'index' actions
                'actions' => array('index', 'view'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        $userid = Yii::app()->user->userid;

        if (isset($_POST['staff-id'])) {
            $unitcost = $_POST['unit-cost']; // getting unitcost
            $quantity = $_POST['quantity']; //getting quanity
            $total = $unitcost * $quantity; //getting total

            $model = new TReimbursement();
            $model->staff = $_POST['staff-id'];
            $model->expenditure = $_POST['expenditure'];
            $model->currency = $_POST['currency'];
            $model->unit_cost = $unitcost;
            $model->quantity = $quantity;
            $model->total = $total;
            $model->start_date = $_POST['start-date'];
            $model->end_date = $_POST['end-date'];
            $model->maker = $userid;
            if ($model->save()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('finance/reimbursement'));
        }
        $this->render('index');
    }

    public function actionView() {
        // edit request
        if (isset($_POST['edit-reimbursement-id'])) {
            $code = new Encryption;
//            $staffedit = $_POST['edit-staff-id'];
            $id = $_POST['edit-reimbursement-id'];
            $requestid = $code->encode($id); //encode request id
            $editunitcost = $_POST['edit-unit-cost']; // getting unitcost
            $editquantity = $_POST['edit-quantity']; //getting quanity
            $edittotal = $editunitcost * $editquantity; //getting total

            $model = TReimbursement::model()->findBypk($id);
            $model->expenditure = $_POST['edit-expenditure'];
            $model->currency = $_POST['edit-currency'];
            $model->unit_cost = $editunitcost;
            $model->quantity = $editquantity;
            $model->total = $edittotal;
            $model->start_date = $_POST['edit-start-date'];
            $model->end_date = $_POST['edit-end-date'];
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('finance/reimbursement/view', 'id' => $requestid));
        }
        // delete request
        if (isset($_POST['delete-reimbursement-id'])) {
            $code = new Encryption;
            $id = $_POST['delete-reimbursement-id'];
            $requestid = $code->encode($id); //encode request id
//            delete the reimbursement
            $model = TReimbursement::model()->findBypk($id);
            $model->status = 'C';
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
//            delete the notes on the reimbursement too
            $model1 = TNotes::model()->findAllByAttributes(array('reimbursement' => $id));
            foreach ($model1 as $record) {
                $record->status = 'C';
                if ($record->update()) {
                    //log success
                } else {
                    //log error
                }
            }
            $this->redirect(array('finance/reimbursement'));
        }
        // submit request
        if (isset($_POST['submit-reimbursement-id'])) {
            $code = new Encryption;
//            $staffedit = $_POST['delete-staff-id'];
            $id = $_POST['submit-reimbursement-id'];
            $requestid = $code->encode($id); //encode request id

            $model = TReimbursement::model()->findBypk($id);
            $model->status = 'N';
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('finance/reimbursement'));
        }
        // add note
        if (isset($_POST['reimbursement-id'])) {
            $code = new Encryption;
            $id = $_POST['reimbursement-id'];
            $requestid = $code->encode($id); //encode request id

            $model = new TNotes();
            $model->reimbursement = $_POST['reimbursement-id'];
            $model->note = $_POST['reimbursement-note'];

            if ($model->save()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('finance/reimbursement/view', 'id' => $requestid));
        }
        // edit note
        if (isset($_POST['edit-note-id'])) {
            $code = new Encryption;
            $note_id = $_POST['edit-note-id'];
            $id = $_POST['reimbursement-id-edit'];
            $requestid = $code->encode($id); //encode request id

            $model = TNotes::model()->findByPk($note_id);
            $model->note = $_POST['edit-reimbursement-note'];

            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('finance/reimbursement/view', 'id' => $requestid));
        }
        // delete note
        if (isset($_POST['delete-note-id'])) {
            $code = new Encryption;
            $note_id = $_POST['delete-note-id'];
            $id = $_POST['reimbursement-id-delete'];
            $requestid = $code->encode($id); //encode request id

            $model = TNotes::model()->findByPk($note_id);
            $model->status = 'X';

            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('finance/reimbursement/view', 'id' => $requestid));
        }

        $this->render('view');
    }

}
