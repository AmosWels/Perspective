<?php

class ActivitiesController extends Controller {

    public function actionIndex() {
        $userid = Yii::app()->user->userid;

        if (isset($_POST['activity'])) {
            $model = new TPlan();
            $model->name = $_POST['activity'];
            $model->deliverable = $_POST['deliverable'];
            $model->description = $_POST['description'];
            $model->start_date = $_POST['start-date'];
            $model->end_date = $_POST['end-date'];
            $model->maker = $userid;
            if ($model->save()) {
                //log success
            } else {
                //log error
            }
            $this->redirect(array('plan/activities'));
        }
        $this->render('index');
    }

}
