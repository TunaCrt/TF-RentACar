@extends('panel.layouts.app')



@section('content')

    <div class="container-fluid py-5 mt-5">
        <div class="container py-5">
            <div class="row g-4 mb-5">
                <div class="col-lg-8 col-xl-12">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="border rounded">
                                <a href="#">
                                    <img src="{{asset('panel/img/' . $car->media->first()->media)}}" class="img-fluid rounded" alt="Araba fotoğafı">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h4 class="fw-bold mb-3">{{$car->getCarBrandName()}}</h4>
                            <p class="mb-3">{{$car->model->name}}</p>
                            <h5 class="fw-bold mb-3">{{$car->fiyat}}$</h5>
                            <a href="#" class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                        </div>
                        <div class="col-lg-12">
                            <nav>
                                <div class="nav nav-tabs mb-3">
                                    <button class="nav-link active border-white border-bottom-0" type="button" role="tab" id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about" aria-controls="nav-about" aria-selected="true">Description</button>
                                    <button class="nav-link border-white border-bottom-0" type="button" role="tab" id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission" aria-controls="nav-mission" aria-selected="false">Reviews</button>
                                </div>
                            </nav>
                            <div class="tab-content mb-5">
                                <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                    <p>{{$car->description}} </p>
                                    <div class="px-2">
                                        <div class="row g-4">
                                            <div class="col-6">
                                                <div class="row bg-light align-items-center text-center justify-content-center py-2">
                                                    <div class="col-6">
                                                        <p class="mb-0">Satıcı</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0">{{$car->user->name}}</p>
                                                    </div>
                                                </div>
                                                <div class="row text-center align-items-center justify-content-center py-2">
                                                    <div class="col-6">
                                                        <p class="mb-0">İl</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0">{{$car->getCity()}}</p>
                                                    </div>
                                                </div>
                                                <div class="row bg-light text-center align-items-center justify-content-center py-2">
                                                    <div class="col-6">
                                                        <p class="mb-0">İlçe</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0">{{$car->district->name}}</p>
                                                    </div>
                                                </div>
                                                <div class="row text-center align-items-center justify-content-center py-2">
                                                    <div class="col-6">
                                                        <p class="mb-0">Yıl</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0">{{$car->year}}</p>
                                                    </div>
                                                </div>
                                                <div class="row bg-light text-center align-items-center justify-content-center py-2">
                                                    <div class="col-6">
                                                        <p class="mb-0">Renk</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <div style="width: 50px; height: 50px; background-color: {{ $car->color }}; border: 1px solid #000; margin: 0 auto;"></div>
                                                    </div>
                                                </div>
                                                <div class="row bg-light text-center align-items-center justify-content-center py-2">
                                                    <div class="col-6">
                                                        <p class="mb-0">Kilometre</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0">{{$car->km}}</p>
                                                    </div>
                                                </div>
                                                <div class="row bg-light text-center align-items-center justify-content-center py-2">
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
                                                <div class="row bg-light text-center align-items-center justify-content-center py-2">
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
                                                <div class="row bg-light text-center align-items-center justify-content-center py-2">
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
                                <div class="tab-pane" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
                                    <div class="d-flex">
                                        <img src="img/avatar.jpg" class="img-fluid rounded-circle p-3" style="width: 100px; height: 100px;" alt="">
                                        <div class="">
                                            <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                            <div class="d-flex justify-content-between">
                                                <h5>Jason Smith</h5>
                                                <div class="d-flex mb-3">
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <p>The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic
                                                words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <img src="img/avatar.jpg" class="img-fluid rounded-circle p-3" style="width: 100px; height: 100px;" alt="">
                                        <div class="">
                                            <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                            <div class="d-flex justify-content-between">
                                                <h5>Sam Peters</h5>
                                                <div class="d-flex mb-3">
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star text-secondary"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <p class="text-dark">The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic
                                                words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="nav-vision" role="tabpanel">
                                    <p class="text-dark">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam
                                        amet diam et eos labore. 3</p>
                                    <p class="mb-0">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.
                                        Clita erat ipsum et lorem et sit</p>
                                </div>
                            </div>
                        </div>
                        <form action="#">
                            <h4 class="mb-5 fw-bold">Leave a Reply</h4>
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="border-bottom rounded">
                                        <input type="text" class="form-control border-0 me-4" placeholder="Yur Name *">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="border-bottom rounded">
                                        <input type="email" class="form-control border-0" placeholder="Your Email *">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="border-bottom rounded my-4">
                                        <textarea name="" id="" class="form-control border-0" cols="30" rows="8" placeholder="Your Review *" spellcheck="false"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="d-flex justify-content-between py-3 mb-5">
                                        <div class="d-flex align-items-center">
                                            <p class="mb-0 me-3">Please rate:</p>
                                            <div class="d-flex align-items-center" style="font-size: 12px;">
                                                <i class="fa fa-star text-muted"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <a href="#" class="btn border border-secondary text-primary rounded-pill px-4 py-3"> Post Comment</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <h1 class="fw-bold mb-0">Related products</h1>
            <div class="vesitable">
                <div class="owl-carousel vegetable-carousel justify-content-center owl-loaded owl-drag">








                    <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-3203px, 0px, 0px); transition: all 1.5s ease 0s; width: 5126px;"><div class="owl-item cloned" style="width: 295.333px; margin-right: 25px;"><div class="border border-primary rounded position-relative vesitable-item">
                                    <div class="vesitable-img">
                                        <img src="img/vegetable-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
                                    </div>
                                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                                    <div class="p-4 pb-0 rounded-bottom">
                                        <h4>Potatoes</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                            <p class="text-dark fs-5 fw-bold">$7.99 / kg</p>
                                            <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                        </div>
                                    </div>
                                </div></div><div class="owl-item cloned" style="width: 295.333px; margin-right: 25px;"><div class="border border-primary rounded position-relative vesitable-item">
                                    <div class="vesitable-img">
                                        <img src="img/vegetable-item-6.jpg" class="img-fluid w-100 rounded-top" alt="">
                                    </div>
                                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                                    <div class="p-4 pb-0 rounded-bottom">
                                        <h4>Parsely</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                            <p class="text-dark fs-5 fw-bold">$7.99 / kg</p>
                                            <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                        </div>
                                    </div>
                                </div></div><div class="owl-item cloned" style="width: 295.333px; margin-right: 25px;"><div class="border border-primary rounded position-relative vesitable-item">
                                    <div class="vesitable-img">
                                        <img src="img/vegetable-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
                                    </div>
                                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                                    <div class="p-4 pb-0 rounded-bottom">
                                        <h4>Potatoes</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                            <p class="text-dark fs-5 fw-bold">$7.99 / kg</p>
                                            <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                        </div>
                                    </div>
                                </div></div><div class="owl-item cloned" style="width: 295.333px; margin-right: 25px;"><div class="border border-primary rounded position-relative vesitable-item">
                                    <div class="vesitable-img">
                                        <img src="img/vegetable-item-6.jpg" class="img-fluid w-100 rounded-top" alt="">
                                    </div>
                                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                                    <div class="p-4 pb-0 rounded-bottom">
                                        <h4>Parsely</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                            <p class="text-dark fs-5 fw-bold">$7.99 / kg</p>
                                            <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                        </div>
                                    </div>
                                </div></div><div class="owl-item" style="width: 295.333px; margin-right: 25px;"><div class="border border-primary rounded position-relative vesitable-item">
                                    <div class="vesitable-img">
                                        <img src="img/vegetable-item-6.jpg" class="img-fluid w-100 rounded-top" alt="">
                                    </div>
                                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                                    <div class="p-4 pb-0 rounded-bottom">
                                        <h4>Parsely</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                            <p class="text-dark fs-5 fw-bold">$4.99 / kg</p>
                                            <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                        </div>
                                    </div>
                                </div></div><div class="owl-item" style="width: 295.333px; margin-right: 25px;"><div class="border border-primary rounded position-relative vesitable-item">
                                    <div class="vesitable-img">
                                        <img src="img/vegetable-item-1.jpg" class="img-fluid w-100 rounded-top" alt="">
                                    </div>
                                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                                    <div class="p-4 pb-0 rounded-bottom">
                                        <h4>Parsely</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                            <p class="text-dark fs-5 fw-bold">$4.99 / kg</p>
                                            <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                        </div>
                                    </div>
                                </div></div><div class="owl-item" style="width: 295.333px; margin-right: 25px;"><div class="border border-primary rounded position-relative vesitable-item">
                                    <div class="vesitable-img">
                                        <img src="img/vegetable-item-3.png" class="img-fluid w-100 rounded-top bg-light" alt="">
                                    </div>
                                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                                    <div class="p-4 pb-0 rounded-bottom">
                                        <h4>Banana</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                            <p class="text-dark fs-5 fw-bold">$7.99 / kg</p>
                                            <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                        </div>
                                    </div>
                                </div></div><div class="owl-item" style="width: 295.333px; margin-right: 25px;"><div class="border border-primary rounded position-relative vesitable-item">
                                    <div class="vesitable-img">
                                        <img src="img/vegetable-item-4.jpg" class="img-fluid w-100 rounded-top" alt="">
                                    </div>
                                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                                    <div class="p-4 pb-0 rounded-bottom">
                                        <h4>Bell Papper</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                            <p class="text-dark fs-5 fw-bold">$7.99 / kg</p>
                                            <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                        </div>
                                    </div>
                                </div></div><div class="owl-item" style="width: 295.333px; margin-right: 25px;"><div class="border border-primary rounded position-relative vesitable-item">
                                    <div class="vesitable-img">
                                        <img src="img/vegetable-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
                                    </div>
                                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                                    <div class="p-4 pb-0 rounded-bottom">
                                        <h4>Potatoes</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                            <p class="text-dark fs-5 fw-bold">$7.99 / kg</p>
                                            <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                        </div>
                                    </div>
                                </div></div><div class="owl-item" style="width: 295.333px; margin-right: 25px;"><div class="border border-primary rounded position-relative vesitable-item">
                                    <div class="vesitable-img">
                                        <img src="img/vegetable-item-6.jpg" class="img-fluid w-100 rounded-top" alt="">
                                    </div>
                                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                                    <div class="p-4 pb-0 rounded-bottom">
                                        <h4>Parsely</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                            <p class="text-dark fs-5 fw-bold">$7.99 / kg</p>
                                            <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                        </div>
                                    </div>
                                </div></div><div class="owl-item active" style="width: 295.333px; margin-right: 25px;"><div class="border border-primary rounded position-relative vesitable-item">
                                    <div class="vesitable-img">
                                        <img src="img/vegetable-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
                                    </div>
                                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                                    <div class="p-4 pb-0 rounded-bottom">
                                        <h4>Potatoes</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                            <p class="text-dark fs-5 fw-bold">$7.99 / kg</p>
                                            <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                        </div>
                                    </div>
                                </div></div><div class="owl-item active" style="width: 295.333px; margin-right: 25px;"><div class="border border-primary rounded position-relative vesitable-item">
                                    <div class="vesitable-img">
                                        <img src="img/vegetable-item-6.jpg" class="img-fluid w-100 rounded-top" alt="">
                                    </div>
                                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                                    <div class="p-4 pb-0 rounded-bottom">
                                        <h4>Parsely</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                            <p class="text-dark fs-5 fw-bold">$7.99 / kg</p>
                                            <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                        </div>
                                    </div>
                                </div></div><div class="owl-item cloned active" style="width: 295.333px; margin-right: 25px;"><div class="border border-primary rounded position-relative vesitable-item">
                                    <div class="vesitable-img">
                                        <img src="img/vegetable-item-6.jpg" class="img-fluid w-100 rounded-top" alt="">
                                    </div>
                                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                                    <div class="p-4 pb-0 rounded-bottom">
                                        <h4>Parsely</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                            <p class="text-dark fs-5 fw-bold">$4.99 / kg</p>
                                            <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                        </div>
                                    </div>
                                </div></div><div class="owl-item cloned" style="width: 295.333px; margin-right: 25px;"><div class="border border-primary rounded position-relative vesitable-item">
                                    <div class="vesitable-img">
                                        <img src="img/vegetable-item-1.jpg" class="img-fluid w-100 rounded-top" alt="">
                                    </div>
                                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                                    <div class="p-4 pb-0 rounded-bottom">
                                        <h4>Parsely</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                            <p class="text-dark fs-5 fw-bold">$4.99 / kg</p>
                                            <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                        </div>
                                    </div>
                                </div></div><div class="owl-item cloned" style="width: 295.333px; margin-right: 25px;"><div class="border border-primary rounded position-relative vesitable-item">
                                    <div class="vesitable-img">
                                        <img src="img/vegetable-item-3.png" class="img-fluid w-100 rounded-top bg-light" alt="">
                                    </div>
                                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                                    <div class="p-4 pb-0 rounded-bottom">
                                        <h4>Banana</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                            <p class="text-dark fs-5 fw-bold">$7.99 / kg</p>
                                            <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                        </div>
                                    </div>
                                </div></div><div class="owl-item cloned" style="width: 295.333px; margin-right: 25px;"><div class="border border-primary rounded position-relative vesitable-item">
                                    <div class="vesitable-img">
                                        <img src="img/vegetable-item-4.jpg" class="img-fluid w-100 rounded-top" alt="">
                                    </div>
                                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                                    <div class="p-4 pb-0 rounded-bottom">
                                        <h4>Bell Papper</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                            <p class="text-dark fs-5 fw-bold">$7.99 / kg</p>
                                            <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                        </div>
                                    </div>
                                </div></div></div></div><div class="owl-nav"><div class="owl-prev"><i class="bi bi-arrow-left"></i></div><div class="owl-next"><i class="bi bi-arrow-right"></i></div></div><div class="owl-dots"><div class="owl-dot"><span></span></div><div class="owl-dot"><span></span></div><div class="owl-dot active"><span></span></div></div></div>
            </div>
        </div>
    </div>

@endsection
