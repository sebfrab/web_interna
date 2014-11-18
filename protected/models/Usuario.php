<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property string $idusuario
 * @property string $departamento_iddepartamento
 * @property string $tipo_usuario_idtipo_usuario
 * @property string $estado_idestado
 * @property string $username
 * @property string $password_2
 * @property string $nombres
 * @property string $apellidos
 * @property string $sexo
 * @property string $last_login
 */
class Usuario extends CActiveRecord
{
	public static $generos=array('H'=>'Hombre','M'=>'Mujer');
	public function tableName()
	{
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo_usuario_idtipo_usuario, estado_idestado, username, password_2, nombres, apellidos, sexo', 'required'),
			array('departamento_iddepartamento, tipo_usuario_idtipo_usuario, estado_idestado', 'length', 'max'=>10),
			array('username', 'length', 'max'=>30),
			array('password_2', 'length', 'max'=>250),
			array('nombres, apellidos', 'length', 'max'=>150),
			array('sexo', 'length', 'max'=>1),
			array('last_login', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idusuario, departamento_iddepartamento, tipo_usuario_idtipo_usuario, estado_idestado, username, password_2, nombres, apellidos, sexo, last_login', 'safe', 'on'=>'search'),
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
                    'estado' => array(self::BELONGS_TO,'Estado','estado_idestado'),
                    'tipo' => array(self::BELONGS_TO,'TipoUsuario','tipo_usuario_idtipo_usuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idusuario' => 'Idusuario',
			'departamento_iddepartamento' => 'Departamento',
			'tipo_usuario_idtipo_usuario' => 'Tipo Usuario',
			'estado_idestado' => 'Estado',
			'username' => 'Username',
			'password_2' => 'Password',
			'nombres' => 'Nombres',
			'apellidos' => 'Apellidos',
			'sexo' => 'Sexo',
			'last_login' => 'Last Login',
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

		$criteria->compare('idusuario',$this->idusuario,true);
		$criteria->compare('departamento_iddepartamento',$this->departamento_iddepartamento,true);
		$criteria->compare('tipo_usuario_idtipo_usuario',$this->tipo_usuario_idtipo_usuario,true);
		$criteria->compare('estado_idestado',$this->estado_idestado,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password_2',$this->password_2,true);
		$criteria->compare('nombres',$this->nombres,true);
		$criteria->compare('apellidos',$this->apellidos,true);
		$criteria->compare('sexo',$this->sexo,true);
		$criteria->compare('last_login',$this->last_login,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function validatePassword($password){
            return $this->hashPassword($password)===$this->password_2;
        }
        
        public function hashPassword($password){
            return md5($password);
        }
        
        public static function getGenero($key=null){
            if($key!==null)
                return self::$generos[$key];
            return self::$generos;
        }
        
        public static function assign($item, $id){
            if(Yii::app()->authManager->checkAccess($item, $id))
                Yii::app()->authManager->revoke($item, $id);
            else
                Yii::app()->authManager->assign($item, $id);
        }
        
        public static function revokeAll($id){
            $auth = Yii::app()->authManager;
            
            $items = $auth->getRoles($id);
            foreach ($items as $item) {
                $auth->revoke($item->name, $id);
                Yii::app()->authManager->save();
            }
            
            $items = $auth->getTasks($id);
            foreach ($items as $item) {
                $auth->revoke($item->name, $id);
                Yii::app()->authManager->save();
            }
            
            $items = $auth->getOperations($id);
            foreach ($items as $item) {
                $auth->revoke($item->name, $id);
                Yii::app()->authManager->save();
            }
        }
        
        protected function beforeSave() {
            if ($this->isNewRecord)
                $this->password_2 = $this->hashPassword($this->password_2);
            return parent::beforeSave();
        }
        
        protected function afterSave(){
            parent::afterSave();
            
            $this->revokeAll($this->idusuario);
            
            switch ($this->tipo_usuario_idtipo_usuario) {
                case 1:
                    $this->assign('Zeus', $this->idusuario);
                    break;
                case 2:
                    $departamento = Departamento::model()->findAll();
                    foreach($departamento as $data){
                        $this->assign('oficial_'.$data->nombre, $this->idusuario);
                    }
                    break;
                case 3:
                    $departamento = Departamento::model()->findAll();
                    foreach($departamento as $data){
                        $this->assign('oficial_'.$data->nombre, $this->idusuario);
                    }
                    break;
                case 4:
                    $departamento = Departamento::model()->findByPk($this->departamento_iddepartamento);
                    $this->assign('oficial_'.$departamento->nombre, $this->idusuario);
                    break;
                case 5:
                    $departamento = Departamento::model()->findByPk($this->departamento_iddepartamento);
                    $this->assign('secretaria_'.$departamento->nombre, $this->idusuario);
                    break;
            }
           
        }

}