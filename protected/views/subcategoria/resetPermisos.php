<?php

$auth=Yii::app()->authManager;
            $Criteria = new CDbCriteria();
            $Criteria->with=array(
                    'categoria',
                    'categoria.subcategoria',
            );
            $zeus = $auth->createRole('Zeus');
            $jerarquia = Departamento::model()->findAll($Criteria);
            foreach($jerarquia as $departamento){
                $role = $auth->createRole('secretaria_'.$departamento->nombre);
                $role2 = $auth->createRole('oficial_'.$departamento->nombre);
                echo $departamento->nombre;
                echo "<br/>";
                foreach ($departamento->categoria as $categoria){
                    $task = $auth->createTask('mantencion_'.$departamento->nombre.'_'.$categoria->nombre);
                    $task2 = $auth->createTask('ver_'.$departamento->nombre.'_'.$categoria->nombre);
                    
                    $role->addChild('mantencion_'.$departamento->nombre.'_'.$categoria->nombre);
                    $role2->addChild('ver_'.$departamento->nombre.'_'.$categoria->nombre);
                    
                    $zeus->addChild('mantencion_'.$departamento->nombre.'_'.$categoria->nombre);
                    $zeus->addChild('ver_'.$departamento->nombre.'_'.$categoria->nombre);
                    echo $categoria->nombre;
                    echo "<br/>";
                    foreach($categoria->subcategoria as $subcategoria){
                        $auth->createOperation('create_'.$categoria->nombre.'_'.$subcategoria->nombre);
                        $auth->createOperation('delete_'.$categoria->nombre.'_'.$subcategoria->nombre);
                        $auth->createOperation('view_'.$categoria->nombre.'_'.$subcategoria->nombre);
                        
                        $task->addChild('create_'.$categoria->nombre.'_'.$subcategoria->nombre);
                        $task->addChild('delete_'.$categoria->nombre.'_'.$subcategoria->nombre);
                        
                        $task->addChild('view_'.$categoria->nombre.'_'.$subcategoria->nombre);
                        $task2->addChild('view_'.$categoria->nombre.'_'.$subcategoria->nombre);
                        
                        echo $subcategoria->nombre;
                        echo "<br/>";
                    }
                    echo "<br/>";
                }
                echo "<br/>";
                echo "<br/>";
            }
?>
