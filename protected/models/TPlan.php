<?php

/**
 * This is the model class for table "t_plan".
 *
 * The followings are the available columns in table 't_plan':
 * @property integer $id
 * @property string $name
 * @property integer $deliverable
 * @property string $description
 * @property string $start_date
 * @property string $end_date
 * @property string $createdon
 * @property string $maker
 * @property string $supervisor
 * @property string $status
 */
class TPlan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_plan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, deliverable, description, start_date, end_date, maker', 'required'),
			array('deliverable', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('maker, supervisor', 'length', 'max'=>15),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, deliverable, description, start_date, end_date, createdon, maker, supervisor, status', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'name' => 'Name',
			'deliverable' => 'Deliverable',
			'description' => 'Description',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
			'createdon' => 'Createdon',
			'maker' => 'Maker',
			'supervisor' => 'Supervisor',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('deliverable',$this->deliverable);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('createdon',$this->createdon,true);
		$criteria->compare('maker',$this->maker,true);
		$criteria->compare('supervisor',$this->supervisor,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TPlan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
