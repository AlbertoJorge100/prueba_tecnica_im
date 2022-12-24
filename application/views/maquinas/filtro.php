<div class="row">
    <div class="col-md-3">
        <select name="" onchange="getMById('<?=site_url().'/maquinas/getByType/'?>', this.value)" class="form-control">
            <option value="">- Seleccione una opcion -</option>
            <?php
                foreach($tipos as $t){
            ?>                
                <option value="<?=$t->id?>"><?=$t->nombre?></option>
            <?php } ?>
            
        </select>
    </div>
    <div class="col-md-3" id="btn-refresh" style="display: none;">
        <button class="btn btn-success" onclick="ajaxAll('<?=site_url().'/maquinas/ajaxAll/'?>')">Refrescar</button>
    </div>
</div>


<!-- <meta name="__csrf" value="/* $this->security->get_csrf_hash(); */"> -->
<table class="table table-bordered" id="machines_table">
    <thead> 
        <tr>
            <th>codigo</th>
            <th>nombre</th>
            <th>tipo de maquina</th>
            <th>descripcion</th>
            <th>acciones</th>
        </tr>
    </thead>    
    <tbody id="content-maquinas">        
        <?=$data?>
    </tbody>
</table>
<script>
    window.onload=function(){
        data_table=initD('machines_table');
    }    
</script>