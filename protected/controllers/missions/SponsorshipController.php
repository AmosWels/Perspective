<?php

class SponsorshipController extends Controller
{
	public function actionIndex()
	{
            $userid = Yii::app()->user->userid;
            //adding goal
        if (isset($_POST['goal-title'])) {
            $model = new TGoals();
            $model->title = $_POST['goal-title'];
            $model->description = $_POST['goal-description'];
            $model->maker = $userid;
            if ($model->save()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('missions/sponsorship'));
        }
            
		$this->render('index');
	}
        public function actionView()
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
		$this->render('view');
        }

}