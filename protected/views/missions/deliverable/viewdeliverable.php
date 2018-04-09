<?php
/* @var $this PersonController */

//$pcode = new Encryption;
$this->breadcrumbs = array(
    'People',
);
?>
<?php
$code = new Encryption;
$id = yii::app()->request->getParam('id');
$deliverableid = $code->decode($id); // getting place details 
$deliverableValue = TDeliverable::model()->findbypk($deliverableid); // getting goal details
$deliverabletitle = $deliverableValue->title;
$deliverabledescription = $deliverableValue->description;
$deliverablestartdate = $deliverableValue->start_date;
$deliverableenddate = $deliverableValue->end_date;
$deliverablecreationdate = $deliverableValue->createdon;

$missionid = $deliverableValue->mission;
$missionValue= TGoals::model()->findByPk($missionid);
$missiontitle = $missionValue->title;

$deliverablestartdate1 = date("d/m/Y", strtotime("$deliverablestartdate"));
$deliverableenddate1 = date("d/m/Y", strtotime("$deliverableenddate"));

$date1=date_create("$deliverablestartdate1");
$date2=date_create("$deliverableenddate1");
$diff=date_diff($date1,$date2);

$datediff = $deliverableenddate1 - $deliverablestartdate1;

$date = date("d/m/Y", strtotime("$deliverablecreationdate")); // getting date only
$time1 = date("H:i:s", strtotime("$deliverablecreationdate")); // getting time only
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
                                        <span class="black-text">Home</span> &sol;
                                        <?php echo CHtml::link('Missions', array('missions/sponsorship')); ?> &sol;
                                        <a href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=missions/sponsorship/view&id=<?php echo $code->encode($missionid); ?>"><?php echo $missiontitle . "'s"; ?> Attributes</a> &sol;
                                        <a href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=missions/deliverable&id=<?php echo $code->encode($missionid); ?>"> Deliverables</a> &sol;
                                        <span><?php echo $deliverabletitle . "'s"; ?> Attributes</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m12">                                
                                    <ul class="tabs">
                                    <li class="tab col s12" style="text-align: left">
                                        <span class="grey-text text-darken-4"><small class="grey-text">Deliverable   Title </small>&rtrif; <?php echo $deliverabletitle; ?>
                                            &mid; <small class="grey-text">Created On the </small> &rtrif;  <?php echo date_format(date_create($deliverablecreationdate), "d / F / Y"); ?>  at  <?php echo $time1 . 'hrs';?></span>
                                    </li>
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
                  <div class="card ">
                    <div class="card-content white row s12">
                        
                    <div class="row s12">
                        <span class="black-text">Deliverable Description </span> &rtrif;  <span><?php echo $deliverabledescription; ?></span>
                    </div>
                    <div class="row s12">
                    <div class="col m4">
                                <ul class="collapsible collapsible-accordion" data-collapsible="accordion">
                                    <li class="active">
                                     <a style="font-size: 24px;  font-size: small; font-weight: 400;" href="#" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';">
                                        <div class="collapsible-header active"><i class="material-icons">access_time</i>Timeline <i class="material-icons tiny right">add</i></div></a>
                                        <div class="collapsible-body" style="display: block;"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p></div>
                                    </li>
                                </ul>
                    </div>
                    <div class="col m4">
                                <ul class="collapsible collapsible-accordion" data-collapsible="accordion">
                                    <li class="active">
                                     <a style="font-size: 24px;  font-size: small; font-weight: 400;" href="#" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';">
                                        <div class="collapsible-header active"><i class="material-icons">change_history</i>Milestone <i class="material-icons tiny right">add</i></div></a>
                                        <div class="collapsible-body" style="display: block;"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p></div>
                                    </li>
                                </ul>
                    </div>
                    <div class="col m4">
                                <ul class="collapsible collapsible-accordion" data-collapsible="accordion">
                                    <li class="active">
                                     <a style="font-size: 24px;  font-size: small; font-weight: 400;" href="#" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';">
                                        <div class="collapsible-header active"><i class="material-icons">account_circled</i>Assign Deliverable <i class="material-icons tiny right">add</i></div></a>
                                        <div class="collapsible-body" style="display: block;"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p></div>
                                    </li>
                                </ul>
                    </div>
                    </div>
                      <div class=" right-align">
                         <a href="#" class="waves-effect waves-blue btn blue">Submit</a>                                              
                      </div> 
                      </div> 
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
////add beneficiary
//include_once 'modals/addbeneficiary.php';
//////add schedule
//include_once 'modals/addschedule.php';
//////submit goal
//include_once 'modals/submitgoal.php';
?>
