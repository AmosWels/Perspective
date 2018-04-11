<div id="expense-status<?php echo $record->id; ?>" class="modal" style="width: 350px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input  type="hidden" name="expense-id" value="<?php echo $record->id; ?>">
    <input  type="hidden" name="expense-status" value="<?php echo $record->status; ?>">
    <div class="modal-content white" style="height: 115px;">
        <div class="modal-header">
            <i class="material-icons right modal-action modal-close grey-text" title="Close">close</i>
            <span class="black-text">Change Supplier Status</span>
        </div>
        <div class="modal-body">
            <p class="justify">You clicked on <code class="cyan-text"><?php echo $record->names; ?></code> and its current status is <code class="cyan-text"><?php echo $status; ?></code>
        </div>        
    </div>
    <div class="modal-footer">
        <!--<button type="submit" class="btn waves-effect waves-cyan btn-flat cyan-text"><?php // echo $btn; ?></button>-->
        <a href="#" class="modal-action modal-close waves-effect waves-blue btn grey ">De-Activate</a>
    </div>
<?php $this->endWidget(); ?>
</div>