<?php
/* @var $this ProductInventoryController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->Name,
);

$this->menu=array(
	array('label'=>'Create Product', 'url'=>array('create')),
	array('label'=>'Update Product', 'url'=>array('update', 'id'=>$model->ProductID)),
	array('label'=>'Delete Product', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ProductID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Product', 'url'=>array('admin')),
);
?>

<h1>View Product #<?php echo $model->ProductID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ProductID',
		'Name',
		'Description',
		'Status',
		'LocationID',
		'VendorID',
		'Quantity',
		'Stock',
		'StartDate',
		'EndDate',
		'CreateAt',
		'ModifiedAt',
		'ModifiedBy',
	),
)); ?>
