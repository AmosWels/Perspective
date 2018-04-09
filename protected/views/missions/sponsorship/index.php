<?php
/* @var $this SponsorshipController */

$this->breadcrumbs=array(
	'Sponsorship',
);
?>
<?php
//echo $this->id . '/' . $this->action->id;
$userid = Yii::app()->user->userid;

$code = new Encryption;
$model = TGoals::model()->findAll("status='D' and maker='$userid'");
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
                                        <span class="black-text">Goals</span>
                                        <?php // echo CHtml::link('Panel', array('missions/panel')); ?> 
                                        <!--<span>Goals </span>-->
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m4 16">                                
                                <ul class="tabs">
                                    <li class="tab col s3"><a href="#draft">Draft <span class="red white-text circle">&nbsp <?php echo count($model); ?> &nbsp;</span></a></li>
                                    <li class="tab col s3"><a href="#inbox">Inbox <span class="red white-text circle">&nbsp 0 &nbsp;</span></a></li>
                                    <li class="tab col s3"><a href="#sugestedpips">Suggested <span class="red white-text circle">&nbsp 0 &nbsp;</span></a></li>
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
                        <a href="#sponsor" class="btn-floating btn-large waves-effect tooltipped modal-trigger"  data-position="left" data-delay="50" data-tooltip="Sponsor New Mission" >
                            <i class="large material-icons">add</i>
                        </a>
                    </div>       
                    <?php
                    ?>
                    <div class="card z-depth-0">
                        <div class="card-content">
                            <table id="example" class="display responsive-table datatable-example">
                                <thead>
                                    <tr>
                                        <th style="width: 1050px;">Mission(s)</th>
                                    </tr>
                                </thead>
                                <tfoot><tr></br></tr></tfoot>
                                <tbody>
                                    <?php
                                    if (!empty($model)) {
                                        $t = 1;
                                        foreach ($model as $record) {
//                                            title
                                            $title = $record->title;
                                            $description = $record->description;
                                            $datecreated = $record->createdon;
                                            $date = date("d/m/Y", strtotime("$datecreated")); // getting date only
                                            $time1 = date("H:i:s", strtotime("$datecreated")); // getting time only
                                            
                                            if (strlen($description) > 380){
                                            $description1 = substr($description, 0, 380) . ' . . .'; } else{ $description1 = $description;}
                                            ?>
                                            <tr onclick="location.href = '<?php echo @Yii::app()->baseUrl; ?>/index.php?r=missions/sponsorship/view&id=<?php echo $code->encode($record->id); ?>'">
                                                <td>
                                                <div id="web"> 
                                            <div class="search-result">
                                                <a class="search-result-title"><span> <?php echo $t.' .';?> </span>&nbsp;<?php echo $title; ?>&nbsp;</a>
                                                <p class="search-result-description" style="margin-left: 30px;"><span class="black-text">Description</span> &rtrif; <span><?php echo $description1; ?></span></p>
                                                <a class="search-result-link">
                                                    <span class="attachment-info" style="text-align: justify; margin-left: 30px;">
                                                        <span class="black-text">Created On &rtrif;</span>
                                                        <code><?php echo date_format(date_create($datecreated), "d / F / Y") ; ?> at  <?php echo $time1 . ' hrs.'?></code></span>
                                                </a>
                                            </div>
                                                </div><br>
                                                <!--<hr class="grey lighten-5" style="border-style: dotted; border-width: 0.5px 0; margin: 0px 0;">-->
                                                </td>
                                            </tr>
                                              <?php $t++;
                                        }
                                    } else{ ?>
                                        <code class="red-text center" style="margin-left: 450px;">! -------- No Mission Record(s) were found -------- !</code>
                                   <?php }
                                    ?>                                        
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> 

                <!--###############################-->
                <div id="inbox">
                    <div class="card">
                        <div class="card-content">
                            <h3>Inbox Mission ...</h3>
                        </div>
                    </div>
                </div>                
                <div id="sugestedpips">
                    <div class="card">
                        <div class="card-content">
                            <h3>Suggested Mission ...</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
//sponsor goal
include_once 'modals/sponsormission.php';

?>
