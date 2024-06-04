@extends('panel.layouts.app')



@section('content')

    <div class="container py-5">
        <h1 class="mb-4">Araba Bilgileri</h1>
        <form action="{{route('admin.brand.store')}}" method="post" enctype="multipart/form-data">
            @csrf


            <div class="row g-5">
                <div class="col-md-12 col-lg-6 col-xl-12">
                    <div class="form-group">

                        <div class="col-md-12 col-lg-6 col-xl-7">
                            <div class="form-group">
                                <label for="photos">Araba Fotoğrafları</label>
                                <input type="file" name="photo" class="form-control mt-1" id="photos"  required>
                            </div>
                        <div class="form-item">
                            <label class="form-label my-2">Marka İsmi<sup>*</sup></label>
                            <input name="name" type="text" class="form-control" required>
                        </div>
                        <button type="submit" class="btn border-secondary py-3 mt-3 px-4 text-uppercase  text-primary">Kaydet</button>
                    </div>
                </div>
            </div>
            </div>
        </form>
    </div>
@endsection
