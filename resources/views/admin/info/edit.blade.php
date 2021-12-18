@extends('layouts.admin')

@section('info')
    Редактирование баннера
@endsection

@section('main')
    <div class="main-content">
        <div class="breadcrumb">
            <h1 class="mr-2">Редактирование обо мне</h1>
            <ul>
                <li><a href="{{ route('info.index') }}">Все данные</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('info.update', $info->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                    <label>info</label>
                                    <input class="form-control @error('email') is-invalid @enderror" value="{{ $info->email }}"
                                           autocomplete="off" placeholder="Например: Bakalavr" name="email" type="text">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>phone</label>
                                    <input class="form-control @error('phone') is-invalid @enderror" value="{{ $info->phone }}"
                                           autocomplete="off" placeholder="Например: Bakalavr" name="phone" type="text">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>



                                <div class="col-md-6 form-group mb-3">
                                    <label>phone</label>
                                    <input class="form-control @error('address') is-invalid @enderror" value="{{ $info->address }}"
                                           autocomplete="off" placeholder="Например: Bakalavr" name="address" type="text">
                                    @error('address')
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

