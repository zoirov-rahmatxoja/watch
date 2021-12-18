@extends('layouts.admin')

@section('title_1_uz')
    Добавить новые данные
@endsection

@section('main')
    <div class="main-content">
        <div class="breadcrumb">
            <h1 class="mr-2">Добавить новые данные</h1>
            <ul>
                <li><a href="{{ route('video.index') }}">Все данные</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                             
                           

                            <div class="col-md-6 form-group mb-3">
                                    <label>link</label>
                                    <input class="form-control @error('link') is-invalid @enderror"
                                           autocomplete="off" placeholder="Например: 4545" name="link" type="text">
                                    @error('link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>



                               
                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

