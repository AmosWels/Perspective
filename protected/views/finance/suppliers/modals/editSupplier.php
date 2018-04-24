<div id="editsupplier<?php echo $record->id; ?>" class="modal" style="width: 350px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    $editsuppliergender = TPgender::model()->findAll("status='A'");
    ?>
    <input  type="hidden" name="edit_supplier_id" value="<?php echo $record->staff_id;?>">
    <div class="modal-content white">
        <span class="grey-text text-darken-4">Edit Supplier</span> </br>
        <!--<span class="grey-text ultra-small">Field Marked with <span class="red-text">*</span> is required</span>-->
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="....." id="name" name="new-supplier_name" type="text" required="required" value="<?php echo $record->names; ?>">
                        <label for="name" class="active">Supplier Name</label>
                    </div>  
                </div>
                <div class="row">
                    <div class="col s12">
                        <label>Gender </label>
                        <select name="new-gender" class="browser-default">
                            <option value="<?php echo $gender_id; ?>" disabled><?php echo $genderName; ?></option>
                            <?php
                            if (!empty($editsuppliergender)) {

                                foreach ($editsuppliergender as $record) {
                                    ?>
                                    <option value="<?php echo $record->id; ?>"><?php echo $record->name; ?></option>
                                <?php }
                            }
                            ?>
                        </select>                
                    </div> 
                </div>
    </div>
    <div class="modal-footer">
        <button type="#" class="modal-action waves-effect waves-blue btn blue ">Update</button>
        <!--<a href="#" class="modal-action modal-close waves-effect waves-blue btn grey ">Update</a>-->
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div> 