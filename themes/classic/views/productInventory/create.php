<?php
/* @var $this ProductInventoryController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Product', 'url'=>array('admin')),
);
?>

<h1>Create Product</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'countries'=>$countries, 'vendors'=>$vendors)); ?>