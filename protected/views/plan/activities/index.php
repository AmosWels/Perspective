<?php
//encryption
$code = new Encryption;
?>

<?php
$userid = Yii::app()->user->userid;

$model = TPlan::model()->findAll("status='D' and maker = '$userid'"); // accesing the plan details
?>

<div class="search-header">
    <div class="card card-transparent no-m">
        <div class="card-content no-s">
            <div class="z-depth-1 search-tabs">
                <div class="search-tabs-container">
                    <div class="col s12 m12 l12">
                        <div class="row search-tabs-row search-tabs-header">
                            <div class="col s12 m12 l10 left">
                                <h5 class="" style="font-size: 16px">                                    
                                    <div class="breadcrumbs">
                                        <span class="black-text">Plan</span> &sol;
                                        <span>Planned Activities</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m4 16">                                
                                <ul class="tabs">
                                    <li class="tab col s3"><a href="#draft">Draft <span class="red white-text circle">&nbsp <?php echo count($model); ?> &nbsp;</span></a></li>
                                    <li class="tab col s3"><a href="#inbox">Inbox <span class="red white-text circle">&nbsp 0 &nbsp;</span></a></li>
                                    <li class="tab col s3"><a href="#approved">Approved <span class="red white-text circle">&nbsp 0 &nbsp;</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>    

                </div>
            </div>
        </div>
    </div>
</div>
<div class="card card-transparent no-m">
    <div class="card-content invoice-relative-content search-results-container">
        <div class="col s12 m12 l12">
            <div class="search-page-results">

                <div id="draft">
                    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                        <a class="btn-floating btn-large waves-effect tooltipped modal-trigger" href="#addplan" data-position="left" data-delay="50" data-tooltip="Add" >
                            <i class="large material-icons">add</i>
                        </a>

                    </div>  

                        <div class="card z-depth-0">
                            <div class="card-content">

                                <table id="example" class="display responsive-table datatable-example">
                                    <thead>
                                        <tr>
                                            <th>Activity Detail</th>
                                        </tr>
                                    </thead>
                                    <tfoot><tr></br></tr></tfoot>
                                    <tbody>
                                        <?php
                                        if (!empty($model)) { 
                                            $t = 1;
                                        foreach ($model as $record) {
                                            $activity = $record->name; // activity name
                                            $description = $record->description; // activity name
                                            $deliverable = $record->deliverable; // deliverable
                                            $startdate = $record->start_date; // start date
                                            $datecreated = $record->createdon;
                                            $date = date("d/m/Y", strtotime("$datecreated")); // getting date only
                                            $time1 = date("H:i:s", strtotime("$datecreated")); // getting time only
                                            $startdater = date_format(date_create($startdate), "d / F / Y"); //getting date ui format
                                            $enddate = $record->end_date; // end date
                                            $enddater = date_format(date_create($enddate), "d / F / Y"); // getting date ui format
                                            $deliverableValue = TDeliverable::model()->findByPk($deliverable); //getting deliverable details
                                            $deliverableTitle = $deliverableValue->title; // deliverable name
                                            $deliverableMission = $deliverableValue->mission; // mission
                                            $missionValue = TGoals::model()->findByPk($deliverableMission); // getting mission dtails
                                            $missionName = $missionValue->title; // mission title
                                            
//                                            getting total count of activities in a deliverable
                                            $allactivities = TPlan::model()->findAll("deliverable = '$deliverable'");
                                            $count = count($allactivities);
                                            if (strlen($description) > 190) {
                                                $description1 = substr($description, 0, 190) . ' . . .';
                                            } else {
                                                $description1 = $description . '.';
                                            }
                                            ?>
                                            <!--<tr onclick="location.href = '<?php // echo Yii::app()->baseUrl; ?>/index.php?r=finance/reimbursement/view&id=<?php // echo $code->encode($record->id); ?>'">-->
                                            <tr>
                                                <td>
                                                <div id="web"> 
                                            <div class="search-result">
                                                <a class="search-result-title"><span> <?php echo $t.' .';?> </span>&nbsp;<span class="search-result-description black-text"> Activity </span>&rtrif;<?php echo $activity; ?>&nbsp;&nbsp; 
                                                &nbsp;<span class="search-result-description black-text"> |&nbsp;&nbsp;Deliverable </span>&rtrif;<?php echo $deliverableTitle; ?>&nbsp;&nbsp;<span class="search-result-description black-text"> |&nbsp; Mission </span>&rtrif;<?php echo $missionName; ?>
                                                <span class="new badge" data-badge-caption=" Total Deliverable  Task (s)"><?php echo $count;?></span></a>
                                                <p class="search-result-description" style="margin-left: 30px;"><span class="black-text">Description</span> &rtrif; <span><?php echo $description1; ?></span></p>
                                                <a class="search-result-link">
                                                    <span class="attachment-info" style="text-align: justify; margin-left: 30px;">
                                                        <span class="black-text">Start Date&rtrif;</span>
                                                        <code><?php echo $startdater; ?></code></span>
                                                    <span class="attachment-info" style="text-align: justify; margin-left: 30px;">
                                                        <span class="black-text">End Date&rtrif;</span>
                                                        <code><?php echo $enddater; ?></code></span>
                                                    <span class="attachment-info" style="text-align: justify; margin-left: 30px;">
                                                        <span class="black-text">Created On &rtrif;</span>
                                                        <code><?php echo date_format(date_create($datecreated), "d / F / Y") ; ?> at  <?php echo $time1 . ' hrs.'?></code>
                                                <span class="todo-item pull-right remove-todo-item"><i class="material-icons">delete</i></span>
                                                </a>
                                            </div>
                                                </div>
                                                <!--<hr class="grey lighten-5" style="border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">-->
                                                </td>
                                            </tr>
    <?php  $t++; } } else{
                                        ?> 
                                    <code class="red white-text" style="margin-left: 500px;">No New Activities Planned</code>
                                        <?php }?>                                        
                                    </tbody>
                                </table>

                            </div>
                        </div>


                </div> 

                <!--###############################-->

                <div id="inbox">
                    <h3>Inbox Plans ...</h3>
                </div>                
                <div id="approved">
                    <h3>Approved Plan ...</h3>
                </div>                
            </div>
        </div>
    </div>
</div>

<?php
//add request
include_once 'modals/addplan.php';
?>

