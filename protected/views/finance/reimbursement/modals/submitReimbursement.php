<!-- submit organization -->
<div id="submitreimbursement" class="modal">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="submit-reimbursement-id" value="<?php echo $newr; ?>">
    <!--<input  type="hidden" name="organ-id" value="<?php // echo $personid; ?>">-->
    <div class="modal-content" style="height: 140px;background-color: ghostwhite;">
        <h4 style="font-size: 14px; ">Submit Reimbursement</h4>
        <p>Are you sure you want to <span class="green-text">Submit</span> Reimbursement request By <span class="green-text">
            <?php echo $staffname; ?></span> with expenditure:</p>
        <li style="margin-left: 25px"><?php echo $expenditurename; ?> ?</li>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-red btn-flat">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">No</a>
    </div>
<?php $this->endWidget(); ?>
</div>