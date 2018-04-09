<div id="sponsor" class="modal modal-fixed-footer" style="width:500px">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <div class="modal-content white">
        <span class="grey-text text-darken-4">New Mission</span> </br>
        <span class="grey-text ultra-small">Fields Marked with <span class="red-text">*</span> are required</span><br>
          <div class="row">
            <div class="input-field col s12">
                <input placeholder="....." id="title" name="goal-title" type="text" required="required">
                <label for="title" class="active">Mission Title <span class="red-text">*</span></label>
            </div>  
          </div>
        
          <div class="row">
           <div class="input-field col s12">
               <textarea id="icon_prefix2" class="materialize-textarea" placeholder="....." name="goal-description"></textarea>
                <label for="icon_prefix2" class="active">Description <span class="red-text">*</span></label>
            </div>
          </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Save</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div> 