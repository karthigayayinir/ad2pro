<?php
/* @var $this ProductInventoryController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->Name=>array('view','id'=>$model->ProductID),
	'Update',
);

$this->menu=array(
	array('label'=>'Create Product', 'url'=>array('create')),
	array('label'=>'View Product', 'url'=>array('view', 'id'=>$model->ProductID)),
	array('label'=>'Manage Product', 'url'=>array('admin')),
);
?>

<h1>Update Product <?php echo $model->ProductID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'countries'=>$countries, 'vendors'=>$vendors)); ?>