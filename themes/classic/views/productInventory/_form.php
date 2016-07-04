<?php
/* @var $this ProductInventoryController */
/* @var $model Product */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-form',
	'enableAjaxValidation' => true,
        'enableClientValidation' => false,
        'clientOptions' => array(
            'validateOnSubmit' => true,
            'validateOnChange' => false,
            'validateOnType' => false,)
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Name'); ?>
		<?php echo $form->textField($model,'Name',array('size'=>60,'maxlength'=>88)); ?>
		<?php echo $form->error($model,'Name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Description'); ?>
		<?php echo $form->textArea($model,'Description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Status'); ?>
		<?php echo CHtml::dropDownList('Product[Status]',$model->Status, array("1" => "Active", "0" => "InActive"), array()) ?>
		<?php echo $form->error($model,'Status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LocationID'); ?>
		<?php echo CHtml::dropDownList('Product[LocationID]', $model->LocationID, CHtml::listData($countries, 'LocationID', 'Name'), array('prompt'=>'Select Location','ajax' => array('type'=>'POST', 'url'=>Yii::app()->createUrl('ProductInventory/loadvendors'),'update'=>'#Product_VendorID','data'=>array('location_id'=>'js:this.value')))); ?>
		<?php echo $form->error($model,'LocationID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'VendorID'); ?>
		<?php echo CHtml::dropDownList('Product[VendorID]', $model->VendorID, array('prompt'=>'Select Vendor')); ?>
		<?php echo $form->error($model,'VendorID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Quantity'); ?>
		<?php echo $form->textField($model,'Quantity'); ?>
		<?php echo $form->error($model,'Quantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Stock'); ?>
		<?php echo $form->textField($model,'Stock',array('size'=>60,'maxlength'=>88)); ?>
		<?php echo $form->error($model,'Stock'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'StartDate'); ?>
                <?php echo $form->error($model,'StartDate'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model' => $model,
                        'attribute' => 'StartDate',
                        'options' => array(
                            'type' => 'date',
                            'changeMonth' => 'true',
                            'changeYear' => 'true',
                            'yearRange' => '-99:+2',
                            'showAnim' => 'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
                            'showOn' => 'button', // 'focus', 'button', 'both'
                            'dateFormat' => 'yy-m-d',
                            'buttonText' => Yii::t('ui', 'Select Start Date'),
                            'buttonImageOnly' => false,
                        ),
                        'htmlOptions' => array(
                            'type' => 'date',
                            'value' => '',
                            'style' => 'vertical-align:top',
                            'class' => 'collectionDetails-datepicker',
                        ),
                    )); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EndDate'); ?>
                <?php echo $form->error($model,'EndDate'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model' => $model,
                        'attribute' => 'EndDate',
                        'options' => array(
                            'type' => 'date',
                            'changeMonth' => 'true',
                            'changeYear' => 'true',
                            'yearRange' => '-99:+2',
                            'showAnim' => 'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
                            'showOn' => 'button', // 'focus', 'button', 'both'
                            'dateFormat' => 'yy-m-d',
                            'buttonText' => Yii::t('ui', 'Select End Date'),
                            'buttonImageOnly' => false,
                        ),
                        'htmlOptions' => array(
                            'type' => 'date',
                            'value' => '',
                            'style' => 'vertical-align:top',
                            'class' => 'collectionDetails-datepicker',
                        ),
                    ));?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->