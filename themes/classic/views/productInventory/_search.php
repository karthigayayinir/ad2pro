<?php
/* @var $this ProductInventoryController */
/* @var $model Product */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Name'); ?>
		<?php echo $form->textField($model,'Name',array('size'=>60,'maxlength'=>88)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Status'); ?>
		<?php echo CHtml::dropDownList('Product[Status]',$model->Status, array("1" => "Active", "0" => "InActive"), array()) ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'StartDate'); ?>
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
                            'dateFormat' =>  'yy-m-d',
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
		<?php echo $form->label($model,'EndDate'); ?>
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
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->