<button onclick="openModal('<?=site_url().'/tipos/modal'?>', 'Agregar tipo','','POST','-1')" class="btn btn-primary mb-3">Agregar</button>
<!-- <meta name="__csrf" value="/* $this->security->get_csrf_hash(); */"> -->
<table class="table table-bordered" id="types_table">
    <thead> 
        <tr>
            <th>id</th>
            <th>nombre</th>            
            <th>acciones</th>
        </tr>
    </thead>    
    <tbody id="content-tipos">        
        <?php foreach($tipos as $t){?>
            <tr id="tipos-<?=$t->id?>">                
            <td><?=$t->id?></td>                
                <td><?=$t->nombre?></td>                
                <td>
                    <a href="#" onclick="openModal('<?=site_url().'/tipos/modal'?>', 'Editar tipo','tp-<?=$t->id?>','POST','<?=$t->id?>')" class="btn btn-primary">editar</a>&nbsp;
                    <a href="#" onclick="deleteItem('<?=site_url().'/tipos/delete'?>','<?=$t->id?>','mq-<?=$t->id?>')" class="btn btn-danger">eliminar</a>                    
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<script>
    window.onload=function(){
        data_table=initD('types_table');
    }    
</script>