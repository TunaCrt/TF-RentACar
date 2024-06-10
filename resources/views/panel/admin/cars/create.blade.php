@extends('panel.admin.layouts.app')






@section('css')

    /* Tıklanabilir tablo satırları için imleç tipi ve arka plan rengi */
    tbody tr {
    cursor: pointer; /* İmleci el simgesine dönüştürür */
    transition: background-color 0.3s ease; /* Renk değişiminde yumuşak geçiş sağlar */
    }
    tbody tr:hover {
    background-color: #f0f0f0; /* Hover sırasında arka plan rengini değiştirir */
    }

@endsection




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
        <form action="{{route('admin.cars.store')}}" method="post" enctype="multipart/form-data">
            @csrf

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
                                <select name="city_id" id="city" class="form-control" required>
                                    <option value="" selected disabled>Seçiniz</option>
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}">{{$city->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">İlçe<sup>*</sup></label>
                                <select name="district_id" id="district" class="form-control" required>
                                    <option value="" selected disabled>Seçiniz</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">Marka<sup>*</sup></label>
                                <select name="brand_id" id="brand" class="form-control" required>
                                    <option value="" selected disabled>Seçiniz</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">Model<sup>*</sup></label>
                                <select name="model_id" id="model" class="form-control" required>
                                    <option value="" selected disabled>Seçiniz</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">Yıl<sup>*</sup></label>
                                <select name="year" id="year" class="form-control" required>
                                    <option value="" selected disabled>Seçiniz</option>
                                    @for($i = 1990; $i < \Carbon\Carbon::now()->year +2; $i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor

                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item">
                                <label class="form-label my-3">Kilometre<sup>*</sup></label>
                                <input name="km" type="number" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item">
                                <label class="form-label my-3">Vites Türü<sup>*</sup></label>
                                <select name="vites_turu" id="" class="form-control" required>
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
                                <select name="yakit_turu" id="" class="form-control" required>
                                    <option value="" selected disabled>Seçiniz</option>
                                    <option value="0">benzin</option>
                                    <option value="1">dizel</option>
                                    <option value="2">lpg</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-item">
                        <label class="form-label my-3">Renk <sup>*</sup></label>
                        <input name="color" type="color" class="form-control">
                    </div>

                    <div class="form-item">
                        <label class="form-label my-3">Garanti Durumu<sup>*</sup></label>
                        <select name="garanti_status" id="" class="form-control" required>
                            <option value="" selected disabled>Seçiniz</option>
                            <option value="1">Var</option>
                            <option value="0">Yok</option>
                        </select>
                    </div>

                    <div class="form-item">
                        <label class="form-label my-3">İlana Çıkma Tarihi<sup>*</sup></label>
                        <input name="announcement_date" type="datetime-local" class="form-control"
                               value="{{\Carbon\Carbon::now()->format('Y-m-d\TH:i')}}">
                    </div>


                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item">
                                <label class="form-label my-3">Hasar Tarihi<sup>*</sup></label>
                                <input type="date" name="hasar_tarihi" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item">
                                <label class="form-label my-3">Hasar Açıklaması<sup>*</sup></label>
                                <input type="text" name="damage_description" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-item">
                        <label class="form-label my-3">Fiyat<sup>*</sup></label>
                        <input name="fiyat" type="number" class="form-control" required>
                    </div>

                    <div class="form-item mt-3">
                        <textarea name="description" class="form-control" spellcheck="false" cols="30" rows="11"
                                  placeholder="Açıklama (Zorunlu Değildir)"></textarea>
                    </div>
                    <button type="submit" class="btn border-danger py-3 mt-3 px-4 text-uppercase w-100 text-danger">
                        Kaydet
                    </button>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-5">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Marka</th>
                                <th scope="col">Model</th>
                                <th scope="col">İl</th>
                                <th scope="col">Fiyat</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($cars as $car)
                                <tr data-url="{{ route('admin.cars.show', $car->id) }}">
                                    <th scope="row">
                                        <div class="d-flex align-items-center mt-2">
                                            <img src="{{ asset('panel/img/' . $car->media->first()->media) }}"
                                                 class="img-fluid rounded-circle" style="width: 90px; height: 90px;"
                                                 alt="">
                                        </div>
                                    </th>
                                    <td class="py-5">{{$car->getCarBrandName()}}</td>
                                    <td class="py-5">{{$car->model->name}}</td>
                                    <td class="py-5">{{$car->getCity()}}</td>
                                    <td class="py-5">{{$car->formatFiyat()}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <script>
        $(document).ready(function () {
            $('#city').on('change', function () {
                var cityId = $(this).val();
                if (cityId) {
                    $.ajax({
                        url: '/districts/' + cityId,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            $('#district').empty();
                            $('#district').append('<option value="" selected disabled>Seçiniz</option>');
                            $.each(data, function (key, value) {
                                $('#district').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#district').empty();
                    $('#district').append('<option value="" selected disabled>Seçiniz</option>');
                }
            });

            $('#brand').on('change', function () {
                var brandId = $(this).val();
                if (brandId) {
                    $.ajax({
                        url: '/models/' + brandId,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            $('#model').empty();
                            $('#model').append('<option value="" selected disabled>Seçiniz</option>');
                            $.each(data, function (key, value) {
                                $('#model').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#model').empty();
                    $('#model').append('<option value="" selected disabled>Seçiniz</option>');
                }
            });

            $("tbody tr").click(function () {
                var url = $(this).data("url");
                window.location.href = url;
            });

        });

        $(document).ready(function () {
            // Form gönderildiğinde
            $("#myForm").submit(function (e) {
                e.preventDefault(); // Sayfa yeniden yüklenmesini engelle

                // Boş bırakılan kutuları kontrol et
                const formData = new FormData(this);
                let emptyFields = [];
                formData.forEach((value, key) => {
                    if (value.trim() === "") {
                        emptyFields.push(key);
                    }
                });

                if (emptyFields.length > 0) {
                    // Boş bırakılan kutuları işaretle veya hata mesajı göster
                    console.log("Boş bırakılan alanlar: " + emptyFields.join(", "));
                    // Hata mesajını göstermek için uygun bir yöntem kullanabilirsiniz
                    // Örneğin: alert("Lütfen tüm alanları doldurun!");
                } else {
                    // Boş bırakılan alan yoksa formu gönder
                    this.submit();
                }
            });
        });
    </script>

@endsection

