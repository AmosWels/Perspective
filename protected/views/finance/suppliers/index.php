<?php
/* @var $this SuppliersController */

$this->breadcrumbs=array(
	'Suppliers',
);
$mapped_expense = TReimbursement::model()->findAll("status!=''");
$mprofile_id = '';
foreach($mapped_expense as $mapped){
    $mprofile_id .= $mapped->id.', ';
}

$ids = rtrim($mprofile_id,', ');
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
                                        <span class="black-text">Finance</span> &sol;
                                         <?php echo CHtml::link('Panel', array('finance/panel')); ?> &sol;
                                        <span>Suppliers</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m12 16">                                
                                <ul class="tabs">
                                    <li class="tab col s12" style="text-align: left">
                                        <span class="grey-text" style="font-size: 14px;">Supplier</span>&nbsp;&nbsp;<span class="red circle white-text">&nbsp;&nbsp;<?php echo count($model);?>&nbsp;&nbsp;</span> 
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
                <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                    <a href="#creatsupplier" class="btn-floating btn-large waves-effect tooltipped modal-trigger"  data-position="left" data-delay="50" data-tooltip="Create Supplier" >
                            <i class="large material-icons">add</i>
                    </a>
                    </div> 

                <!--$##############################3-->
                <?php if (!empty($model)) { ?>
                    
                    <div class="card z-depth-0">
                        <div class="card-content ">
                        <table id="example" class="display responsive-table datatable-example">
                            <thead>
                                <tr>
                                    <th style="width: 30px;">#</th>
                                    <th style="width: 1050px;">Supplier Name</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot><tr></br></tr></tfoot>
                            <tbody>
                                <?php
                                $r=1;
                                foreach ($model as $record) {
                                    switch ($record->status){ case 'A': $status = 'Active'; $btn = 'De-Activate'; $color='green-text'; break; case 'C': $status = 'Closed'; $btn = 'Activate'; $color='red-text'; break; }
                                    $expense_id = $record->id;
                                    $expense = TExpenditureItem::model()->findAll("$expense_id IN ($ids)");
                                    ?>
                                    <!--<tr onclick="href = '#organizationtype-status<?php //echo $record->id;?>'.class='modal-trigger'">-->
                                    <tr class="" >
                                        <td><?php echo $r; ?>.</td>
                                        <td><?php echo $record->names; ?></td>
                                        <td><a class="<?php echo $color; ?> modal-trigger" href="#expense-status<?php echo $record->id;?>"><?php echo $status; ?></a></td>
                                        <td><a href="#editsupplier<?php echo $record->id; ?>" class="modal-trigger" style="color: grey;"><i class="material-icons tiny">edit</i></a>
                                            <a href="#delete<?php echo $record->id; ?>" class="modal-trigger" style="color: grey;"><i class="material-icons tiny">delete</i></a>
                                        </td>
                                    </tr>
                                <?php $r++;
                                    include 'modals/supplierstatus.php';
                                    include 'modals/deletesupplier.php';
                                    include 'modals/editsupplier.php';
                                    } ?>                                        
                            </tbody>
                        </table>
                            
                        </div>
                    </div>
                    
                    <?php } ?>
            </div>
        </div> 
    </div>
</div>
<?php
include_once 'modals/createnewsupplier.php';
?>
