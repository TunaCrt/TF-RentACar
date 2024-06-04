@extends('panel.layouts.app')

@section('css')

                .fruite-item {
                    overflow: hidden;
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                }
                .fruite-item:hover {
                    cursor: pointer;
                    transform: scale(1.05);
                    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
                }
                .fruite-item:hover .fruite-img::before {
                    content: "";
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-color: rgba(0, 0, 0, 0.1);
                    transition: background-color 0.3s ease;
                }
                .fruite-img {
                    position: relative;
                    width: 100%;
                    height: 300px; /* Set a fixed height for the image container */
                }
                .fruite-img img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover; /* Ensure the image covers the container without stretching */
                    transition: transform 0.3s ease;
                }
                .fruite-item:hover .fruite-img img {
                    transform: scale(1.1);
                }

    @endsection


@section('content')


    <div class="container">


        <div class="container py-5">
            <h1 class="mb-4">Markalar</h1>
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="row g-4">
                        <div class="col-xl-3">
                            <div class="input-group w-100 mx-auto d-flex">
                                <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                                <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                            </div>
                        </div>
                        <div class="col-6"></div>
                        <div class="col-xl-3">
                            <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                                <a href="{{route('admin.brand.create')}}" class="btn btn-danger btn-lg">Marka Oluştur</a>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="row g-4 justify-content-center">
                                @foreach($brands as $brand)
                                    <div class="col-md-6 col-lg-6 col-xl-3">
                                        <a href="#" class="text-decoration-none">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="{{asset('panel/img/' . $brand->photo)}}" class="img-fluid w-100  rounded-top" alt="">
                                            </div>

                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>{{$brand->name}}</h4>

                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                @endforeach

                                <div class="col-12">
                                    <div class="pagination d-flex justify-content-center mt-5">
                                        <a href="#" class="rounded">«</a>
                                        <a href="#" class="active rounded">1</a>
                                        <a href="#" class="rounded">2</a>
                                        <a href="#" class="rounded">3</a>
                                        <a href="#" class="rounded">4</a>
                                        <a href="#" class="rounded">5</a>
                                        <a href="#" class="rounded">6</a>
                                        <a href="#" class="rounded">»</a>
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
