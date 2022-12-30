@extends('layouts.template')

@section('content')
    <section class="intro-news-area section-padding-100-0 mb-70">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Intro News Tabs Area -->
                <div class="col-12 col-lg-8">
                    <div class="contact-content mb-100">

                        <!-- Logo -->
                        <a href="#" class="d-block mb-50">
                            <h2 class="text-danger">
                                {{ env('APP_NAME') }}
                            </h2>
                        </a>

                        <!-- Single Contact Info -->
                        <div class="single-contact-info d-flex align-items-center">
                            <h1 class="icon mr-15">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                            </h1>
                            <p>{{ $information->address }}</p>
                        </div>

                        <!-- Single Contact Info -->
                        <div class="single-contact-info d-flex align-items-center">
                            <h2 class="icon mr-15">
                                <i class="fa fa-phone-square" aria-hidden="true"></i>
                            </h2>
                            <p>{{ $information->phone }}</p>
                        </div>

                        <!-- Single Contact Info -->
                        <div class="single-contact-info d-flex align-items-center">
                            <h2 class="icon mr-15">
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            </h2>
                            <p>{{ $information->email }}</p>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Widget -->
                <div class="col-12 col-sm-9 col-md-6 col-lg-4">
                    <div class="sidebar-area">
                        <!-- Search Widget -->
                        <x-search-widget />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
