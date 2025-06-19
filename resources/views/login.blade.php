@extends('layouts.login')
@section('content')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <main>
        <section id="hero"></section><!-- End Hero -->
        <div class="position-absolute top-50 start-50 translate-middle">
            <div class="container vh-sm-100 d-sm-flex justify-content-center align-items-center">
                <section class="contact">
                    <div class="card card-body bg-dark rounded-lg vw-40">
                        <form method="POST" action="{{route('login')}}" class="php-email-form bg-transparent">
                            @csrf
                            <div class="row">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <h2 class="fs-2 text-light">Form Login</h2>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <button type="submit">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </main>
@endsection
@section('js-content')
    <script>
        window.addEventListener('DOMContentLoaded', event => {
            const $recaptcha = document.querySelector('#g-recaptcha-response');
            if ($recaptcha) {
                $recaptcha.setAttribute('required', 'required');
            }
        })
    </script>
@endsection