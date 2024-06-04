@extends('panel.layouts.app')



@section('content')

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @elseif(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif


    <div class="container py-5">
        <h1 class="mb-4">Araba Bilgileri</h1>
        <form action="{{route('admin.model.store')}}" method="post" >
            @csrf

            <div class="row g-5">
                <div class="col-md-12 col-lg-6 col-xl-12">
                    <div class="form-group">

                        <div class="col-md-12 col-lg-6 col-xl-7">
                            <label class="form-label my-2">Marka İsmi<sup>*</sup></label>
                            <select name="brand_id" id="brand_id" class="form-control">
                                <option value="" selected disabled>Seçiniz</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}" @if($brands->count()==1) selected @endif>{{$brand->name}}</option>
                                @endforeach
                            </select>
                            <div class="form-item">
                                <label class="form-label my-2">Model İsmi<sup>*</sup></label>
                                <input name="name" type="text" class="form-control" required>
                            </div>
                            <button type="submit" class="btn border-secondary py-3 mt-3 px-4 text-uppercase  text-primary">Oluştur</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
