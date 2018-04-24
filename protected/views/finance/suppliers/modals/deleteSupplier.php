<div id="delete<?php echo $record->id; ?>" class="modal" style="width: 350px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="supplier_delete_id" value="<?php echo $record->staff_id; ?>">
    <div class="modal-content" style="height: 140px;background-color: ghostwhite;">
        <h4 style="font-size: 14px; ">Supplier</h4>
        <p>Are you sure you want to <span class="green-text">Delete</span>: </p>
        <li style="margin-left: 25px"><?php echo $record->names; ?> ? </li>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-green btn-flat">Yes</button>
        <!--<a href="#" class="modal-action modal-close waves-effect waves-grey grey btn-flat">Yes</a>-->
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">No</a>
    </div>
<?php $this->endWidget(); ?>
</div>