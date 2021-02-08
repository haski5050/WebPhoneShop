@extends('layout')
@section('mainPage')
Інформація про магазин
@endsection
@section('content')
    <section class="section pb-5">
        <!--Section heading-->
        <h2 class="section-heading h1 pt-4">Зв'яжіться із нами</h2>
        <!--Section description-->
        <p class="section-description pb-4">Якщо у вас виникли питання або ідеї щодо розвитку нашого магазину, зв'яжіться із нами
        , ми постараємось відповісти в межах кількох днів.</p>
        <div class="row">
            <div class="col-lg-5 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="form-header blue accent-1">
                            <h3><i class="fas fa-envelope"></i> Напишіть нам:</h3>
                        </div>
                        <br>
                        <form method="post" action="{{route("addReport")}}">
                            @csrf
                        <div class="md-form">
                            <label for="form-name">Ваше ім'я</label>
                            <i class="fas fa-user prefix grey-text"></i>
                            <input type="text" name="name" class="form-control">

                        </div>
                        <div class="md-form">
                            <label for="form-email">Емайл адрес</label>
                            <i class="fas fa-envelope prefix grey-text"></i>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="md-form">
                            <label for="form-Subject">Тема</label>
                            <i class="fas fa-tag prefix grey-text"></i>
                            <input type="text" name="subject" class="form-control">
                        </div>
                        <div class="form-text">
                            <label for="form-Subject">Повідомлення</label>
                            <i class="fas fa-pencil-alt prefix grey-text"></i>
                            <textarea name="text" class="form-control md-textarea" rows="3"></textarea>
                        </div>
                        <div class="text-center mt-4">
                            <button class="btn btn-outline-success" type="submit">Відправити</button>
                        </div>
                        </form>
                    </div>
                </div>


            </div>



            <div class="col-lg-7">

                <!--Google map-->
                <div id="map-container-google-11" class="z-depth-1-half map-container-6" style="height: 400px">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21161.71882454115!2d25.47917998711345!3d48.471592329175934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbcf9d21318c7d272!2z0KPRgdGC0Y_QvdGB0YzQutCwINGB0ZbQu9GM0YHRjNC60LAg0YDQsNC00LA!5e0!3m2!1suk!2sua!4v1611333839265!5m2!1suk!2sua" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"
                            frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>

                <br>
                <!--Buttons-->
                <div class="row text-center">
                    <div class="col-md-4">
                        <a class="btn-floating blue accent-1"><i class="fas fa-map-marker-alt"></i></a>
                        <p>Ustya Shevchenka st</p>
                        <p>Ukraine</p>
                    </div>

                    <div class="col-md-4">
                        <a class="btn-floating blue accent-1"><i class="fas fa-phone"></i></a>
                        <p>+ 38 067 75 38 311</p>
                        <p>Понеділок - П'ятниця, 12:00-22:00</p>
                    </div>

                    <div class="col-md-4">
                        <a class="btn-floating blue accent-1"><i class="fas fa-envelope"></i></a>
                        <p>haski5050@gmail.com</p>
                    </div>
                </div>

            </div>


        </div>
    </section>
    <style>
        .map-container-6{
            overflow:hidden;
            padding-bottom:56.25%;
            position:relative;
            height:0;
        }
        .map-container-6 iframe{
            left:0;
            top:0;
            height:100%;
            width:100%;
            position:absolute;
        }
    </style>
@endsection
