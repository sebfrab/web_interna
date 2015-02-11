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
 * @property string $fecha_vigencia_ini
 * @property string $fecha_vigencia_fin
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
                        array('extension', 'file', 'types'=>'jpg, gif, png, doc, docx, xlsx, xls, pdf, pps, ppt'),
			array('create_2, update_2, fecha_vigencia_ini, fecha_vigencia_fin', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idpublicacion, usuario_idusuario, subcategoria_idsubcategoria, nombre, create_2, update_2, fecha_vigencia_ini, fecha_vigencia_fin', 'safe', 'on'=>'search'),
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
			'subcategoria_idsubcategoria' => 'Subcategoria',
			'nombre' => 'Publicación',
			'extension' => 'Archivo',
			'create_2' => 'Fecha Publicación',
			'update_2' => 'Update 2',
                        'fecha_vigencia_ini' => 'Fecha Vigencia Inicio',
                        'fecha_vigencia_fin' => 'Fecha Vigencia Fin',
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
                
                /*$criteria->with=array(
                    'subcategoria',
                );*/

		$criteria->compare('idpublicacion',$this->idpublicacion,true);
		$criteria->compare('usuario_idusuario',$this->usuario_idusuario,true);
		
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('extension',$this->extension,true);
		$criteria->compare('create_2',$this->create_2,true);
		$criteria->compare('update_2',$this->update_2,true);
                //$criteria->compare('subcategoria.privada', false);
                
                $criteria->compare('fecha_vigencia_ini',$this->fecha_vigencia_ini,true);
                $criteria->compare('fecha_vigencia_fin',$this->fecha_vigencia_fin,true);
                
                $criteria->compare('subcategoria_idsubcategoria',$this->subcategoria_idsubcategoria,false);
                //$criteria->condition= "subcategoria_idsubcategoria = $this->subcategoria_idsubcategoria";
                
		return new CActiveDataProvider($this, array(
                        'pagination'=>array(
                                'pageSize'=>20,
                        ),
                        'sort'=>array(
                            'defaultOrder'=>'create_2 DESC',
                        ),
			'criteria'=>$criteria,
		));
	}
        
        public function search2()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
                
                $criteria->with=array(
                    'subcategoria',
                );

		$criteria->compare('idpublicacion',$this->idpublicacion,true);
		$criteria->compare('usuario_idusuario',$this->usuario_idusuario,true);
		$criteria->compare('subcategoria_idsubcategoria',$this->subcategoria_idsubcategoria,true);
		$criteria->compare('t.nombre',$this->nombre,true);
		$criteria->compare('extension',$this->extension,true);
		$criteria->compare('create_2',$this->create_2,true);
		$criteria->compare('update_2',$this->update_2,true);
                $criteria->compare('subcategoria.privada', 0, true);
                
                $criteria->order = 'create_2 DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function searchFechas()
	{
		$criteria=new CDbCriteria;
                
		$criteria->compare('idpublicacion',$this->idpublicacion,true);
		$criteria->compare('usuario_idusuario',$this->usuario_idusuario,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('extension',$this->extension,true);
		$criteria->compare('create_2',$this->create_2,true);
		$criteria->compare('update_2',$this->update_2,true);

                if(empty($this->fecha_vigencia_ini)){
                    $criteria->compare('fecha_vigencia_ini',$this->fecha_vigencia_ini,true);
                }else{
                    $criteria->addCondition('fecha_vigencia_ini >= "'.$this->fecha_vigencia_ini.'" ');
                }
                
                if(empty($this->fecha_vigencia_fin)){
                    $criteria->compare('fecha_vigencia_fin',$this->fecha_vigencia_fin,true);
                }else{
                    $criteria->addCondition('fecha_vigencia_fin <= "'.$this->fecha_vigencia_fin.'" ');
                }

                $criteria->compare('subcategoria_idsubcategoria',$this->subcategoria_idsubcategoria,false);

		return new CActiveDataProvider($this, array(
                        'pagination'=>array(
                                'pageSize'=>20,
                        ),
                        'sort'=>array(
                            'defaultOrder'=>'fecha_vigencia_ini DESC',
                        ),
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
        
        public function getFecha(){
            $time = strtotime($this->create_2);
            return date('d-m-Y H:i:s',$time);;
        }
}
