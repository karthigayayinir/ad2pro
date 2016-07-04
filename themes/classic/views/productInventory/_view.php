<?php
/* @var $this ProductInventoryController */
/* @var $data Product */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProductID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ProductID), array('view', 'id'=>$data->ProductID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?>:</b>
	<?php echo CHtml::encode($data->Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Description')); ?>:</b>
	<?php echo CHtml::encode($data->Description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
	<?php echo CHtml::encode($data->Status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LocationID')); ?>:</b>
	<?php echo CHtml::encode($data->LocationID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VendorID')); ?>:</b>
	<?php echo CHtml::encode($data->VendorID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Quantity')); ?>:</b>
	<?php echo CHtml::encode($data->Quantity); ?>
	<br />
</div>