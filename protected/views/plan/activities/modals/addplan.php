<div id="addplan" class="modal modal-fixed-footer">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    $deliverable = TDeliverable::model()->findAll("status='D'");
    ?>
    
    <div class="modal-header" style="margin-left: 10px">
        <span class="grey-text text-darken-4">Add New Plan</span> </br>
        <span class="grey-text ultra-small">Fields marked with <span class="red-text">*</span> are required</span>
    </div>
    <!--<li class="divider"></li>-->
    <div class="modal-content white">
        <div class="row s12">
            <div class="input-field col m6">
                    <!--<input placeholder="....." id="mask5" name="unit-cost" class="masked" type="text" data-inputmask="'numericInput': true, 'mask': '$ 999,999.99', 'rightAlignNumerics':false">-->
                    <input placeholder="....." id="mask5" name="activity" type="text" required="required">
                    <label for="mask5" class="active">Activity Title <span class="red-text">*</span></label>
            </div>
            <div class="col s12 m6">
                <div class="input-field">
                    <select name="deliverable" required="required">    
                    <option value="" disabled selected>Choose ...</option>
                    <?php
                    if (!empty($deliverable)) {
                    
                    foreach ($deliverable as $record) {
                    ?>
                        <option value="<?php echo $record->id;?>"><?php echo $record->title;?></option>
                    <?php } } ?>
                </select>                
                <label>Select Deliverable <span class="red-text">*</span></label>
                </div>
            </div>
        </div>
        <div class="row s12">
            <div class="col s12 m6">
                <div class="input-field">
                    <input placeholder="....." id="label" name="start-date" type="text" required="required" class="masked" data-inputmask="'mask': 'y/m/d'">
                    <label for="label" class="active">Start Date (y/m/d) <span class="red-text">*</span></label>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="input-field">
                    <input placeholder="....." id="label" name="end-date" type="text" required="required" class="masked" data-inputmask="'mask': 'y/m/d'">
                    <label for="label" class="active">End Date (y/m/d) <span class="red-text">*</span></label>
                </div>
            </div>               
        </div>
        <div class="row s12">
            <div class="input-field col s12" required="required">
                <textarea id="pname" placeholder="....." name="description" required="required" class="materialize-textarea"></textarea>
                <label for="pname" class="active"><span class="small">Activity Description</span> <span class="red-text">*</span></label>
            </div>  
        </div>
    </div>
    <div class="modal-footer fixed">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Save</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div> 