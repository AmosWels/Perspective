<!-- submit organization -->
<div id="addnote" class="modal">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="reimbursement-id" value="<?php echo $newr; ?>">
    <div class="modal-content" style="background-color: ghostwhite;">
        <h4 style="font-size: 14px; ">Add Note </h4>
        <div class="row s12">
            <div class="input-field col s12" required="required">
                <textarea id="pname" name="reimbursement-note" required="required" class="materialize-textarea"></textarea>
                <label for="pname" class="active"><span class="small">Enter Note</span></label>
            </div>  
        </div>
        
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-blue btn blue">Save</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div>