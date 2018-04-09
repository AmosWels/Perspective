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
$missionid = $code->decode($id); // getting place details 
$missionValue = TGoals::model()->findbypk($missionid); // getting goal details
$missiontitle = $missionValue->title;
$missiondescription = $missionValue->description;
$missionstartdate = $missionValue->start_date;
$missionenddate = $missionValue->end_date;
$missioncreationdate = $missionValue->createdon;

$missionstartdate1 = date("d/m/Y", strtotime("$missionstartdate"));
$missionenddate1 = date("d/m/Y", strtotime("$missionenddate"));

$date1=date_create("$missionstartdate1");
$date2=date_create("$missionenddate1");
$diff=date_diff($date1,$date2);

$datediff = $missionenddate1 - $missionstartdate1;

$date = date("d/m/Y", strtotime("$missioncreationdate")); // getting date only
$time1 = date("H:i:s", strtotime("$missioncreationdate")); // getting time only
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
                                        <span>View Mission Attributes</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m12">                                
                                    <ul class="tabs">
                                    <li class="tab col s12" style="text-align: left">
                                        <span class="grey-text text-darken-4"><small class="grey-text">Mission Title </small>&rtrif; <?php echo $missiontitle; ?>
                                            &mid; <small class="grey-text">Created On the </small> &rtrif;  <?php echo date_format(date_create($missioncreationdate), "d / F / Y"); ?>  at  <?php echo $time1 . 'hrs';?></span>
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
                        <span class="black-text">Goal Description </span> &rtrif;  <span><?php echo $missiondescription; ?></span>
                    </div>
                    <div class="row s12">
                    <div class="col m4">
                        <ul class="collapsible collapsible-accordion" data-collapsible="accordion">
                            <li class="active">
                             <a href="#schedule" class="modal-trigger" style="font-size: 24px;  font-size: small; font-weight: 400;" href="#" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';">
                                <div class="collapsible-header active grey lighten-4"><i class="material-icons">access_time</i>Timeline <i class="material-icons tiny right">add</i></div></a>
                                <div class="collapsible-body" style="display: block;">
                                    <ul class="black-text">
                                        <li><p>Start Date<span class="right"><?php if(!empty($missionstartdate)){ echo date_format(date_create($missionstartdate), "d / F / Y"); } else{?><code class="red-text">!--No start date--!</code><?php }?></span></p></li>
                                        <li><p>End Date<span class="right"><?php if(!empty($missionenddate)){ echo date_format(date_create($missionenddate), "d / F / Y"); } else{?><code class="red-text">!--No End date--!</code><?php }?></span></p></li>
                                    <li><p>Duration<span class="right"><?php if(!empty($missionenddate) || !empty($missionstartdate) ){ echo $diff->format("%R%a days"); } else{?><code class="red-text">!--Missing date--!</code><?php }?></span></p></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col m4">
                        <ul class="collapsible collapsible-accordion " data-collapsible="accordion">
                            <li class="active">
                             <a style="font-size: 24px;  font-size: small; font-weight: 400;" href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=missions/deliverable&id=<?php echo $id; ?>" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';">
                                <div class="collapsible-header active grey lighten-4"><i class="material-icons">assignment</i>Deliverable <i class="material-icons tiny right">add</i></div></a>
                            </li>
                        </ul>
                    </div>
<!--                     <div class="col m4">
                        <ul class="collapsible collapsible-accordion" data-collapsible="accordion">
                            <li class="active">
                             <a href="#schedule" class="modal-trigger" style="font-size: 24px;  font-size: small; font-weight: 400;" href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=missions/deliverable&id=<?php echo $id; ?>" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';">
                                <div class="collapsible-header active grey lighten-4"><i class="material-icons">access_time</i>Timeline <i class="material-icons tiny right">add</i></div></a>
                            </li>
                        </ul>
                    </div>-->
                    </div>
                      <div class=" right-align">
                         <a href="#submitgoal" class="waves-effect waves-blue btn blue modal-trigger">Submit</a>                                              
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
include_once 'modals/addbeneficiary.php';
//////add schedule
include_once 'modals/addschedule.php';
//////submit goal
include_once 'modals/submitgoal.php';
?>
