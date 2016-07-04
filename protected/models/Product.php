<?php

/**
 * This is the model class for table "product".
 *
 * The followings are the available columns in table 'product':
 * @property string $ProductID
 * @property string $Name
 * @property string $Description
 * @property integer $Status
 * @property integer $LocationID
 * @property integer $VendorID
 * @property integer $Quantity
 * @property string $Stock
 * @property string $StartDate
 * @property string $EndDate
 * @property string $CreateAt
 * @property string $ModifiedAt
 * @property integer $ModifiedBy
 *
 * The followings are the available model relations:
 * @property Location $location
 * @property Vendor $vendor
 * @property ProductCategoryMap[] $productCategoryMaps
 */
class Product extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Name, Description, Status, LocationID, VendorID, Quantity, Stock, StartDate, EndDate', 'required'),
			array('Status, LocationID, VendorID, Quantity, ModifiedBy', 'numerical', 'integerOnly'=>true),
			array('Name, Stock', 'length', 'max'=>88),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ProductID, Name, Description, Status, LocationID, VendorID, Quantity, Stock, StartDate, EndDate, CreateAt, ModifiedAt, ModifiedBy', 'safe', 'on'=>'search'),
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
			'location' => array(self::BELONGS_TO, 'Location', 'LocationID'),
			'vendor' => array(self::BELONGS_TO, 'Vendor', 'VendorID'),
			'productCategoryMaps' => array(self::HAS_MANY, 'ProductCategoryMap', 'ProductID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ProductID' => 'Product',
			'Name' => 'Name',
			'Description' => 'Description',
			'Status' => 'Status',
			'LocationID' => 'Location',
			'VendorID' => 'Vendor',
			'Quantity' => 'Quantity',
			'Stock' => 'Stock',
			'StartDate' => 'Start Date',
			'EndDate' => 'End Date',
			'CreateAt' => 'Create At',
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

		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('Description',$this->Description,true);
		$criteria->compare('Status',$this->Status);
                if($this->StartDate !== Null || $this->EndDate !== NULL)
                {
                    $criteria->addBetweenCondition('StartDate',$this->StartDate,$this->EndDate);
                    $criteria->addBetweenCondition('EndDate',$this->StartDate,$this->EndDate);
                }

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Product the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
