<?php

class SFIndex extends CWidget{
    public $column1;
    public $column2;
    public $column3;
    
    public function init(){
        parent::init();
        
        $this->columna1($this->column1);
        echo "<div class=\"col-lg-8\">\n";
        $this->columna23($this->column2, $this->column3);
        echo "</div>\n";
        
    }
    
    public function columna1($columna){ 
        echo "<div class=\"col-lg-4\">\n";
        foreach($columna as $item){
            echo "<div class=\"col-lg-12 departamento\">\n";
            echo "<p class=\"titulo\">";
            echo "<img src=\"".Yii::app()->request->baseUrl."/images/anclas_25.png\"/>";  
            echo $item->nombre;
            echo "</p>\n";
            
            foreach($item->categoria as $categoria){
                echo "<p class=\"subtitulo\">";
                echo $categoria->nombre;
                echo "</p>";
                
                foreach($categoria->subcategoria as $subcategoria){
                    echo "<ul>";
                    if($subcategoria->tipo_idtipo==1){
                        echo "<li><a href=\"".$subcategoria->url."\" target=\"_blank\">".$subcategoria->nombre."</a></li>";
                    }else{
                        echo "<li><a href=\"".Yii::app()->createUrl('subcategoria/view',array('id'=>$subcategoria->idsubcategoria)) ."\">".$subcategoria->nombre."</a></li>";
                    }
                    echo "</ul>";
                }
            }
            echo "\n</div>\n"; 
        } 
        echo "</div>\n";
    }
    
    public function columna23($columna2, $columna3){ 
        $this->slider();
        echo "<div class=\"col-lg-6\">\n";
        foreach($columna2 as $item){
            echo "<div class=\"col-lg-12 departamento\">\n";
            echo "<p class=\"titulo\">";
            echo "<img src=\"".Yii::app()->request->baseUrl."/images/anclas_25.png\"/>";  
            echo $item->nombre;
            echo "</p>\n";
            
            foreach($item->categoria as $categoria){
                echo "<p class=\"subtitulo\">";
                echo $categoria->nombre;
                echo "</p>";
                
                foreach($categoria->subcategoria as $subcategoria){
                    echo "<ul>";
                    if($subcategoria->tipo_idtipo==1){
                        echo "<li><a href=\"".$subcategoria->url."\" target=\"_blank\">".$subcategoria->nombre."</a></li>";
                    }else{
                        echo "<li><a href=\"".Yii::app()->createUrl('subcategoria/view',array('id'=>$subcategoria->idsubcategoria)) ."\">".$subcategoria->nombre."</a></li>";
                    }
                    echo "</ul>";
                }
            }
            echo "\n</div>\n"; 
        } 
        echo "</div>\n";
        
        echo "<div class=\"col-lg-6\">\n";
        foreach($columna3 as $item){
            echo "<div class=\"col-lg-12 departamento\">\n";
            echo "<p class=\"titulo\">";
            echo "<img src=\"".Yii::app()->request->baseUrl."/images/anclas_25.png\"/>";  
            echo $item->nombre;
            echo "</p>\n";
            
            foreach($item->categoria as $categoria){
                echo "<p class=\"subtitulo\">";
                echo $categoria->nombre;
                echo "</p>";
                
                foreach($categoria->subcategoria as $subcategoria){
                    echo "<ul>";
                    if($subcategoria->tipo_idtipo==1){
                        echo "<li><a href=\"".$subcategoria->url."\" target=\"_blank\">".$subcategoria->nombre."</a></li>";
                    }else{
                        echo "<li><a href=\"".Yii::app()->createUrl('subcategoria/view',array('id'=>$subcategoria->idsubcategoria)) ."\">".$subcategoria->nombre."</a></li>";
                    }
                    echo "</ul>";
                }
            }
            echo "\n</div>\n"; 
        } 
        echo "</div>\n";
    }
    
    public function slider(){
        echo "<div class=\"col-lg-12\">";
        echo "<div id=\"sliderA\" class=\"slider\">";
        echo "<img src=\"".Yii::app()->request->baseUrl."/images/imagen1.jpg\" />";
        echo "<img src=\"".Yii::app()->request->baseUrl."/images/imagen2.jpg\" />";
        echo "<img src=\"".Yii::app()->request->baseUrl."/images/imagen3.jpg\" />";
        echo "<img src=\"".Yii::app()->request->baseUrl."/images/imagen4.jpg\" />";
        echo "<img src=\"".Yii::app()->request->baseUrl."/images/imagen5.jpg\" />";
        echo "</div>";
        echo "</div>";
    }
}
?>
