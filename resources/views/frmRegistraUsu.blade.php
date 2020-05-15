@extends('layout', ['template_titulo' => "Registro de médico"])
@section('contenido')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div>
            <form action="{{route('padron.registroUsuario')}}" id="formDet" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="msg"></div>
                        @if(session('mensaje'))
                        <div class="alert alert-{{ session('mensaje')['tipo'] }}">
                            <h4>Atención</h4>
                            <?php
                            echo session('mensaje')["mensaje"];
                            ?>
                        </div>
                        @endif
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Error de carga!</strong>
                            <p>En el campos "firma digital" debe cargar un archivo de imagen con los siguientes formatos:</p>
                            <p>jpeg, png, jpg, gif, svg</p>
                            <p>No debe superar el 1mb de tamaño</p>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Usuario</label>
                                    <div class="input-group mb-3">
                                        <input type="text" id="txUsuario" name="txUsuario" class="form-control form-control-sm" value="" placeholder="Usuario" required />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Apellido</label>
                                    <div class="input-group mb-3">
                                        <input type="text" id="txApe" name="txApe" class="form-control form-control-sm" value="" placeholder="Apellido" required />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Nombre</label>
                                    <div class="input-group mb-3">
                                        <input type="text" id="txNom" name="txNom" class="form-control form-control-sm" value="" placeholder="Nombre" required />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Matrícula</label>
                                    <div class="input-group mb-3">
                                        <input type="text" id="txMat" name="txMat" class="form-control form-control-sm" value="" placeholder="Matrícula" required />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Carga de firma digital</label>
                                    <div class="input-group mb-3">
                                        <input type="file" id="fpImagen" name="fpImagen" class="form-control form-control-sm" value="" placeholder="Firma digital" />                                    
                                    </div>
                                </div>
                            </div>    
                            
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Tipo de usuario</label>
                                    <div class="input-group mb-3">
                                        <select name="cbTipoMed" id="cbTipoMed" class="form-control" >
                                            <option value="2">Médico</option>
                                            <option value="3">Farmaceutico</option>
                                        </select>
                                    </div>
                                </div>
                            </div>    

                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Ingrese una clave</label>
                                            <div class="input-group mb-3">
                                                <input type="password" id="txPass" name="txPass" class="form-control form-control-sm" value="" placeholder="ingrese clave"  required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Confirme su clave</label>
                                            <div class="input-group mb-3">
                                                <input type="password" id="txPassConf" name="txPassConf" class="form-control form-control-sm" value="" placeholder="reconfirmar clave" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </br>
                        <div class="col-md-12">
                            <div class="float-left">
                                <br>
                                <a class="btn btn-danger btn-lg" style="margin-bottom:20px" href="{{route('padron.inicio')}}">
                                    Cancelar carga
                                </a>
                            </div>
                            <div class="float-right">
                                <br>
                                <button type="submit" class="btn btn-info btn-lg" id="btnpaso1" >
                                    Confirma carga </button>
                            </div>
                        </div>
                    </div>                    
                </div>
                <script>
                $(function(){
                    var password = document.getElementById("txPass")
                    var confirm_password = document.getElementById("txPassConf");
                    function validatePassword(){
                        if(password.value != confirm_password.value) {
                            confirm_password.setCustomValidity("La clave y la confirmación de la misma debe coincidir!");
                        } else {
                            confirm_password.setCustomValidity('');
                        }
                    }
                    password.onchange = validatePassword;
                    confirm_password.onkeyup = validatePassword;
                })
                </script>
            </form>
        </div>
    </div>
</div>

@endsection