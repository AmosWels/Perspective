<?php
/* @var $this PeopleController */

$this->breadcrumbs = array(
    'People',
);
?>
<?php
$code = new Encryption;

$newrr = yii::app()->request->getParam('id'); // get id from url
$newr = $code->decode($newrr);
$newrequest = TReimbursement::model()->findbypk($newr); //getting id details
$currency = $newrequest->currency; // currency of request
$staff = $newrequest->staff; // staff requesting
$expenditure = $newrequest->expenditure; //getting expenditure value
$unitcost = $newrequest->unit_cost; // getting unit cost 
$quantity = $newrequest->quantity; // getting quantity
$total = $newrequest->total;
$startdate = $newrequest->start_date; // getting start date
$enddate = $newrequest->end_date; // getting end date
$creationdate = $newrequest->createdon; // getting end date

$expenditureValue = TExpenditureItem::model()->findbypk($expenditure); // geting expenditure details
$expenditurename = $expenditureValue->name; //getting name of expenditure item
$requestcurrency = TCountryCurrency::model()->findByAttributes(array('code' => $currency)); // getting currency details
$currencyname = $requestcurrency->currency_name; //getting currency name
$currencySymbol = $requestcurrency->currency_symbol; //getting currency symbol

$staffValue = TUser::model()->findByAttributes(array('staff_id' => $staff)); // geting staff details
$staffname = $staffValue->names;

$allcurrency = TCountryCurrency::model()->findAll("status='A' ORDER BY country"); //getting all currencies
$allexpenditure_item = TExpenditureItem::model()->findAll("status='A'"); // getting all expenditure items
$notes = TNotes::model()->findAll("status = 'D' and reimbursement='$newr'");
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
                                        <?php echo CHtml::link('Requests', array('finance/reimbursement')); ?> &sol;
                                        <span><?php echo $staffname; ?></span>            </div>

                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m12">                                
                                <ul class="tabs">
                                    <li class="tab col s8" style="text-align: left">
                                        <span class="grey-text text-darken-4"><small class="grey-text">Reimbursement management </small><?php // echo $organName1;    ?>
                                        </span>
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
                <div class="row s12">
                    <!-- <div class="col s6" style="overflow: auto; height: 200px; border: dotted; ">-->
                    <div class="col s8" >
                        <div class="card">
                            <div class="card-content">
                                <div class="card-title">Request Details</div>
                                <!--start of web-->
                                <div id="web"> 
                                    <div class="search-result">
                                        <p class="search-result-title" style="font-size: 14px;"><span class="grey-text text-darken-4">Staff : </span>
                                            <span class="attachment-info">&nbsp;<?php echo $staffname; ?></span>
                                        </p><br>
                                        <p class="search-result-description" style="text-align: justify;">
                                            <span class="grey-text text-darken-4">Expenditure Item : </span> 
                                            <span class="attachment-info"><?php echo $expenditurename; ?></span>
                                        </p><br>
                                        <p class="search-result-description" style="text-align: justify;">
                                            <span class="grey-text text-darken-4">Total : </span> 
                                            <span class="attachment-info"><?php echo $currencySymbol; ?> <?php echo number_format($total, 1) . '.'; ?></span>
                                        </p>
                                        <br>
                                        <a class="grey-text text-darken-4" style="font-size: 14px;">Details</a>
                                        <a class="search-result-link">
                                            <span class="attachment-info black-text">
                                                <span class="grey-text">Currency &rtrif;</span>
                                                <?php echo $currencySymbol; ?> <?php echo $currencyname . '.'; ?> </span><br><br>
                                            <span class="attachment-info black-text">
                                                <span class="grey-text">Quantity &rtrif;</span>
                                                <?php echo $quantity . '.'; ?> </span><br><br>
                                            <span class="attachment-info black-text">
                                                <span class="grey-text">Unit Cost &rtrif;</span>
                                                <?php echo number_format($unitcost, 1) . '.'; ?> </span><br><br>
                                            <span class="attachment-info black-text" >
                                                <span class="grey-text">Expense start Date &rtrif;</span>
                                                <?php echo date_format(date_create($startdate), "d / F / Y") . '.'; ?></span><br><br>
                                            <span class="attachment-info black-text">
                                                <span class="grey-text">Expense End Date &rtrif;</span>
                                                <?php echo date_format(date_create($enddate), "d / F / Y") . '.'; ?></span><br><br>
                                            <span class="attachment-info black-text">
                                                <span class="grey-text">Expense Date Created &rtrif;</span>
                                                <?php echo date_format(date_create($creationdate), "d / F / Y") . '.'; ?>
                                            </span><br><br>
                                        </a>
                                        <br>
                                        <a class="grey-text text-darken-4" style="font-size: 14px;">Citation Actions</a>
                                        <p>     
                                            <span class="search-result-link">
                                                <a href="#editreimbursement<?php echo $newr; ?>" class="modal-trigger" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"> Edit </a> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;  
                                            </span>
                                            <span class="search-result-link">
                                                <a href="#deletereimbursement<?php echo $newr; ?>" class="modal-trigger" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"> Delete</a> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; 
                                            </span>
                                            <span class="search-result-link">
                                                <a href="#" style="color:grey;"class="tooltipped" data-position="top" data-delay="50" data-tooltip="Add Attachment" onmouseover="this.style.color = 'grey';"  onmouseout="this.style.color = 'grey';"> <i class="tiny material-icons" style="">attachment</i></a>
                                            </span>
                                            <span class="search-result-link right">
                                                <a href="#submitreimbursement"  class="btn waves-effect waves-blue btn blue modal-trigger">Submit</a>  
                                            </span>
                                        </p>
                                    </div>
                                </div>
                                <!--end of web-->
                            </div>
                        </div>
                    </div>
                    <div class="col s4">
                        <div class="card" style="overflow: auto; height: 520px;">
                            <div class="card-content">
                                <div class="card-title">Note(s)<a href="#addnote" class="modal-trigger right tooltipped" data-position="top" data-delay="50" data-tooltip="Add New Note">
                                        <i class="material-icons small" style="color: #000">library_add</i></a></div>
                                <?php
                                if (!empty($notes)) {
                                    $t = 1;
                                    foreach ($notes as $note) {
                                        ?>
                                        <ul>
                                            <li><span><?php echo $t . ' . '; ?> </span><?php echo $note->note; ?> <code><?php echo $note->createdon; ?></code></li>
                                        </ul>
                                        <P><span class="search-result-link">
                                                <a href="#editnote<?php echo $note->id; ?>" class="modal-trigger" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"> Edit </a> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;  
                                            </span>
                                            <span class="search-result-link">
                                                <a href="#deletenote<?php echo $note->id; ?>" class="modal-trigger" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"> Delete</a> 
                                            </span></P>
                                        <div class="divider"></div>
                                        <?php
                                        $t++;
                                        include 'modals/deleteNote.php';
                                        include 'modals/editNote.php';
                                    }
                                    ?>   

                                <?php } else { ?>
                                    <code class="red-text center" style="margin-left: 80px; margin-top: 150px;">! ---- No Notes Available ---- !</code>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'modals/editReimbursement.php';
include_once 'modals/deleteReimbursement.php';
include_once 'modals/submitReimbursement.php';
include_once 'modals/addNote.php';
include_once 'modals/addAttachment.php';
?>
