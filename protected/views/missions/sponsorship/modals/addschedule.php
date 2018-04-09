<div id="schedule" class="modal" style="width:500px">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="add-schedule" value="submit">
    <input type="hidden" name="goalid" value="<?php echo $missionid; ?>">
    <div class="modal-content white">
        <span class="grey-text text-darken-4">New Schedule</span> </br>
        <span class="grey-text ultra-small">Fields Marked with <span class="red-text">*</span> are required</span><br>
        <div class="row s12">
            <div class="input-field col s6">
                <input placeholder="....." id="mark1" name="start_date" type="text" required="required"  class="masked" data-inputmask="'mask': 'y/m/d'" 
                       value=" <?php if(!empty($missionstartdate)){ echo $missionstartdate; } else{ }?> ">
                <label for="mark1" class="active">Start Date (y/m/d)<span class="red-text">*</span></label>
            </div>
            <div class="input-field col s6">
                <input placeholder="....." id="mark1" name="end_date" type="text" class="masked" data-inputmask="'mask': 'y/m/d'" 
                       value=" <?php if(!empty($missionenddate)){ echo $missionenddate; } else{ }?> ">
                <label for="mark1" class="active">End Date (y/m/d)</label>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Add</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
    <?php $this->endWidget(); ?>
</div> 