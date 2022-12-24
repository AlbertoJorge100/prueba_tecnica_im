let tableName = "";
let initializedDataTable;
let initializedDataTableSin;

function initDataTable(tblName = "") {
    if (tblName != "") tableName = tblName;
    const datatablesSimple = document.getElementById(tableName);
    if (datatablesSimple) {
        initializedDataTable = new simpleDatatables.DataTable(
            datatablesSimple,
            {
                labels: {
                    placeholder: "Buscar...",
                    perPage: "{select} Filtrar número de entradas",
                    noRows: "Sin Registros para mostrar",
                    info: "Mostrando {start} a {end} de {rows} entradas",
                },
                perPageSelect: false,
                perPage: 10,
            }
        );
    }
    var tooltipTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="tooltip"]')
    );
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
}

function initD(tabla=""){
    initDataTable(tabla);
    return initializedDataTable;
}

function requestData(form, url, id_contenido, type, id=-1){            
    let frm= $("#"+form);                                
    let newform = frm[0];
    if (!newform.checkValidity()) {
        newform.classList.add("was-validated");        
        toastr.error("Uno o mas campos son invalidos",'error',{timeOut: 3000});              
        return ;
    }                                                  
    let myform=document.getElementById(form);
    let form_d = new FormData(myform);
    form_d.append('id', id);
    
    $.ajax({
        url: url,
        data: form_d,
        cache: false,
        processData: false,
        contentType: false,
        type: type,
        dataType:'html',      
              
        beforeSend:function(){
            // showBlockUI();/*  */
        },
        success:function (response) {
            Swal.fire(
                        "Realizado!",
                        "Registro procesado exitosamente!",
                        "success"
                    ).then(()=>{
                        location.reload();            
                    });              
            
        },
        error:function(error){
            // $.unblockUI();
            Swal.fire(
                "Error!",
                `Error al manipular el registro: ${error}!`,
                "error"
            );
        } 
    }); 
}   


function deleteItem(url, id, id_content){
    Swal.fire({
        title: "Estas seguro que deseas eliminar este registro?",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Eliminar",
    }).then((result) => {
        if (result.isConfirmed) {           
            // var csrf = document.getElementById("meta[name='__csrf']").value;                           
            // debugger            
            $.ajax({                
                url: url, 
                type: 'post', //put: porque solo cambiamos estados....
                data:{
                    'id' : id,
                    "_token": $("input[name=_token]").val()
                },

                datatype: 'json',
                
                beforeSend: function(){
                    // showBlockUI();
                }, 

                success:function(response){
                    console.log("response: "+response);                    
                    Swal.fire(
                        "Realizado!",
                        "Registro eliminado con exito!",
                        "success"
                    ).then(()=>{
                        location.reload();
                    });
                },
                error:function(error){
                    // $.unblockUI();
                    
                    Swal.fire(
                        "Error!",
                        `Error al eliminar el registro: ${error}!`,
                        "error"
                    );
                }            
            });
            
         }
    });   
}               

function openModal(url, title, id_content, method, id, ...param){        
    $.ajax({                  
            url: url,
            type: 'post', //Siempre sera post, porque solo enviara datos..
            dataType:'html',            
            data:{
                title:title,
                id_content: id_content,
                method:method,
                id:id,
                param:param,                            
                //"_token": "{{ csrf_token()}}"
                "_token": $("input[name=_token]").val()
                //"_token":$("meta[name='csrf-token']").attr("content")
            },
            beforeSend:function(){
                // showBlockUI();
            },
            success:function (response) {                            
                // $.unblockUI();  
                if (response.includes("div")) {
                    $("#exampleModal .modal-body").html(response);
                    $('#title').html(title);
                    $("#exampleModal").modal({backdrop: 'static', keyboard: false});
                    $("#exampleModal").modal("show");
                    
                }
            },
            error:function(error){
                // $.unblockUI();
                Swal.fire(
                    "Error!",
                    `Error al abrir el modal: ${error}!`,
                    "error"
                );
            } 
        });        
}   

function closeModal(){
    $("#exampleModal .modal-body").html("");
    $('#title').html("");    
}

function showBlockUI(message = '<i class="fa-5x fas fa-spinner fa-spin"></i>') {
    $.blockUI({
        css: {
            backgroundColor: 'transparent',
            border: 'none'
        },
        message: message,
        baseZ: 1500,
        overlayCSS: {
            backgroundColor: '#FFFFFF',
            opacity: 0.7,
            cursor: 'wait'
        }
    });    
 } 
  
function getMById(url, id){
    $.ajax({
        url: url,
        dataType: 'html',
        type:'get',
        data: {
            id : id
        },
        beforeSend:function(){
            // showBlockUI();
        },
        success:function(response){
            // $.unblockUI();
            if(response.length == 0){
                Swal.fire(
                    "Aviso",
                    "No se encontraron registros",
                    "warning"
                );
                return;
            }
            document.getElementById('content-maquinas').innerHTML = response;
            document.getElementById('btn-refresh').style.display = 'block';
            
        },
        error:function(error){
            // $.unblockUI();
        }
     });
}

function ajaxAll(url){
    $.ajax({
        url: url,
        dataType: 'html',
        type:'get',
        beforeSend:function(){
            // showBlockUI();
        },
        success:function(response){
            // $.unblockUI();
            
            document.getElementById('content-maquinas').innerHTML = response;
            document.getElementById('btn-refresh').style.display = 'none';
            
        },
        error:function(error){
            // $.unblockUI();
        }
     });
}