@extends('layouts.admin')

@section('title')
    Редактирование баннера
@endsection

@section('main')
    <div class="main-content">
        <div class="breadcrumb">
            <h1 class="mr-2">Редактирование обо мне</h1>
            <ul>
                <li><a href="{{ route('watch.index') }}">Все данные</a></li>
            </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('watch.update', $watch->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf

                            <div class="row">
                               
                            



                            <div class="col-md-6 form-group mb-3">
                                    <label>Title (uz)</label>
                                    <input class="form-control @error('	title_uz') is-invalid @enderror" value= "{{ $watch->title_uz }}"
                                           autocomplete="off" placeholder="Например: work" name="title_uz" type="title_uz">
                                    @error('title_uz')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-md-6 form-group mb-3">
                                    <label>Title (ru)</label>
                                    <input class="form-control @error('	title_ru') is-invalid @enderror"  value= "{{ $watch->title_ru }}"
                                           autocomplete="off" placeholder="Например: work" name="title_ru" type="title_ru">
                                    @error('title_ru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            <div class="col-md-6 form-group mb-3">
                                    <label>Text (uz)</label>
                                    <input class="form-control @error('	text_1_uz') is-invalid @enderror"  value= "{{ $watch->text_1_uz }}"
                                           autocomplete="off" placeholder="Например: work" name="text_1_uz" type="text_1_uz">
                                    @error('text_1_uz')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                
                                <div class="col-md-6 form-group mb-3">
                                    <label>Text (ru)</label>
                                    <input class="form-control @error('	text_1_ru') is-invalid @enderror"  value= "{{ $watch->text_1_ru }}"
                                           autocomplete="off" placeholder="Например: work" name="text_1_ru" type="text_1_ru">
                                    @error('text_1_ru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>




                          




                                <div class="col-md-6 form-group mb-3">
                                    <label>Text 2 (uz)</label>
                                    <input class="form-control @error('	text_2_uz') is-invalid @enderror"  value= "{{ $watch->text_2_uz }}"
                                           autocomplete="off" placeholder="Например: work" name="text_2_uz" type="text_2_uz">
                                    @error('text_2_uz')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                              
                                <div class="col-md-6 form-group mb-3">
                                    <label>Text 2 (ru)</label>
                                    <input class="form-control @error('	text_2_ru') is-invalid @enderror"  value= "{{ $watch->text_2_ru }}"
                                           autocomplete="off" placeholder="Например: work" name="text_2_ru" type="text_2_ru">
                                    @error('text_2_ru')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>




                                <div class="col-12 form-group mb-3">
                                    <img src="{{ asset( 'storage/' . $watch->image) }}" class="img-fluid"
                                         style="width: 200px;">
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

