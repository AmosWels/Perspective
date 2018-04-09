<?php

class DeliverableController extends Controller
{
	public function actionIndex()
	{
            $userid = Yii::app()->user->userid;
            //adding goal
        if (isset($_POST['deliverable-title'])) {
            $code = new Encryption;
            $missionid = $_POST['mission_id'];
            $missioncoded = $code->encode($missionid);
            
            $model = new TDeliverable();
            $model->mission = $_POST['mission_id'];
            $model->title = $_POST['deliverable-title'];
            $model->description = $_POST['deliverable-description'];
            $model->maker = $userid;
            if ($model->save()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('missions/deliverable', 'id'=>$missioncoded));
        }
		$this->render('index');
	}
        
        public function actionViewdeliverable()
        {
            //            submitting goal
        if (isset($_POST['submit-goal'])) {
            $goal_id = $_POST['goalid'];
            $model = TGoals::model()->findByPk($goal_id);
            $model->status = 'A';
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('missions/sponsorship'));
        }
            //            adding start and end dates goal
        if (isset($_POST['add-schedule'])) {
            $goal_id = $_POST['goalid'];
            $code = new Encryption;
            $goalcoded_id = $code->encode($goal_id);
            
            $model = TGoals::model()->findByPk($goal_id);
            $model->start_date = $_POST['start_date'];
            $model->end_date = $_POST['end_date'];
            if ($model->update()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('missions/sponsorship/view','id'=>$goalcoded_id ));
        }
		$this->render('viewdeliverable');
        }
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}