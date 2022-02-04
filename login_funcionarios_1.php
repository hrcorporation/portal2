foreach ($array_rol as $rol_user) {                        
                        switch (intval($rol_user)) {
                            case 101:
                            case '101':
                                break;
                            case 102:
                            case '102':
                                if($cambio_pass){
                                    $php_codigo = "portalcliente/modulos/profile/passnew.php";
                                }else{
                                    $php_codigo = "portalcliente/modulos/remisiones/index.php";
                                }    
                            break;
                            case 103:
                                if($cambio_pass){
                                    $php_codigo = "portalcliente/modulos/profile/passnew.php";
                                }else{
                                    $php_codigo = "portalcliente/modulos/remisiones_cliente/index.php";
                                }
                                break;
                            default:
                                $php_codigo = "cerrar.php";
                                $php_estado = false;
                                $reg = $array_rol;
                                $php_msg = "No tiene Permisos ";
                                break;
                        }

                        if(intval($rol_user) == 101 ){
                            $php_codigo = "portalcliente/modulos/facturacione/index.php";
                            $php_estado = true;
                            $php_msg = "Logeado Correctamente";
                        }elseif (intval($rol_user) == 102 ) {
                            if($cambio_pass){
                                $php_codigo = "portalcliente/modulos/profile/passnew.php";
                            }else{
                                $php_codigo = "portalcliente/modulos/remisiones/index.php";
                            }
                        }elseif(intval($rol_user) == 103){
                            if($cambio_pass){
                                $php_codigo = "portalcliente/modulos/profile/passnew.php";
                            }else{
                                $php_codigo = "portalcliente/modulos/remisiones_cliente/index.php";
                            }
                        }else{
                            $php_codigo = "cerrar.php";
                            $php_estado = false;
                            $reg = $array_rol;
                            $php_msg = "No tiene Permisos";
                        }
                    }