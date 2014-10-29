<?php

/**
 * This is the model class for table "publicacion".
 *
 * The followings are the available columns in table 'publicacion':
 * @property string $idpublicacion
 * @property string $usuario_idusuario
 * @property string $subcategoria_idsubcategoria
 * @property string $nombre
 * @property string $extension
 * @property string $create_2
 * @property string $update_2
 */
class Publicacion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'publicacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuario_idusuario, subcategoria_idsubcategoria, nombre, extension', 'required'),
			array('usuario_idusuario, subcategoria_idsubcategoria', 'length', 'max'=>10),
			array('nombre', 'length', 'max'=>100),
                        array('extension', 'file', 'types'=>'jpg, gif, png, doc, docx, xlsx, xls, pdf'),
			array('create_2, update_2', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idpublicacion, usuario_idusuario, subcategoria_idsubcategoria, nombre, create_2, update_2', 'safe', 'on'=>'search'),
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
                    'subcategoria' => array(self::BELONGS_TO,'Subcategoria','subcategoria_idsubcategoria'),
                    'usuario' => array(self::BELONGS_TO,'Usuario','usuario_idusuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idpublicacion' => '#',
			'usuario_idusuario' => 'Usuario Idusuario',
			'subcategoria_idsubcategoria' => 'Subcategoria Idsubcategoria',
			'nombre' => 'Publicación',
			'extension' => 'Extension',
			'create_2' => 'Fecha',
			'update_2' => 'Update 2',
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

		$criteria->compare('idpublicacion',$this->idpublicacion,true);
		$criteria->compare('usuario_idusuario',$this->usuario_idusuario,true);
		$criteria->compare('subcategoria_idsubcategoria',$this->subcategoria_idsubcategoria,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('extension',$this->extension,true);
		$criteria->compare('create_2',$this->create_2,true);
		$criteria->compare('update_2',$this->update_2,true);
                
                $criteria->order = 'create_2 DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Publicacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function beforeSave() {
            if ($this->isNewRecord)
                $this->create_2  = date("Y-m-d H:i:s");
            else
                $this->update_2  = date("Y-m-d H:i:s");

            return parent::beforeSave();
        }
}
