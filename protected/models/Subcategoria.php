<?php

/**
 * This is the model class for table "subcategoria".
 *
 * The followings are the available columns in table 'subcategoria':
 * @property string $idsubcategoria
 * @property string $tipo_idtipo
 * @property string $categoria_idcategoria
 * @property string $nombre
 * @property string $orden
 * @property string $url
 */
class Subcategoria extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'subcategoria';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo_idtipo, categoria_idcategoria, nombre, orden', 'required'),
			array('tipo_idtipo, categoria_idcategoria, orden', 'length', 'max'=>10),
			array('nombre', 'length', 'max'=>75),
			array('url', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idsubcategoria, tipo_idtipo, categoria_idcategoria, nombre, orden, url', 'safe', 'on'=>'search'),
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
                    'categoria' => array(self::BELONGS_TO,'Categoria','categoria_idcategoria'),
                    'publicacion' => array(self::HAS_MANY,'Publicacion','subcategoria_idsubcategoria'),
                    'tipo' => array(self::BELONGS_TO,'Tipos','tipo_idtipo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idsubcategoria' => '#',
			'tipo_idtipo' => 'Tipo',
			'categoria_idcategoria' => 'Categoria Idcategoria',
			'nombre' => 'Nombre',
			'orden' => 'Orden',
			'url' => 'Url',
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

		$criteria->compare('idsubcategoria',$this->idsubcategoria,true);
		$criteria->compare('tipo_idtipo',$this->tipo_idtipo,true);
		$criteria->compare('categoria_idcategoria',$this->categoria_idcategoria,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('orden',$this->orden,true);
		$criteria->compare('url',$this->url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Subcategoria the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public static function getListSubCategoria($id){
            if($id>0){
                $Criteria = new CDbCriteria();
                $Criteria->condition = "t.idsubcategoria = $id";
                return CHtml::listData(Subcategoria::model()->findAll($Criteria),'idsubcategoria','nombre');
            }
            return CHtml::listData(Subcategoria::model()->findAll(),'idsubcategoria','nombre');
        }
}
