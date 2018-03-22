<div id="editreimbursement<?php echo $newr; ?>" class="modal modal-fixed-footer">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="edit-reimbursement-id" value="<?php echo $newr; ?>">
    <input  type="hidden" name="edit-staff-id" value="<?php echo $staff; ?>">
    <div class="modal-header" style="margin-left: 10px">
        <span class="grey-text text-darken-4">Edit Reimbursement Request</span> </br>
    </div>
    <!--<li class="divider"></li>-->
    <div class="modal-content white">
        <div class="row s12">
            <div class="input-field col s12">
                <select name="staff-id" >    
                    <option value="<?php echo $staff;?>"><?php echo $staffname;?></option>
                    <?php
//                    if (!empty($allactiveUsers)) {
//                    
//                    foreach ($allactiveUsers as $record) {
//                        $id = $record->userid;
//                        $idValue = TUser::model()->findByAttributes(array('staff_id'=>$id));
//                        $usersnames = $idValue->names;
                    ?>
                        <option value="<?php echo $staff;?>"><?php echo $staffname;?></option>
                    <?php // } } ?>
                </select>                
                <label>Select Staff <span class="red-text">*</span></label>
            </div>
        </div>
        <div class="row s12">
            <div class="input-field col m6">
                <select name="edit-currency">    
                    <option value="<?php echo $currency; ?>" ><?php echo $currencyname; ?> ( <?php echo $currencySymbol;?> ) </option>
                    <?php
                    if (!empty($allcurrency)) {
                    
                    foreach ($allcurrency as $record) {
                    ?>
                        <option value="<?php echo $record->code;?>"><?php echo $record->currency_name;?> ( <?php echo $record->currency_symbol;?> ) </option>
                    <?php } } ?>
                </select>                
                <label>Select Currency <span class="red-text">*</span></label>
            </div>
            <div class="col s12 m6">
                <div class="input-field">
                    <select name="edit-expenditure" >    
                    <option value="<?php echo $expenditure; ?>" ><?php echo $expenditurename;?></option>
                    <?php
                    if (!empty($allexpenditure_item)) {
                    
                    foreach ($allexpenditure_item as $record) {
                    ?>
                        <option value="<?php echo $record->id;?>"><?php echo $record->name;?></option>
                    <?php } } ?>
                </select>                
                <label>Select Expenditure Item <span class="red-text">*</span></label>
                </div>
            </div>
        </div>
        <div class="row s12">
            <div class="col s12 m6">
                <div class="input-field">
                    <!--<input placeholder="....." id="mask5" name="unit-cost" class="masked" type="text" data-inputmask="'numericInput': true, 'mask': '$ 999,999.99', 'rightAlignNumerics':false">-->
                    <input placeholder="....." id="mask5" name="edit-unit-cost" type="number" value="<?php echo $unitcost;?>">
                    <label for="mask5" class="active">Unit Cost <span class="red-text">*</span></label>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="input-field">
                    <input placeholder="....." id="label" name="edit-quantity" type="text" value="<?php echo $quantity;?>">
                    <label for="label" class="active">Quantity <span class="red-text">*</span></label>
                </div>
            </div>               
        </div>
        <div class="row s12">
            <div class="col s12 m6">
                <div class="input-field">
                    <input placeholder="....." id="label" name="edit-start-date" type="text" class="masked" data-inputmask="'mask': 'y/m/d'" value="<?php echo $startdate; ?>">
                    <label for="label" class="active">Expense Start Date (y/m/d)<span class="red-text">*</span></label>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="input-field">
                    <input placeholder="....." id="label" name="edit-end-date" type="text" class="masked" data-inputmask="'mask': 'y/m/d'" value="<?php echo $enddate; ?>">
                    <label for="label" class="active">Expense End Date (y/m/d)<span class="red-text">*</span></label>
                </div>
            </div>               
        </div>
    </div>
    <div class="modal-footer fixed">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Update</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div> 