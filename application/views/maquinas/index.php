<button onclick="openModal('<?=site_url().'/maquinas/modal'?>', 'Agregar maquina','','POST','-1')" class="btn btn-primary mb-3">Agregar</button>
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