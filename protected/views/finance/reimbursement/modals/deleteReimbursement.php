<!-- submit organization -->
<div id="deletereimbursement<?php echo $newr; ?>" class="modal" style="width: 350px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="delete-reimbursement-id" value="<?php echo $newr; ?>">
    <div class="modal-content" style="background-color: ghostwhite;">
        <h4 style="font-size: 14px; ">Reimbursement<i class="material-icons right" style="color: red;">warning</i></h4>
        <p>Are you sure you want to <span class="red-text">delete</span> reimbursement request with expenditure:</p>
        <li style="margin-left: 25px"><?php echo $expenditurename; ?> ?</li>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-red btn-flat">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">No</a>
    </div>
<?php $this->endWidget(); ?>
</div>