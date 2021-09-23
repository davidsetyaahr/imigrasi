<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <title>Pengajuan</title>
</head>
<body>
    <form action="">
        <div class="d-flex align-items-center home-step1" id="home">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <img src="{{asset('frontend/img/logo-imigrasi.png')}}" width="80px" alt="" srcset="">
                        <h3 class="mt-3 color-blue font-weight-bold">Selamat Datang Di <br> Aplikasi Pengajuan Kendala Passport </h3>
                    </div>
                </div>
                <div id="pick">
                    <br>
                    <h5 class="text-center mb-3">Pilih Disini:</h5>
                    <div class="row mt-2 justify-content-center">
                        <div class="col-md-3">
                            <div data-tipe="PHilang" class="card p-3 text-center">
                                <img src="{{asset('frontend/img/passport1.png')}}" alt="">
                                <br>
                                <h6 class="mb-0">Passport Hilang</h6>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div data-tipe="PRusak" class="card p-3 text-center">
                                <img src="{{asset('frontend/img/passport2.png')}}" alt="">
                                <br>
                                <h6 class="mb-0">Passport Rusak</h6>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col text-center">
                            <button id="btn-datadiri" class="d-none btn btn-yellow py-2 px-4">Lanjut Isi Data Diri <span class="fa fa-long-arrow-alt-right"></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" value="" name="tipe" id="tipe">
        <div id="datadiri" class="container mt-5">
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
                    <label for="">Label</label>
                    <input type="text" class="form-control">
                </div>
                <div class="tab-pane  px-4 py-4 fade" id="nav-pertanyaan" role="tabpanel" aria-labelledby="nav-pertanyaan-tab">
                    <label for="">Label</label>
                    <input type="text" class="form-control">
                    <br>
                    <button type="submit" class="btn btn-blue px-3 py-2"><span class="fa fa-save"></span> Kirim</button>
                    <button type="submit" class="btn btn-default px-3 py-2"><span class="fa fa-times"></span> Reset</button>
                </div>
            </div>
            <center>
                <a href="#" id="back" class="mt-5 d-block color-yellow"><span class="fa fa-long-arrow-alt-left"></span> Kembali</a>
            </center>
        </div>
    </form>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $(".card").click(function(){
                $(".card").removeClass("active")
                var tipe = $(this).data('tipe')
                $(this).addClass("active")
                $("#tipe").val(tipe)
                $("#btn-datadiri").removeClass('d-none')
            })
            $("#btn-datadiri").click(function(e){
                e.preventDefault();
                $("#home").removeClass('home-step1')
                $("#home").addClass('mt-5')
                $("#pick").hide()
                $("#datadiri").show()
            })
            $("#back").click(function(e){
                e.preventDefault()
                $("#home").addClass('home-step1')
                $("#home").removeClass('mt-5')
                $("#datadiri").hide()
                $("#pick").show()
            })
        })
    </script>
</body>
</html>