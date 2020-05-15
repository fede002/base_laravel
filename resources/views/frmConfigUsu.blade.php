@extends('layout', ['template_titulo' => "Perfil registrado"])
@section('contenido')
<style>
    .destaca {
        border-bottom: solid 1px
    }
</style>

<div class="flex-center position-ref full-height">
    <div class="content">
        <div>
            <form action="{{route('padron.actualizaUsuario')}}" id="formDet" method="POST" enctype="multipart/form-data">
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
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Error de carga!</strong>
                            <p>En el campos "firma digital" debe cargar un archivo de imagen con los siguientes formatos:</p>
                            <p>jpeg, png, jpg, gif, svg</p>
                            <p>No debe superar el 1mb de tamaño</p>
                        </div>
                        @endif
                        <div class="row">

                            <?php
                            $usuario = \Session::get("usuario");
                            //dd($usuario);
                            ?>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">

                                            <div class="col-md-3">
                                                <div class="form-group destaca">
                                                    <label for="">Cuit</label>
                                                    <div class="input-group">
                                                        <label for="" class="">{{$usuario->med_cuit}}</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3 ">
                                                <div class="form-group destaca">
                                                    <label for="">Apellido</label>
                                                    <div class="input-group">
                                                        <label for="" class="">{{$usuario->med_apellido}}</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3 ">
                                                <div class="form-group destaca">
                                                    <label for="">Nombre</label>
                                                    <div class="input-group">
                                                        <label for="" class="">{{$usuario->med_nombre}}</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Ingrese una clave</label>
                                                    <div class="input-group mb-3">
                                                        <input type="password" id="txPass" name="txPass" class="form-control form-control-sm" value="" placeholder="ingrese clave" required />
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
                                    <div class="col-md-4">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Firma digital</label>
                                                    <div class="input-group mb-3">
                                                        <img style="height: 200px;" class="img-fluid" src="{{Storage::url($usuario->med_firmaimg)}}" alt="firmaDigital" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Carga de firma digital</label>
                                                    <div class="input-group mb-3">
                                                        <input type="file" id="fpImagen" name="fpImagen" class="form-control form-control-sm" value="" placeholder="Firma digital" />
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>



                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="float-right">
                                    <br>
                                    <button type="submit" class="btn btn-info" id="btnActualizar"> Actualizar datos </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection