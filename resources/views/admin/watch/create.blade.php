@extends('layouts.admin')

@section('title_1_uz')
    Добавить новые данные
@endsection

@section('main')
    <div class="main-content">
        <div class="breadcrumb">
            <h1 class="mr-2">Добавить новые данные</h1>
            <ul>
                <li><a href="{{ route('watch.index') }}">Все данные</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('watch.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                             
                            <div class="col-md-6 form-group mb-3">
                                    <label>Title (uz)</label>
                                    <input class="form-control @error('	title_uz') is-invalid @enderror"
                                           autocomplete="off" placeholder="Например: dizayn" name="title_uz" type="title_uz">
                                    @error('title_uz')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>Title (ru)</label>
                                    <input class="form-control @error('	title_ru') is-invalid @enderror"
                                           autocomplete="off" placeholder="Например: dizayn" name="title_ru" type="title_ru">
                                    @error('title_ru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>





                                <div class="col-md-6 form-group mb-3">
                                    <label>Text 1 (uz)</label>
                                    <input class="form-control @error('	text_1_uz') is-invalid @enderror"
                                           autocomplete="off" placeholder="Например: work" name="text_1_uz" type="text_1_uz">
                                    @error('text_1_uz')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-md-6 form-group mb-3">
                                    <label>Text 1 (ru)</label>
                                    <input class="form-control @error('	text_1_ru') is-invalid @enderror"
                                           autocomplete="off" placeholder="Например: work" name="text_1_ru" type="text_1_ru">
                                    @error('text_1_ru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                
                                <div class="col-md-6 form-group mb-3">
                                    <label>Text 2 (uz)</label>
                                    <input class="form-control @error('	text_2_uz') is-invalid @enderror"
                                           autocomplete="off" placeholder="Например: work" name="text_2_uz" type="text_2_uz">
                                    @error('text_2_uz')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group mb-3">
                                    <label>Text 2 (ru)</label>
                                    <input class="form-control @error('	text_2_ru') is-invalid @enderror"
                                           autocomplete="off" placeholder="Например: work" name="text_2_ru" type="text_2_ru">
                                    @error('text_2_ru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-12 form-group mb-3" style="padding-top:30px;">
                                    <strong>Выберите изображению:</strong>
                                    <br/>
                                    <input type="file" name="image">

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

