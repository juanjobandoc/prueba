<div class="container p-2">
    <div class="row">
        <col class="col-md-4 mx-auto">
            <div class="card" style="width:50%">
                <h6 style="text-align:center" class="card-title">Formulario Registro</h6>
                <div class="card-body">
                    <form action="?action=<?php echo $persona->id > 0 ? 'actualizar' : 'registrar'; ?>" method="POST" id="registro">
                        <div class="form-group">
                            <input type="text" name="id" value="<?php echo $persona->__GET('id'); ?>" 
                            <?php echo $persona->id > 0 ? 'readonly':'';?> class="form-control"
                            placeholder="Identificación..." autofocus required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="Nombre" value="<?php echo $persona->__GET('Nombre'); ?>" 
                            class="form-control" placeholder="Nombre..." required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="Apellido" value="<?php echo $persona->__GET('Apellido'); ?>"
                            class="form-control" placeholder="Apellido..." required>
                        </div>
                        <div class="form-group">
                            <select name="Sexo" class="form-control">
                                <option value="1" <?php echo $persona->__GET('Sexo') == 1 ? 'selected' : ''; ?>>Masculino</option>
                                <option value="2" <?php echo $persona->__GET('Sexo') == 2 ? 'selected' : ''; ?>>Femenino</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="date" name="FechaNacimiento" value="<?php echo $persona->__GET('FechaNacimiento'); ?>"
                            class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-block">Guardar</button>                            
                        </div>                    
                        <div class="form-group">
                            <a href="indexPersonas.php" class="btn btn-danger" style="width:100%">Vaciar</a>
                        </div>
                </div>
            </div>
            <div class="card" style="width:50%">
                <h6 style="text-align:center" class="card-title">Amigos Asociados</h6>
                <div class="card-body">
                    <?php include_once 'grillaAmigos.php'; ?>
                </div>
            </div>
        </div> 
    </div>
    <div class="row" style="heigth:50%">
        <col class="col-md-4 mx-auto">
            <div class="card" style="width:100%">
                <h6 style="text-align:center" class="card-title">Personas Agregadas</h6>
                <div class="card-body">
                    <?php include_once 'grillaPersonaxId.php'; ?>
                </div>
            </div>
        </div>   
    </form>
    </diV>
</div>



