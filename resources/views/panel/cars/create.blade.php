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
        <form action="#">
            <div class="row g-5">
                <div class="col-md-12 col-lg-6 col-xl-7">
                    <div class="form-group">
                        <label for="photos">Araba Fotoğrafları</label>
                        <input type="file" name="photos[]" class="form-control mt-1" id="photos" multiple required>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">İl<sup>*</sup></label>
                                <select name="" id="" class="form-control">
                                    <option value="" selected disabled>Seçiniz</option>
                                    <option value="">BMW</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">İlçe<sup>*</sup></label>
                                <select name="" id="" class="form-control">
                                    <option value="" selected disabled>Seçiniz</option>
                                    <option value="">m5</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">Marka<sup>*</sup></label>
                                <select name="" id="" class="form-control">
                                    <option value="" selected disabled>Seçiniz</option>
                                    <option value="">BMW</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">Model<sup>*</sup></label>
                                <select name="" id="" class="form-control">
                                    <option value="" selected disabled>Seçiniz</option>
                                    <option value="">m5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item">
                                <label class="form-label my-3">Yıl<sup>*</sup></label>
                                <input type="number" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item">
                                <label class="form-label my-3">Kilometre<sup>*</sup></label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item">
                                <label class="form-label my-3">Vites Türü<sup>*</sup></label>
                                <select name="" id="" class="form-control">
                                    <option value="" selected disabled>Seçiniz</option>
                                    <option value="0">Manuel</option>
                                    <option value="1">Otomatik</option>
                                    <option value="2">Yarı otomatik</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item">
                                <label class="form-label my-3">Yakıt Türü<sup>*</sup></label>
                                <select name="" id="" class="form-control">
                                    <option value="" selected disabled>Seçiniz</option>
                                    <option value="">benzin</option>
                                    <option value="">dizel</option>
                                    <option value="">lpg</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-item">
                        <label class="form-label my-3">Renk <sup>*</sup></label>
                        <input type="color" class="form-control">
                    </div>

                    <div class="form-item">
                        <label class="form-label my-3">Garanti Durumu<sup>*</sup></label>
                        <select name="" id="" class="form-control">
                            <option value="" selected disabled>Seçiniz</option>
                            <option value="1">Var</option>
                            <option value="0">Yok</option>
                        </select>
                    </div>

                    <div class="form-item">
                        <label class="form-label my-3">İlana Çıkma Tarihi<sup>*</sup></label>
                        <input type="datetime-local" class="form-control">
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Fiyat<sup>*</sup></label>
                        <input type="number" class="form-control">
                    </div>

                    <div class="form-item mt-3">
                        <textarea name="text" class="form-control" spellcheck="false" cols="30" rows="11" placeholder="Açıklama (Zorunlu Değildir)"></textarea>
                    </div>
                    <button type="button" class="btn border-secondary py-3 mt-3 px-4 text-uppercase w-100 text-primary">Kaydet</button>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-5">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Products</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">
                                    <div class="d-flex align-items-center mt-2">
                                        <img src="img/vegetable-item-2.jpg" class="img-fluid rounded-circle" style="width: 90px; height: 90px;" alt="">
                                    </div>
                                </th>
                                <td class="py-5">Awesome Brocoli</td>
                                <td class="py-5">$69.00</td>
                                <td class="py-5">2</td>
                                <td class="py-5">$138.00</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="d-flex align-items-center mt-2">
                                        <img src="img/vegetable-item-5.jpg" class="img-fluid rounded-circle" style="width: 90px; height: 90px;" alt="">
                                    </div>
                                </th>
                                <td class="py-5">Potatoes</td>
                                <td class="py-5">$69.00</td>
                                <td class="py-5">2</td>
                                <td class="py-5">$138.00</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="d-flex align-items-center mt-2">
                                        <img src="img/vegetable-item-3.png" class="img-fluid rounded-circle" style="width: 90px; height: 90px;" alt="">
                                    </div>
                                </th>
                                <td class="py-5">Big Banana</td>
                                <td class="py-5">$69.00</td>
                                <td class="py-5">2</td>
                                <td class="py-5">$138.00</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </form>
    </div>


@endsection

