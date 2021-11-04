<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <link href="{{asset('backend/vendor/sweetalert-master/dist/sweetalert.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <title>Pengajuan</title>
</head>
<body>
    <div class="loading">
        <div class="info">
          <img src="{{asset('backend/img/loading.gif')}}" alt="">
          <p>Loading...</p>
        </div>
      </div>
      <?php 
        $classPHilang = '';
        $classPRusak = '';
        $displayPertanyaanPRusak = 'none';
        $displayPertanyaanPHilang = 'none';
        $stylePHilang = "style='display:none'";
        $stylePRusak = "style='display:none'";
        $displayDataDiri = 'none';
        $displayBtnDataDiri = 'none';
        $displayBtnBack = 'none';
        $displayPick = 'block';
        if(count($errors->all())>0){
            $displayPick = 'none';
            $displayBtnBack = 'block';
            $displayDataDiri = 'block';
            $displayBtnDataDiri = 'initial';
            if(old('tipe')=='PHilang'){
                $displayPertanyaanPHilang = 'block';
                $stylePHilang = '';
                $classPHilang = 'active';
            }
            else{
                $displayPertanyaanPRusak = 'block';
                $stylePRusak = '';
                $classPRusak = 'active';
            }
        }
      ?>
  
        <div class="d-flex align-items-center mt-5" id="home">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        @if (session('status'))
                        <div class="col alert alert-success alert-dismissible fade show" role="alert">
                            <?= session('status') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <img src="{{asset('frontend/img/logo.png')}}" width="120px" alt="" srcset="">
                        <h4 class="mt-3 color-blue font-weight-bold">Selamat Datang Di <br> Aplikasi PAPALASAK <br> (Penggantian Paspor Hilang dan Rusak) </h4>
                    </div>
                </div>
                <div id="pick" style="display:{{$displayPick}}">
                    <br>
                    <h5 class="text-center mb-3">Pilih Disini:</h5>
                    <div class="row mt-2 justify-content-center">
                        <div class="col-md-3 col-6">
                            <div data-tipe="PHilang" class="card p-3 text-center {{$classPHilang}}">
                                <img src="{{asset('frontend/img/paspor1.jpg')}}" alt="">
                                <h6 class="mb-0 mt-3">Paspor Hilang</h6>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div data-tipe="PRusak" class="card p-3 text-center {{$classPRusak}}">
                                <img src="{{asset('frontend/img/paspor2.jpg')}}" alt="">
                                <h6 class="mb-0 mt-3">Paspor Rusak</h6>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col text-center">
                            <button id="btn-datadiri" class="btn btn-yellow py-2 px-4" style="display:{{$displayBtnDataDiri}}">Lanjut Isi Data Diri <span class="fa fa-long-arrow-alt-right"></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{url('pengajuan/store')}}" id="submitConfirm" data-info="Apakah data yang anda isi sudah benar? Tekan submit untuk mengirim pengajuan." method="post">
            @csrf
        <input type="hidden" value="{{ old('tipe') }}" name="tipe" id="tipe">
        <div id="datadiri" class="container mt-5" style="display:{{$displayDataDiri}}">
            <div class="row">
                <div class="col">
                    <div class="nav nav-tabs custom-nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-datadiri-tab" data-toggle="tab" href="#nav-datadiri" role="tab" aria-controls="nav-datadiri" aria-selected="true"> <span class="fa fa-address-book mr-2"></span> Data Diri</a>
                        <a class="nav-item nav-link" id="nav-pertanyaan-tab" data-toggle="tab" href="#nav-pertanyaan" role="tab" aria-controls="nav-pertanyaan" aria-selected="false"><span class="fa fa-question-circle mr-2"></span>  Pertanyaan</a>
                    </div>
                </div>
            </div>
            <div class="tab-content custom-tab-content" id="nav-tabContent">
                <div class="tab-pane  px-4 py-4 fade show active" id="nav-datadiri" role="tabpanel" aria-labelledby="nav-datadiri-tab">
                    <label for="">Nama Lengkap (Sesuai Paspor)</label>
                    <input type="text" value="{{old('nama')}}" name="nama" class="form-control @error('nama') is-invalid @enderror">
                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                    <label for="">NIK</label>
                    <input type="text" name="nik" value="{{old('nik')}}" class="form-control  @error('nik') is-invalid @enderror">
                    @error('nik')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                    <label for="">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" value="{{old('tempat_lahir')}}" class="form-control @error('tempat_lahir') is-invalid @enderror">
                    @error('tempat_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                    <label for="">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" value="{{old('tgl_lahir')}}" class="form-control @error('tgl_lahir') is-invalid @enderror">
                    @error('tgl_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                    <label for="">Agama</label>
                    <select name="agama" id="" class="form-control @error('agama') is-invalid @enderror">
                        <option {{old('agama')=='Islam' ? 'selected' : ''}}>Islam</option>
                        <option {{old('agama')=='Kristen' ? 'selected' : ''}}>Kristen</option>
                        <option {{old('agama')=='Katolik' ? 'selected' : ''}}>Katolik</option>
                        <option {{old('agama')=='Hindu' ? 'selected' : ''}}>Hindu</option>
                        <option {{old('agama')=='Budha' ? 'selected' : ''}}>Budha</option>
                        <option {{old('agama')=='Kong Hu Chu' ? 'selected' : ''}}>Kong Hu Chu</option>
                    </select>
                    @error('agama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                    <label for="">Status Perkawinan</label>
                    <select name="status_pernikahan" id="" class="form-control @error('status_pernikahan') is-invalid @enderror">
                        <option {{old('status_pernikahan')=='Belum Kawin' ? 'selected' : ''}}>Belum Kawin</option>
                        <option {{old('status_pernikahan')=='Sudah Kawin' ? 'selected' : ''}}>Sudah Kawin</option>
                        <option {{old('status_pernikahan')=='Duda' ? 'selected' : ''}}>Duda</option>
                        <option {{old('status_pernikahan')=='Janda' ? 'selected' : ''}}>Janda</option>
                        <option {{old('status_pernikahan')=='Cerai Mati' ? 'selected' : ''}}>Cerai Mati</option>
                    </select>
                    @error('status_pernikahan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                    <label for="">Pekerjaan</label>
                    <input type="text" value="{{old('pekerjaan')}}" name="pekerjaan" class="form-control  @error('pekerjaan') is-invalid @enderror">
                    @error('pekerjaan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                    <label for="">Email</label>
                    <input type="email" value="{{old('email')}}" name="email" class="form-control  @error('email') is-invalid @enderror">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                    <label for="">No Hp</label>
                    <input type="text" value="{{old('no_hp')}}" name="no_hp" class="form-control  @error('no_hp') is-invalid @enderror">
                    @error('no_hp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                    <label for="">Alamat</label>
                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="5">{{old('alamat')}}</textarea>
                    @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                    <label for="">Jenis Kelamin</label>
                    <br>
                    <input type="radio" name="jenis_kelamin" id="lk" value="laki-laki" {{old('jenis_kelamin')=='laki-laki' ? 'checked' :''}}> <label for="lk"> Laki Laki</label> &nbsp;
                    <input type="radio" name="jenis_kelamin" id="pr" value="perempuan" {{old('jenis_kelamin')=='perempuan' ? 'checked' : ''}}> <label for="pr"> Perempuan</label>
                    @error('jenis_kelamin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                </div>
                <div class="tab-pane  px-4 py-4 fade" id="nav-pertanyaan" role="tabpanel" aria-labelledby="nav-pertanyaan-tab">
                    <div id="pRusak" style="display: {{$displayPertanyaanPRusak}}">
                        @foreach ($pRusak as $data)
                            <label for="">{{$data->pertanyaan}}</label>
                            <input type="text" value="{{old('soal_rusak'.$data->id_pertanyaan)}}" name="soal_rusak{{$data->id_pertanyaan}}" class="form-control @error('soal_rusak'.$data->id_pertanyaan) is-invalid @enderror">
                            @error('soal_rusak'.$data->id_pertanyaan)
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <br>
                        @endforeach
                    </div>
                    <div id="pHilang" style="display: {{$displayPertanyaanPHilang}}">
                        @foreach ($pHilang as $data)
                            <label for="">{{$data->pertanyaan}}</label>
                            <input type="text" value="{{old('soal_hilang'.$data->id_pertanyaan)}}" name="soal_hilang{{$data->id_pertanyaan}}" class="form-control @error('soal_hilang'.$data->id_pertanyaan) is-invalid @enderror">
                            @error('soal_hilang'.$data->id_pertanyaan)
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <br>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-blue px-3 py-2"><span class="fa fa-save"></span> Kirim</button>
                    <button type="reset" class="btn btn-default px-3 py-2"><span class="fa fa-times"></span> Reset</button>
                </div>
            </div>
        </div>
    </form>    
    <center>
        <a href="#" id="back" style="display: {{$displayBtnBack}}" class="my-5 color-yellow"><span class="fa fa-long-arrow-alt-left"></span> Kembali</a>
    </center>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="{{asset('backend/vendor/sweetalert-master/dist/sweetalert-dev.js')}}"></script>

    <script>
        $(document).ready(function(){
            $(".card").click(function(){
                $(".card").removeClass("active")
                var tipe = $(this).data('tipe')
                $(this).addClass("active")
                $("#tipe").val(tipe)
                $("#btn-datadiri").fadeIn()
                if(tipe=='PRusak'){
                    $("#pHilang").fadeOut()
                    $("#pRusak").fadeIn()
                }
                else{
                    $("#pRusak").fadeOut()
                    $("#pHilang").fadeIn()
                }
            })
            $("#btn-datadiri").click(function(e){
                e.preventDefault();
                $('#back').css({'display':'block'})

                $("#home").removeClass('home-step1')
                $("#pick").hide()
                $("#datadiri").fadeIn()
            })
            $("#back").click(function(e){
                e.preventDefault()
                $("#home").addClass('home-step1')
                $("#datadiri").hide()
                $("#pick").fadeIn()
                $(this).hide()
            })
            $("#submitConfirm").submit(function(e) {
                e.preventDefault();
                var id = $(this).attr("id");
                $(".loading").removeClass("show");
                var info = $(this).data('info')
                swal(
                    {
                        title: "Apakah Anda Yakin?",
                        text: info,
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3c4099",
                        confirmButtonText: "Submit",
                        closeOnConfirm: false
                    },
                    function() {
                        $("#"+id).unbind("submit").submit();
                        $(".loading").addClass("show");
                    }
                );
            });



        })
    </script>
</body>
</html>