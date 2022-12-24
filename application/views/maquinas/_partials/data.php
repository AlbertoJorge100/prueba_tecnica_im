<?php foreach($maquinas as $m){?>
    <tr id="maquina-<?=$m->id?>">
        <td><?=$m->codigo?></td>
        <td><?=$m->nombre?></td>
        <td><?=$m->tipo?></td>
        <td><?=$m->descripcion?></td>                
        <td>
            <a href="#" onclick="openModal('<?=site_url().'/maquinas/modal'?>', 'Editar maquina','mq-<?=$m->id?>','POST','<?=$m->id?>')" class="btn btn-primary">editar</a>&nbsp;
            <a href="#" onclick="deleteItem('<?=site_url().'/maquinas/delete'?>','<?=$m->id?>','mq-<?=$m->id?>')" class="btn btn-danger">eliminar</a>                    
        </td>
    </tr>
<?php } ?>