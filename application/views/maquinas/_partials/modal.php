<form method="POST" id="form-maquinas">
    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>">
    <div class="col-md-12 mb-3">
        <label for="" class="small mb-1">Código</label>
        <input type="text" name="codigo" value="<?=!$insert?$info->codigo:''?>" class="form-control" placeholder="Ingrese el codigo" required>
    </div>
    <div class="col-md-12 mb-3">
        <label for="" class="small mb-1">Nombre</label>
        <input type="text" name="nombre" value="<?=!$insert?$info->nombre:''?>" class="form-control" placeholder="Ingrese el nombre" required>
    </div>
    <div class="col-md-12 mb-3">
        <label for="" class="small mb-1">Descripción</label>
        <input type="text" name="descripcion" value="<?=!$insert?$info->descripcion:''?>" class="form-control" placeholder="Ingrese la descripcion" required>
    </div>
    <div class="col-md-12 mb-3">
        <select name="tipo_id" id="" class="form-control" required>            
            <option value="">--Seleccione un tipo--</option>
            <?php foreach($tipos as $t){?>
                <option value="<?=$t->id?>"
                    <?php if(!$insert && $info->tipo_id == $t->id)
                        echo 'selected';
                    ?>
                ><?=$t->nombre?></option>
            <?php } ?>
        </select>
    </div>
     <div class="col-md-12">        
        <button type="button" id="enviar" onclick="requestData('form-maquinas', '<?=site_url().'/maquinas/store'?>', '', 'POST', '<?=$insert?-1:$info->id?>')"
            class="btn btn-primary">
        <?=$insert?'Registrar':'Modificar'?></button>                                                    
        <button type="button" class="btn btn-danger" onclick="" data-bs-dismiss="modal">Cerrar</button>
    </div>     
</form>