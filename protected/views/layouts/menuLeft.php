<?php
    $controller = $this->id; //Yii::app()->controller->id;
    $action = $this->action->id; //pages
    
    //set menu arrays
//      dashboard menu
        $dashboard_array = array("user");
        $dashboard_status = '';
        $dashboard_color = '';
        
//      finance menu
        $finance_array = array("finance/panel", "finance/reimbursement", "finance/expenses","finance/suppliers");
        $finance_status = '';
        $finance_color = '';
        
//      missions menu
        $missions_array = array("missions/panel","missions/sponsorship","missions/deliverable");
        $missions_status = '';
        $missions_color = '';
        
    if(in_array ($controller, $dashboard_array)){
        $dashboard_status = 'active';
        $dashboard_color = 'cyan-text';
    }elseif(in_array ($controller, $finance_array)){
        $finance_status = 'active';
        $finance_color = 'cyan-text';
    }elseif(in_array ($controller, $missions_array)){
        $missions_status = 'active';
        $missions_color = 'cyan-text';
    } 
?>

<li class="no-padding <?php echo $dashboard_status;?>">
    <?php echo CHtml::link('Dashboard', array('user/panel'), $htmlOptions=array('class'=>'waves-effect waves-grey '.$dashboard_color)); ?>
</li>
<li class="no-padding <?php echo $finance_status;?>">
    <?php echo CHtml::link('Finance', array('finance/panel'), $htmlOptions=array('class'=>'waves-effect waves-grey '.$finance_color)); ?>
</li>
<li class="no-padding <?php echo $missions_status;?>">
    <?php echo CHtml::link('Missions', array('missions/sponsorship'), $htmlOptions=array('class'=>'waves-effect waves-grey '.$missions_color)); ?>
</li>
<li class="no-padding <?php // echo $missions_status;?>">
    <?php echo CHtml::link('Plan', array('#'), $htmlOptions=array('class'=>'waves-effect waves-grey ')); ?>
</li>
<li class="no-padding <?php // echo $missions_status;?>">
    <?php echo CHtml::link('Execute', array('#'), $htmlOptions=array('class'=>'waves-effect waves-grey ')); ?>
</li>
<li class="no-padding <?php // echo $missions_status;?>">
    <?php echo CHtml::link('Monitor and Evaluate', array('#'), $htmlOptions=array('class'=>'waves-effect waves-grey ')); ?>
</li>
<li class="no-padding <?php // echo $missions_status;?>">
    <?php echo CHtml::link('Goal Resources', array('#'), $htmlOptions=array('class'=>'waves-effect waves-grey ')); ?>
</li>
<li class="no-padding <?php // echo $missions_status;?>">
    <?php echo CHtml::link('Test', array('#'), $htmlOptions=array('class'=>'waves-effect waves-grey ')); ?>
</li>
<li class="no-padding <?php // echo $missions_status;?>">
    <?php echo CHtml::link('Risk', array('#'), $htmlOptions=array('class'=>'waves-effect waves-grey ')); ?>
</li>
<!--<li class="no-padding <?php // echo $analytics_status;?>">-->
    <?php // echo CHtml::link('Person', array('people/index'), $htmlOptions=array('class'=>'waves-effect waves-grey '.$analytics_color)); ?>
<!--</li>-->

