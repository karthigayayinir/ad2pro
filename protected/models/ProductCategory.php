<?php

/**
 * This is the model class for table "product_category".
 *
 * The followings are the available columns in table 'product_category':
 * @property integer $ProductCategoryID
 * @property string $Name
 * @property integer $Status
 * @property string $CreatedAt
 * @property string $ModifiedAt
 * @property integer $ModifiedBy
 *
 * The followings are the available model relations:
 * @property ProductCategoryMap[] $productCategoryMaps
 */
class ProductCategory extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'product_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Name, Status, CreatedAt, ModifiedAt, ModifiedBy', 'required'),
			array('Status, ModifiedBy', 'numerical', 'integerOnly'=>true),
			array('Name', 'length', 'max'=>88),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ProductCategoryID, Name, Status, CreatedAt, ModifiedAt, ModifiedBy', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'productCategoryMaps' => array(self::HAS_MANY, 'ProductCategoryMap', 'ProductCategoryID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ProductCategoryID' => 'Product Category',
			'Name' => 'Name',
			'Status' => 'Status',
			'CreatedAt' => 'Created At',
			'ModifiedAt' => 'Modified At',
			'ModifiedBy' => 'Modified By',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ProductCategoryID',$this->ProductCategoryID);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('Status',$this->Status);
		$criteria->compare('CreatedAt',$this->CreatedAt,true);
		$criteria->compare('ModifiedAt',$this->ModifiedAt,true);
		$criteria->compare('ModifiedBy',$this->ModifiedBy);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProductCategory the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
