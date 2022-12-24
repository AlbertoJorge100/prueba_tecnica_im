<form method="POST" id="form-tipos">
    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>">
    <div class="col-md-12 mb-3">
        <label for="" class="small mb-1">Nombre</label>
        <input type="text" name="nombre" value="<?=!$insert?$info->nombre:''?>" class="form-control" placeholder="Ingrese el nombre" required>
    </div>

     <div class="col-md-12">        
        <button type="button" id="enviar" onclick="requestData('form-tipos', '<?=site_url().'/tipos/store'?>', '', 'POST', '<?=$insert?-1:$info->id?>')"
            class="btn btn-primary">
        <?=$insert?'Registrar':'Modificar'?></button>                                                    
        <button type="button" class="btn btn-danger" onclick="" data-bs-dismiss="modal">Cerrar</button>
    </div>     
</form>