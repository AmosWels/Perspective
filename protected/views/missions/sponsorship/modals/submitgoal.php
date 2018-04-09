<!-- submit organization -->
<div id="submitgoal" class="modal">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'submit-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <input type="hidden" name="submit-goal" value="submit">
    <input type="hidden" name="goalid" value="<?php echo $missionid;?>">
    <div class="modal-content" style="height: 140px;background-color: ghostwhite;">
        <h4 style="font-size: 14px; ">Submit Goal</h4>
        <p>Are you sure you are done working on <span class="black-text">Goal</span> with title </p>
        <li style="margin-left: 25px" class="black-text"><?php echo $missiontitle; ?> ? </li>
    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-green btn-flat">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">No</a>
    </div>
<?php $this->endWidget(); ?>
</div>