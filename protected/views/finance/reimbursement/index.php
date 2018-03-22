<?php
//encryption
$code = new Encryption;
?>

<?php
$userid = Yii::app()->user->userid;

$allactiveUsers = TUser::model()->findAll("status='A'"); //getting all users
$currency = TCountryCurrency::model()->findAll("status='A' ORDER BY country"); //getting currency details
$expenditure_item = TExpenditureItem::model()->findAll("status='A'"); // getting the expenditure items
$model = TReimbursement::model()->findAll("status='D' and maker = '$userid'"); // accesing the reimbursement details
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
                                        <span>Reimbursement</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m4 16">                                
                                <ul class="tabs">
                                    <li class="tab col s3"><a href="#draft">Draft <span class="red white-text circle">&nbsp <?php echo count($model); ?> &nbsp;</span></a></li>
                                    <li class="tab col s3"><a href="#inbox">Inbox <span class="red white-text circle">&nbsp 0 &nbsp;</span></a></li>
                                    <li class="tab col s3"><a href="#sugestedorgns">Suggested <span class="red white-text circle">&nbsp 0 &nbsp;</span></a></li>
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
                        <a class="btn-floating btn-large waves-effect tooltipped modal-trigger" href="#addrequest" data-position="left" data-delay="50" data-tooltip="Add" >
                            <i class="large material-icons">add</i>
                        </a>

                    </div>  
                    <?php if (!empty($model)) { ?>

                        <div class="card z-depth-0">
                            <div class="card-content">

                                <table id="example" class="display responsive-table datatable-example">
                                    <thead>
                                        <tr>
                                            <th>Staff</th>
                                            <th>Expenditure</th>
                                            <th>Quantity</th>
                                            <th>Unit Cost</th>
                                            <th>Start Date</th>
                                        </tr>
                                    </thead>
                                    <tfoot><tr></br></tr></tfoot>
                                    <tbody>
                                        <?php
                                        foreach ($model as $record) {
//                                    staff
                                            $staff = $record->staff;
                                            $staffValue = TUser::model()->findByAttributes(array('staff_id' => $staff));
                                            $staffnames = $staffValue->names;
                                            if (strlen($staffnames) > 25) {
                                                $staffnames1 = substr($staffnames, 0, 30) . '...';
                                            } else {
                                                $staffnames1 = $staffnames;
                                            }
//                                    expenditure
                                            $expenditure = $record->expenditure;
                                            $expenditureValue = TExpenditureItem::model()->findByPk($expenditure);
                                            $expenditurename = $expenditureValue->name;
//                                    currency label
                                            $currencyla = $record->currency;
                                            $currencyValue = TCountryCurrency::model()->findByAttributes(array('code' => $currencyla));
                                            $currencylabel = $currencyValue->currency_symbol;
                                            ?>
                                            <tr onclick="location.href = '<?php echo Yii::app()->baseUrl; ?>/index.php?r=finance/reimbursement/view&id=<?php echo $code->encode($record->id); ?>'">
                                                <td><?php echo $staffnames1; ?></td>
                                                <td><?php echo $expenditurename; ?></td>
                                                <td><?php echo $record->quantity; ?></td>
                                                <td><?php echo $currencylabel; ?> <?php echo number_format($record->unit_cost, 1); ?></td>
                                                <td><?php echo $record->start_date; ?></td>
                                            </tr>
    <?php } ?>                                        
                                    </tbody>
                                </table>

                            </div>
                        </div>

<?php } else { ?>
                        <div class="card z-depth-0">
                            <div class="card-content">
                                <table id="example" class="display responsive-table datatable-example">
                                    <thead>
                                        <tr>
                                            <th>Reimbursement</th>
                                            <th>Amount</th>
                                            <th>Currency</th>
                                            <th>Created On</th>
                                        </tr>
                                    </thead>
                                    <tfoot><tr></br></tr></tfoot>
                                    <tbody>
                                    </tbody></table>
                            </div>
                        </div>
<?php } ?>
                </div> 

                <!--###############################-->

                <div id="inbox">
                    <h3>Inbox Pending ...</h3>
                </div>                
                <div id="sugestedorgns">
                    <h3>Sugested Pending ...</h3>
                </div>                
            </div>
        </div>
    </div>
</div>

<?php
//add request
include_once 'modals/addrequest.php';
?>

