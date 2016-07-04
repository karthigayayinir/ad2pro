<?php

/**
 * This is the model class for table "product_location_map".
 *
 * The followings are the available columns in table 'product_location_map':
 * @property string $ProductLocationID
 * @property string $ProductID
 * @property integer $LocationID
 * @property string $CreatedAt
 * @property string $ModifiedAt
 * @property integer $ModifiedBy
 *
 * The followings are the available model relations:
 * @property Location $location
 * @property Product $product
 */
class ProductLocationMap extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'product_location_map';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ProductID, LocationID, CreatedAt, ModifiedAt, ModifiedBy', 'required'),
			array('LocationID, ModifiedBy', 'numerical', 'integerOnly'=>true),
			array('ProductID', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ProductLocationID, ProductID, LocationID, CreatedAt, ModifiedAt, ModifiedBy', 'safe', 'on'=>'search'),
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
			'product' => array(self::BELONGS_TO, 'Product', 'ProductID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ProductLocationID' => 'Product Location',
			'ProductID' => 'Product',
			'LocationID' => 'Location',
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

		$criteria->compare('ProductLocationID',$this->ProductLocationID,true);
		$criteria->compare('ProductID',$this->ProductID,true);
		$criteria->compare('LocationID',$this->LocationID);
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
	 * @return ProductLocationMap the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
