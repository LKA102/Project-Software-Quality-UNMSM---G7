
<?php  
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "php_login_database");  
      $query = "SELECT * FROM recetas WHERE id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                
                <div class="card_image"><img src="data:image/jpg;base64, '.base64_encode($row['imagen']).'"></div>
                <div class="container-registro ">
                <h2 class="titulo">
                '.$row["nombre"].'
                </h2>

                    <div class="container-datos">    
                        <div class="container-izquierdo">
                            <!--pseudonimo-->
                            <b>Hecho por:</b> '.$row["creador"].'
                            <br>
                            
                                <b>Nivel de dificultad:</b> '.$row["dificultad"].'
                          
                            <br>
                            
                                <b>Tiempo de preparación</b> '.$row["tiempo"].'
                            
                            <h3 class="titulo">Ingredientes</h3>
                            <div class="container-ingredientes">
                            
                            <div>'.$row["ingre1"].'</div>
                            <div>'.$row["ingre2"].'</div>
                            <div>'.$row["ingre3"].'</div>
                            <div>'.$row["ingre4"].'</div>
                            <div>'.$row["ingre5"].'</div>
                            <div>'.$row["ingre6"].'</div>
                            <div>'.$row["ingre7"].'</div>
                            <div>'.$row["ingre8"].'</div>
                            
                            </div>
                            <h3 class="titulo">Pasos</h3>
                            <p>'.$row["textpasos"].'</p>
                            
                        </div>
                        
                        
                    </div>
                    
        
                
            </div>
        
                ';  
                
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>
