
@extends('guitarristas.layout')

@section('title',__('CRUD'))

@push('css')
<style>
    /* Personalizar layout*/
</style>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between w-100">
                        <span>@lang('CRUD Laravel')</span>
                        <a href="{{ url('guitarristas/create') }}" class="btn-primary btn-sm">
                            <i class="fa fa-plus"></i> @lang('Criar Novo')
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>@lang('Nome')</td>
                                <td>@lang('Banda')</td>
                                <td>@lang('Idade')</td>
                                <td colspan="3" class="text-center">@lang('Ações')</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($guitarristas as $guitarrista)
                            <tr>
                                <td>{{$guitarrista->id}}</td>
                                <td>{{$guitarrista->nome}}</td>
                                <td>{{$guitarrista->banda}}</td>
                                <td>{{number_format($guitarrista->idade,0,",",".")}}</td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <a href="{{ route('guitarristas.show', $guitarrista->id)}}"
                                        class="btn btn-info btn-sm">@lang('Abrir')
                                    </a>
                                </td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <a href="{{ route('guitarristas.edit', $guitarrista->id)}}"
                                        class="btn btn-primary btn-sm">@lang('Editar')
                                    </a>
                                </td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <form action="{{ route('guitarristas.destroy', $guitarrista->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    // Script personalizado
</script>
@endpush
