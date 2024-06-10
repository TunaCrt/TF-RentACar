@extends('panel.admin.layouts.app')

@section('content')

    <div class="container-fluid py-5 mt-5">
        <div class="container py-5">
            <div class="row g-4 mb-5">
                <div class="col-lg-8 col-xl-12">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div id="carCarousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach($car->media as $key => $media)
                                        <div class="carousel-item @if($key == 0) active @endif">
                                            <img src="{{ asset('panel/img/' . $media->media) }}"
                                                 class="d-block w-100 rounded" alt="Araba fotoğrafı">
                                        </div>
                                    @endforeach
                                </div>
                                @if($car->media->count() !=1)
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carCarousel"
                                            data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Önceki</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carCarousel"
                                            data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Sonraki</span>
                                    </button>
                                @endif

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h4 class="fw-bold mb-3">{{$car->getCarBrandName()}}</h4>
                            <p class="mb-3">{{$car->model->name}}</p>
                            <h5 class="fw-bold mb-3">{{$car->formatFiyat()}}$</h5>
                            <a href="#" class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i
                                    class="fa fa-shopping-bag me-2 text-primary"></i> Satın Al</a>
                        </div>
                        <div class="col-lg-12">
                            <nav>
                                <div class="nav nav-tabs mb-3">
                                    <button class="nav-link active border-white border-bottom-0" type="button"
                                            role="tab" id="nav-about-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-about" aria-controls="nav-about" aria-selected="true">
                                        Description
                                    </button>
                                </div>
                            </nav>
                            <div class="tab-content mb-5">
                                <div class="tab-pane active" id="nav-about" role="tabpanel"
                                     aria-labelledby="nav-about-tab">
                                    <p>{{$car->description}} </p>
                                    <div class="px-2">
                                        <div class="row g-4">
                                            <div class="col-6">
                                                <div
                                                    class="row bg-light align-items-center text-center justify-content-center py-2">
                                                    <div class="col-6">
                                                        <p class="mb-0">Satıcı</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0">{{$car->user->name}}</p>
                                                    </div>
                                                </div>
                                                <div
                                                    class="row text-center align-items-center justify-content-center py-2">
                                                    <div class="col-6">
                                                        <p class="mb-0">İl</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0">{{$car->getCity()}}</p>
                                                    </div>
                                                </div>
                                                <div
                                                    class="row bg-light text-center align-items-center justify-content-center py-2">
                                                    <div class="col-6">
                                                        <p class="mb-0">İlçe</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0">{{$car->district->name}}</p>
                                                    </div>
                                                </div>
                                                <div
                                                    class="row text-center align-items-center justify-content-center py-2">
                                                    <div class="col-6">
                                                        <p class="mb-0">Yıl</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0">{{$car->year}}</p>
                                                    </div>
                                                </div>
                                                <div
                                                    class="row bg-light text-center align-items-center justify-content-center py-2">
                                                    <div class="col-6">
                                                        <p class="mb-0">Renk</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div
                                                            style="width: 50px; height: 50px; background-color: {{ $car->color }}; border: 1px solid #000; margin: 0 auto;"></div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="row bg-light text-center align-items-center justify-content-center py-2">
                                                    <div class="col-6">
                                                        <p class="mb-0">Kilometre</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0">{{$car->km}}</p>
                                                    </div>
                                                </div>
                                                <div
                                                    class="row bg-light text-center align-items-center justify-content-center py-2">
                                                    <div class="col-6">
                                                        <p class="mb-0">Garanti Durumu</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0">
                                                            @if($car->garanti_status == 1)
                                                                Var
                                                            @else
                                                                Yok
                                                            @endif </p>
                                                    </div>
                                                </div>
                                                <div
                                                    class="row bg-light text-center align-items-center justify-content-center py-2">
                                                    <div class="col-6">
                                                        <p class="mb-0">Vites Türü</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0">
                                                            @if($car->vites_turu == 0)
                                                                Manuel
                                                            @elseif($car->vites_turu == 1)
                                                                otomatik
                                                            @elseif($car->vites_turu == 2)
                                                                Yarı Otomatik
                                                            @else
                                                                Belirtilmemiş
                                                            @endif </p>
                                                    </div>
                                                </div>
                                                <div
                                                    class="row bg-light text-center align-items-center justify-content-center py-2">
                                                    <div class="col-6">
                                                        <p class="mb-0">Yakıt Türü</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0">
                                                            @if($car->yakit_turu == 0)
                                                                benzin
                                                            @elseif($car->yakit_turu == 1)
                                                                dizel
                                                            @elseif($car->yakit_turu == 2)
                                                                lpg
                                                            @else
                                                                Belirtilmemiş
                                                            @endif </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
