<?php

/**
 * This is the model class for table "t_country_currency".
 *
 * The followings are the available columns in table 't_country_currency':
 * @property integer $ID
 * @property string $country
 * @property string $code
 * @property string $dial_code
 * @property string $currency_name
 * @property string $currency_symbol
 * @property string $currency_code
 * @property string $status
 */
class TCountryCurrency extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_country_currency';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('country, code, dial_code, currency_name, currency_symbol, currency_code', 'required'),
			array('country, currency_name, currency_symbol', 'length', 'max'=>20),
			array('code', 'length', 'max'=>2),
			array('dial_code', 'length', 'max'=>5),
			array('currency_code', 'length', 'max'=>10),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID, country, code, dial_code, currency_name, currency_symbol, currency_code, status', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'country' => 'Country',
			'code' => 'Code',
			'dial_code' => 'Dial Code',
			'currency_name' => 'Currency Name',
			'currency_symbol' => 'Currency Symbol',
			'currency_code' => 'Currency Code',
			'status' => 'Status',
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

		$criteria->compare('ID',$this->ID);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('dial_code',$this->dial_code,true);
		$criteria->compare('currency_name',$this->currency_name,true);
		$criteria->compare('currency_symbol',$this->currency_symbol,true);
		$criteria->compare('currency_code',$this->currency_code,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TCountryCurrency the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
