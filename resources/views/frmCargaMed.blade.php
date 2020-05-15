@extends('layout', ['template_titulo' => "Padron de Diabéticos"])
@section('contenido')
<div class="flex-center position-ref full-height">
    <div class="content">                            
            <div>
                @csrf
                <div class="row">
                    <div class="col-md-12">                                                
                        @if(session('mensaje'))
                        <div class="alert alert-{{ session('mensaje')['tipo'] }}">
                            <h4>Atención</h4>
                            <?php
                            echo session('mensaje')["mensaje"];
                            ?>
                        </div>
                        @endif
                        <?php
                        //$padron = $padron->toArray();
                        $campos =
                            [
                                "id" => "Clave",
                                "nombre" => "Nombre Afiliado",
                                "dni" => "Dni",                                
                                "dbt" => "Tipo de DB",                                
                                "seccional" => "Seccional",
                                "created_at" => "Creado el",
                                "updated_at" => "Modificado el"
                            ];

                        ?>
                        <div class="row">
                            <div class="col-md-4" id="">
                                <label for="">Seccional</label>
                                <select name="cbSeccional" id="cbSeccional" class="form-control form-control-sm">                                
                                    @foreach ($seccional as $key => $value)
                                        <option value="{{$value->id}}">{{$value->descripcion}}</option>                            
                                    @endforeach                                    
                                    <option value="">--Todos--</option>          
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control form-control-sm " id="txnombre">
                            </div>
                            <div class="col-md-2">
                                <label for="">Dni</label>
                                <input type="text" class="form-control form-control-sm " id="txdni">
                            </div>
                            <div class="col-md-3">
                                <br>
                                <div class="float-right">
                                    <button type="button" class="btn btn-info" id="btnBuscar"><i class="fa fa-search"></i> Buscar</button>                                    
                                </div>
                            </div>

                        </div>
                        </br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-my" style="color:black"  id="tb_padrondbt">
                                <thead class="">
                                    <tr>
                                        @foreach ($campos as $key => $value)
                                        <th>{{$value}}</th>
                                        @endforeach
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <?php /* ?>
            <div class="modal" tabindex="-1" role="dialog" id="modpadron">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">PLANILLA DE REGISTRO DEL PACIENTE CON DIABETES MELLITUS</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">                        
                            <div class="form">
                                <p>Poner Iframe pendiente</p>                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php */?>

    </div>
</div>
<style>
    div.growlUI {
        background: url(check48.png) no-repeat 10px 10px
    }

    div.growlUI h1,
    div.growlUI h2 {
        color: white;
        padding: 5px 5px 5px 75px;
        text-align: left
    }
</style>
<script>
    $(function() {
        var table = ""
     

        $("#btnBuscar").on("click",function(){
            table.ajax.reload();
        });

        $('#tb_padrondbt').on('processing.dt', function(e, settings, processing) {
            if (processing) {                
                $.blockUI();                
            } else {
                $.unblockUI();                
            }
        });

        $('#tb_padrondbt tbody').on('click', '.btnEditar', function () {            
            let url = '' // echo route("form.editar", ":id");
            url = url.replace(':id', $(this).data('key'));
            //let row = $(this).parent().parent().parent();                        

            window.location.href = url;
            /*
            $("#hdaccion").val("/padron/modificar")
            $.post(url, $("#formDet").serialize(), function(resul) {
                $("#txid").val(resul.id);
                $("#txnomb").val(resul.nombre);
                $("#txdni").val(resul.dni);
                $("#txmedi").val(resul.medicacion);
                $("#txdbt").val(resul.dbt);
                $("#txinsu").val(resul.insulina);
                $("#txsecc").val(resul.seccional);
                $.unblockUI();
            });
            **/
        });   
    })
</script>
@endsection