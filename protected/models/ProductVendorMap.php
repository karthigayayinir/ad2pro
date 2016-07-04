<?php

/**
 * This is the model class for table "product_vendor_map".
 *
 * The followings are the available columns in table 'product_vendor_map':
 * @property string $ProductVendorID
 * @property string $ProductID
 * @property integer $Quantiy
 * @property string $Stock
 * @property integer $VendorID
 * @property string $CreatedAt
 * @property string $ModifiedAt
 * @property integer $ModifiedBy
 *
 * The followings are the available model relations:
 * @property Product $product
 * @property Vendor $vendor
 */
class ProductVendorMap extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'product_vendor_map';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ProductID, Quantiy, Stock, VendorID, CreatedAt, ModifiedAt, ModifiedBy', 'required'),
			array('Quantiy, VendorID, ModifiedBy', 'numerical', 'integerOnly'=>true),
			array('ProductID', 'length', 'max'=>10),
			array('Stock', 'length', 'max'=>88),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ProductVendorID, ProductID, Quantiy, Stock, VendorID, CreatedAt, ModifiedAt, ModifiedBy', 'safe', 'on'=>'search'),
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
			'product' => array(self::BELONGS_TO, 'Product', 'ProductID'),
			'vendor' => array(self::BELONGS_TO, 'Vendor', 'VendorID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ProductVendorID' => 'Product Vendor',
			'ProductID' => 'Product',
			'Quantiy' => 'Quantiy',
			'Stock' => 'Stock',
			'VendorID' => 'Vendor',
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

		$criteria->compare('ProductVendorID',$this->ProductVendorID,true);
		$criteria->compare('ProductID',$this->ProductID,true);
		$criteria->compare('Quantiy',$this->Quantiy);
		$criteria->compare('Stock',$this->Stock,true);
		$criteria->compare('VendorID',$this->VendorID);
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
	 * @return ProductVendorMap the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
