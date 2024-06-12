@extends('panel.admin.layouts.app')

@section('content')

    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif



    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <h1 class="mb-4">TF-RentACar</h1>
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="row g-4">
                        <div class="col-xl-3">
                            <div class="input-group w-100 mx-auto d-flex">
                                <input type="search" class="form-control p-3" placeholder="keywords"
                                       aria-describedby="search-icon-1">
                                <span id="search-icon-1" class="input-group-text p-3"><i
                                            class="fa fa-search"></i></span>
                            </div>
                        </div>
                        <div class="col-6"></div>
                        <div class="col-xl-3">
                            <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                                <label for="fruits">Default Sorting:</label>
                                <select id="fruits" name="fruitlist" class="border-0 form-select-sm bg-light me-3"
                                        form="fruitform">
                                    <option value="volvo">Nothing</option>
                                    <option value="saab">Popularity</option>
                                    <option value="opel">Organic</option>
                                    <option value="audi">Fantastic</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4>Markalar</h4>
                                        <ul class="list-unstyled fruite-categorie">
                                            @foreach($brands as $brand)
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="{{route('admin.cars.index', $brand->id)}}"><i
                                                                    class="fas fa-car-alt me-2"></i>{{$brand->name}}</a>
                                                        <span>({{$brand->getCountCars()}})</span>
                                                    </div>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4 class="mb-2">Price</h4>
                                        <input type="range" class="form-range w-100" id="rangeInput" name="rangeInput"
                                               min="0" max="1000000" value="0" oninput="amount.value=rangeInput.value">
                                        <output id="amount" name="amount" min-velue="0" max-value="500"
                                                for="rangeInput">0
                                        </output>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-9">

                            <div class="row g-4 justify-content-center">
                                @foreach($cars as $car)
                                    <div class="col-12">
                                        <div class="border border-danger rounded-bottom rounded position-relative fruite-item"
                                             style="display: flex; align-items: center;">
                                            <div class="fruite-img" style="flex: 1;">
                                                <img src="{{asset('panel/img/' . $car->media->first()->media)}}"
                                                     class="img-fluid rounded"
                                                     style="max-width: 96%; height: auto; object-fit: cover;">
                                            </div>

                                            <div class="" style="flex: 2;">
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <h4 class="">{{$car->getCarBrandName()}}</h4>

                                                </div>

                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p style="padding: 0px 20px 20px 10px;"
                                                       class="">{{$car->model->name}}</p>
                                                    <p class="pt-5 text-dark fs-5 fw-bold mb-0">
                                                        Fiyat: {{$car->formatFiyat()}}</p>
                                                    <p class="pt-5 text-dark fs-5 fw-bold mb-0">
                                                        Şehir: {{$car->getCity()}}</p>
                                                    <a href="{{route('admin.cars.show',$car->id)}}"
                                                       class="m-4 btn border border-danger rounded-pill px-3 text-danger"><i
                                                                class="fa fa-shopping-bag me-2 text-danger"></i> İlani
                                                        Görüntüle</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="col-12">
                                    <div class="rounded pagination d-flex justify-content-center mt-5">
                                        <!--carslinks-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

