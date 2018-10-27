@extends('layouts.layout')

@section('content')
    @if ($errors->any())
        <div class="alert-error">
            <ul class="Error-ul is-list-less">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

            <span class="Error-close"><i class="far fa-times-circle"></i></span>
        </div>
    @endif
    <h2 class="m-t-40">Crear usuario</h2>
    <div class="User">
        <form method="post" action="{{ route('userStore') }}">
            @csrf
            <div class="row  justify-between">
                <div class="col-16 col-l-8 p-r-20">
                    <input type="text" name="name" placeholder="Nombre" value="{{old('name')}}" required>
                    <input type="text" name="identification" placeholder="Cédula" value="{{old('identification')}}"
                           required>
                    <input type="email" name="email" placeholder="E-Mail" value="{{old('email')}}" required>
                    <input type="text" name="phone" placeholder="Número de celular" value="{{old('phone')}}">
                </div>
                <div class="col-16 col-l-8 p-l-20">
                    <input type="password" name="password" placeholder="Contraseña" value="{{old('password')}}"
                           required>
                    <select name="role" id="" required>
                        <option value="">Seleccione un rol</option>
                        <option value="Admin" {{(old('role')  == 'Admin')?'selected':''}}>Administrador</option>
                        <option value="Support" {{(old('role')  == 'Support')?'selected':''}}>Soporte</option>
                    </select>
                    <select name="isActive" id="" required style="margin: 1.6rem 0;">

                        <option value="1"
                                {{(old('isActive')  == '1')?'selected':''}}
                        >Activo
                        </option>
                        <option value="0"
                                {{(old('isActive') == '0')?'selected':''}}
                        >Inactivo
                        </option>
                    </select>
                    <input type="text" name="address" placeholder="Dirección de residencia"  value="{{old('address')}}">
                </div>
                <div class="col-8 m-t-20">
                    <button type="submit">Crear</button>
                </div>
            </div>
        </form>
    </div>
@endsection
