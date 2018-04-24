<div id="creatsupplier" class="modal" style="width: 350px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    $suppliergender = TPgender::model()->findAll("status='A'");
    ?>

    <div class="modal-content white">
        <span class="grey-text text-darken-4">New Supplier</span> </br>
        <!--<span class="grey-text ultra-small">Field Marked with <span class="red-text">*</span> is required</span>-->
          <div class="row">
            <div class="input-field col s12">
                <input placeholder="....." id="displayname" name="new-supplier" type="text" required="required">
                <label for="displayname" class="active">Name <span class="red-text">*</span></label>
            </div>  
          </div>
        <div class="row">
            <div class="input-field col s12">
                <select name="new-gender" required="required">    
                    <option value="" disabled selected>Choose ...</option>
                    <?php
                    if (!empty($suppliergender)) {

                        foreach ($suppliergender as $record) {
                            ?>
                            <option value="<?php echo $record->id; ?>"><?php echo $record->name; ?></option>
                        <?php }
                    }
                    ?>
                </select>                
                <label>Gender <span class="red-text">*</span></label>
            </div> 
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Save</button>
        <!--<a href="#" class="modal-action modal-close waves-effect waves-blue btn grey ">Save</a>-->
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div> 