<?php
    $web_name = "IMPRESOS MULTIPLES S.A DE C.V";
?>
<!DOCTYPE html>
<html lang="en">
    <head>        
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?=$title?></title>
        <link href="<?=base_url().'resources/css/styles.css'?>" rel="stylesheet" />
        <!-- <link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}" /> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">        
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
         integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />                        
        <link href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css" rel="stylesheet" />           
        <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>

        <?php
            //Acceso a la api, para mostrar el mensaje de bienvenida!
            $headers = array('Content-Type: application/json',);
            $url = 'https://api.trello.com/1/boards/615e121e55742a5a6ba346bc/cards?key=8b326737f43e5a629e80b9c95b0a6016&token=fcd44ca66295583ff083eb88f93ef882c4836355b6edce681b2b9fc631c15517' ; 
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, false);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );

            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $result = curl_exec($ch);
            curl_close($ch);

            $mensaje = json_decode($result, true)[0]["name"];           
        ?>
    </head>
    <body class="nav-fixed">
        <nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">        
            <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle"><i data-feather="menu"></i></button>          
            <a class="navbar-brand pe-3 ps-4 ps-lg-2" href="<?=base_url()?>"><?=$mensaje?></a>
            <ul class="navbar-nav align-items-center ms-auto">                
                
                <li class="nav-item dropdown no-caret me-3 d-lg-none">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="searchDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="search"></i></a>                    
                    <div class="dropdown-menu dropdown-menu-end p-3 shadow animated--fade-in-up" aria-labelledby="searchDropdown">
                        <form class="form-inline me-auto w-100">
                            <div class="input-group input-group-joined input-group-solid">
                                <input class="form-control pe-0" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                                <div class="input-group-text"><i data-feather="search"></i></div>
                            </div>
                        </form>
                    </div>
                </li>                
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sidenav shadow-right sidenav-light">
                    <div class="sidenav-menu">
                        <div class="nav accordion" id="accordionSidenav">
                           <!-- Sidenav Heading (Addons)-->
                           <div class="sidenav-menu-heading"><?=$web_name?> </div>
                           <!-- Sidenav Link (Charts)-->
                           <a class="nav-link" href="<?=site_url('maquinas/index');?>">
                               <div class="nav-link-icon"><i data-feather="home"></i></div>
                               MAQUINAS
                           </a>              
                           <a class="nav-link" href="<?=site_url('tipos/index');?>">
                               <div class="nav-link-icon"><i data-feather="home"></i></div>
                               TIPOS DE MAQUINAS
                           </a>              
                           <a class="nav-link" href="<?=site_url('maquinas/filtro');?>">
                               <div class="nav-link-icon"><i data-feather="home"></i></div>
                               FILTRAR POR MAQUINAS
                           </a>                                                        
                        </div>
                    </div>
                    <div class="sidenav-footer">
                        <div class="sidenav-footer-content mb-3">
                            <div class="sidenav-footer-subtitle">Usuario logueado:</div>                            
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>                                                       
                    <div class="container-xl px-4 mt-5">         
                        <div class="card">
                            <div class="card-header mb-2">
                                <h5 class="float-start"><?=$title?></h5>                                                
                                <button class="float-end btn-sm btn btn-primary" style="background-color: #2980B9;" onclick="window.history.back()">
                                    <i class="fas fa-backward me-2"></i>
                                    regresar
                                </button>            
                            </div>
                            <div class="card-body">                                                                    
                            <?=$content?>                                                       
                            </div>
                        </div>
                    </div>
                    
                </main> 
                                                          
                <footer class="footer-admin mt-auto footer-light">
                    <div class="container-xl px-4">
                        <div class="row">
                            <div class="col-md-6 small">Copyright &copy; <?=$web_name?> 2022</div>                             
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <!-- modales -->
        <!-- modal normal -->
        <div class="modal fade"  id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="content" class="modal-body">                   
                
                </div>     
            </div>
            </div>
        </div> 

        <!-- modal ancho -->
        <div class="modal fade bd-example-modal-lg" id="exampleModal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title-lg"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div id="content-lg" class="modal-body">                   
                    
                    </div> 
            </div>
            </div>
        </div>        
        
        <!-- scripts -->    
        <script src="<?=base_url().'resources/js/jquery-3.4.1.min.js'?>"></script>    
        <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
        <script src="/js/datatables/datatables-simple-demo.js"></script>
        <script src="/js/litepicker.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>        
        <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/bundle.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="<?=base_url().'resources/js/system.js'?>"></script>        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous">
        </script>                
    </body>
</html>
