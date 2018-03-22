<!-- delete note -->
<div id="deletenote<?php echo $note->id; ?>" class="modal" >
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="delete-note-id" value="<?php echo $note->id; ?>">
    <input  type="hidden" name="reimbursement-id-delete" value="<?php echo $newr; ?>">
    <div class="modal-content" style="background-color: ghostwhite;">
        <h4 style="font-size: 14px; ">Reimbursement Note<i class="material-icons right" style="color: red;">warning</i></h4>
        <p>Are you sure you want to <span class="red-text">delete</span> reimbursement Note below ?</p>
        <li style="margin-left: 25px"><?php echo $note->note;?> ?</li>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-red btn-flat">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">No</a>
    </div>
<?php $this->endWidget(); ?>
</div>