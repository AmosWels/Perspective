<div id="addrequest" class="modal modal-fixed-footer">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    
    <div class="modal-header" style="margin-left: 10px">
        <span class="grey-text text-darken-4">New Reimbursement Request</span> </br>
        <span class="grey-text ultra-small">Fields with <span class="red-text">*</span> are required</span>
    </div>
    <!--<li class="divider"></li>-->
    <div class="modal-content white">
        <div class="row s12">
            <div class="input-field col s12">
                <select name="staff-id" required="required">    
                    <option value="" disabled selected>Choose ...</option>
                    <?php
                    if (!empty($allactiveUsers)) {
                    
                    foreach ($allactiveUsers as $record) {
                    ?>
                        <option value="<?php echo $record->staff_id;?>"><?php echo $record->names;?></option>
                    <?php } } ?>
                </select>                
                <label>Select Staff <span class="red-text">*</span></label>
            </div>
        </div>
        <div class="row s12">
            <div class="input-field col m6">
                <select name="currency" required="required">    
                    <option value="" disabled selected>Choose ...</option>
                    <?php
                    if (!empty($currency)) {
                    
                    foreach ($currency as $record) {
                    ?>
                        <option value="<?php echo $record->code;?>"><?php echo $record->currency_name;?> ( <?php echo $record->currency_symbol;?> ) </option>
                    <?php } } ?>
                </select>                
                <label>Select Currency <span class="red-text">*</span></label>
            </div>
            <div class="col s12 m6">
                <div class="input-field">
                    <select name="expenditure" required="required">    
                    <option value="" disabled selected>Choose ...</option>
                    <?php
                    if (!empty($expenditure_item)) {
                    
                    foreach ($expenditure_item as $record) {
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
                    <input placeholder="....." id="mask5" name="unit-cost" type="number" required="required">
                    <label for="mask5" class="active">Unit Cost <span class="red-text">*</span></label>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="input-field">
                    <input placeholder="....." id="label" name="quantity" type="text" required="required">
                    <label for="label" class="active">Quantity <span class="red-text">*</span></label>
                </div>
            </div>               
        </div>
        <div class="row s12">
            <div class="col s12 m6">
                <div class="input-field">
                    <input placeholder="....." id="label" name="start-date" type="text" required="required" class="masked" data-inputmask="'mask': 'y/m/d'">
                    <label for="label" class="active">Expense Start Date (y/m/d)<span class="red-text">*</span></label>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="input-field">
                    <input placeholder="....." id="label" name="end-date" type="text" required="required" class="masked" data-inputmask="'mask': 'y/m/d'" value="<?php echo date("Y/m/d"); ?>">
                    <label for="label" class="active">Expense End Date (y/m/d)<span class="red-text">*</span></label>
                </div>
            </div>               
        </div>
    </div>
    <div class="modal-footer fixed">
        <button type="submit" class="modal-action waves-effect waves-blue btn blue ">Save</button>
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn-flat ">Cancel</a>
    </div>
<?php $this->endWidget(); ?>
</div> 