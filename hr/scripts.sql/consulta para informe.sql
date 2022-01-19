INFORME CLIENTES

SELECT `ct1_FechaCreacion` as fecha_creacion,`ct1_TipoIdentificacion` as tipo_de_identificacion,`ct1_naturaleza` as naturaleza, `ct1_NumeroIdentificacion` as numero_identificacion,`ct1_dv` as dv,`ct1_Nombre1` as nombre1,`ct1_Nombre2` as nombre2, `ct1_Apellido1` as apellido1,`ct1_Apellido2` as apellido2 ,`ct1_RazonSocial` as nombre_completo_cliente, `ct1_Celular` as celular, `ct1_CorreoElectronico` as email,`ct1_Departamento` as departamento, `ct1_Ciudad` as ciudad, `ct1_Direccion` as direccion  FROM `ct1_terceros` WHERE `ct1_TipoTercero` = 1;




SELECT `ct5_FechaCreacion` as fecha_creacion, `ct5_segmento` as id_segmento, segmento.descripcion as segmento_obra,ct1_terceros.ct1_RazonSocial as nombre_cliente,  `ct5_NombreObra` as nombre_obra, `ct5_DireccionObra` as direccion, `ct5_id_departamento` as id_departamento, departamentos.departamento as departamento, `ct5_id_ciudad` as id_ciudad, municipios.municipio as municipio FROM `ct5_obras` INNER JOIN ct1_terceros ON ct5_obras.ct5_IdTerceros = ct1_terceros.ct1_IdTerceros INNER JOIN segmento ON ct5_obras.ct5_segmento = segmento.id_segmento INNER JOIN departamentos ON ct5_obras.ct5_id_departamento = departamentos.id_departamento INNER JOIN municipios ON ct5_obras.ct5_id_ciudad = municipios.id_municipio