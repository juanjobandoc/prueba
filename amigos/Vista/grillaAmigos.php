<?php
    if(!isset($_POST['id'])){
        if(!isset($_GET['id'])){            
            $valor="";
        }
        else{
            $valor=$_GET["id"];
        }
        
    }
    else{
        $valor=$_POST["id"];
    }   
    
    if($modeloper->ListarAmigos($valor)){?>
        <div class="input-group"> <span class="input-group-addon"><h5>Buscar&nbsp;&nbsp;</h5></span>
            <input id="filtro" type="text" class="form-control" placeholder="Amigo a Buscar...">        
        </div>
        <p></p>
        <div class="table-responsive">          
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th style="text-align:left;">Identificación</th>
                        <th style="text-align:left;">Nombre</th>
                        <th style="text-align:left;">Apellido</th>
                        <th style="text-align:left;">Sexo</th>
                        <th style="text-align:left;">Nacimiento</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="buscar">
                <?php foreach($modeloper->ListarAmigos($valor) as $resultado): ?>
                    <tr>
                        <td><?php echo $resultado->__GET('id'); ?></td>
                        <td><?php echo $resultado->__GET('Nombre'); ?></td>
                        <td><?php echo $resultado->__GET('Apellido'); ?></td>
                        <td><?php echo $resultado->__GET('Sexo') == 1 ? 'H' : 'F'; ?></td>
                        <td><?php echo $resultado->__GET('FechaNacimiento'); ?></td>
                        <td>
                            <a href="?action=eliminaramigo&id=<?php echo $valor.'|'.$resultado->id; ?>" class="btn btn-danger">
                            <span class="fa fa-trash-o fa-lg" aria-hidden="true"></span>
                            </a>
                        </td>           
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
<?php }
    else{ ?>
        <div class="col-md-4 mx-auto">
            <div class="card width=100% card-body text-center">
                <p>No hay Amigos Agregados</p>                            
            </div>
        </div>
<?php } ?>



