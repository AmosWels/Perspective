<!-- edit note -->
<div id="editnote<?php echo $note->id; ?>" class="modal">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="edit-note-id" value="<?php echo $note->id; ?>">
    <input type="hidden" name="reimbursement-id-edit" value="<?php echo $newr; ?>">
    <div class="modal-content" style="background-color: ghostwhite;">
        <h4 style="font-size: 14px; ">Edit Note </h4>
        <div class="row s12">
            <div class="input-field col s12" required="required">
                <textarea id="pname" name="edit-reimbursement-note" required="required" class="materialize-textarea" ><?php echo $note->note;?></textarea>
                <label for="pname" class="active"><span class="small">Note</span></label>
            </div>  
        </div>
        
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-blue btn blue">Update</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div>