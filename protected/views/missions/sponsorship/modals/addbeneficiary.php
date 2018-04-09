<div id="beneficiary" class="modal" style="width:500px">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <div class="modal-content white">
        <span class="grey-text text-darken-4">New Beneficiary</span> </br>
        <span class="grey-text ultra-small">Fields Marked with <span class="red-text">*</span> are required</span><br>
          <div class="row">
            <div class="input-field col s12">
                <input placeholder="....." id="title" name="goal-Beneficiary" type="text" required="required">
                <label for="title" class="active">Goal Benficiary <span class="red-text">*</span></label>
            </div>  
          </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Add</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div> 