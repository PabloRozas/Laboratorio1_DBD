@extends('layouts.main')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-5">
            <div class="card">
                <div class="card-header">
                    <h2>Busqueda Avanzada de Canciones</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('songs.filter') }}" method="GET">
                        <div class="row">
                            <div class="col-xl-3">
                                <label>Titulo</label>
                                <input type="text" name="titulo" class="form-control" value="{{ $titulo ?? '' }}">
                            </div>
                            <div class="col-xl-3">
                                <label>Restringida?</label>
                                <input type="text" name="restriccion_edad" class="form-control" value="{{ $restriccion_edad ?? '' }}">
                            </div>
                            <div class="col-xl-3 mt-2">
                                <label>Genero</label>
                                <input type="text" name="nombre_genero" class="form-control" value="{{ $nombre_genero ?? '' }}">
                            </div>
                            <div class="col-xl-12 text-right mt-2">
                                <button class="btn btn-primary" type="submit">Buscar</button>
                            </div>

                        </div>
                    </form>
                </div>
                <div >
                    <form action="{{route('songs.ranking')}}" method="GET">
                        <h2>Más Reproducidos</h2>
                        <button class="btn btn-primary" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
                </tbody>
            </table>
        </div>
    </div>
</div>

