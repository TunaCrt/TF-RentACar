@extends('panel.admin.layouts.app')



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
        <form action="{{route('admin.model.store')}}" method="post">
            @csrf

            <div class="row g-5">
                <div class="col-md-12 col-lg-6 col-xl-12">
                    <div class="form-group">

                        <div class="col-md-12 col-lg-6 col-xl-7">
                            <label class="form-label my-2">Marka İsmi<sup>*</sup></label>
                            <select name="brand_id" id="brand_id" class="form-control">

                                <option value="{{$brand->id}}" selected>{{$brand->name}}</option>

                            </select>
                            <div class="form-item">
                                <label class="form-label my-2">Model İsmi<sup>*</sup></label>
                                <input name="name" type="text" class="form-control" required>
                            </div>
                            <button type="submit"
                                    class="btn border-secondary py-3 mt-3 px-4 text-uppercase  text-primary">Oluştur
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">İsim</th>

                </tr>
                </thead>
                <tbody>

                @php

                    $number = 1;

                @endphp
                @foreach($models as $model)

                    <tr>
                        <td>
                            <p class="mb-0 mt-4">{{$number++}}</p>
                        </td>
                        <td>
                            <p class="mb-0 mt-4">{{$model->name}}</p>
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
