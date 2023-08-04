@extends('frontend.layouts.app')
@push('css')
    <style>
        ul,
        li {
            list-style-type: none !important;
        }

        @media (max-width: 576px) {
            .img-xs-400 {
                width: 400px !important;
            }

        }

        @media (min-width: 576px) and (max-width: 768px) {
            img-xs-400 {
                width: 400px !important;
            }
        }
    </style>
@endpush
@section('content')
    <section class="pt-4 mb-4">
        <div class="container text-center">
            <div class="row">
                <div class="col-12 text-center ">
                    <h1 class="fw-700  text-primary"> {{ __('custom.our_story') }}</h1>
                </div>
                <div class="col-sm-12 text-center  mb-5">
                    <p class="fs-15 fs-sm-14 fw-600">
                        {{ __('custom.about_us_paage.our_story') }}
                    </p>
                </div>

                <div class="col-md-6 text-center mb-5">
                    <h1 class="fw-700 text-primary"><i class="las la-crosshairs text-primary"></i>
                        {{ __('custom.our_goal') }}</h1>
                    <p class="fw-700 fs-15  fs-md-15 text-dark">{{ __('custom.about_us_paage.our_goal') }}</p>
                </div>
                <div class="col-md-6 text-center">
                    <h1 class="fw-700  text-primary"><i class="las la-eye text-primary"></i>
                        {{ __('custom.our_vision') }}</h1>
                    <p class="fw-700 fs-15   fs-md-15 text-dark">{{ __('custom.about_us_paage.our_vision') }}</p>
                </div>
            </div>
            <hr>
            {{-- Our Mission --}}
            <div class="row mt-5 ">
                <div class="col-12 text-center">
                    <h1 class="fw-700 text-dark">{{ __('custom.our_mission') }}</h1>
                </div>
            </div>
            <div class="row" style="background-image: url('{{ asset('assets/img/custom/about-bg.png') }}')">
                <div class="col-sm-6 mt-5">
                    <h4 class="fw-600 text-primary">
                        {{ __('custom.about_us_paage.our_mission') }}
                    </h4>
                    <div class="container mt-5 mission-container">
                        <div class="row text-center">
                            <div class="col-6 fs-20 fw-600  text-center mb-5">
                                <i class="text-primary fs-30 las la-money-bill"></i> <br>
                                {{ __('custom.about_us_paage.save_money') }}
                            </div>
                            <div class="col-6  fs-20 fw-600 text-center  mb-5">
                                <i class="text-primary fs-30 las la-lightbulb"></i> <br>
                                {{ __('custom.about_us_paage.better_ideas') }}
                            </div>
                            <div class="col-6  fs-20 fw-600 text-center  mb-5">
                                <i class="text-primary fs-30 las la-users"></i> <br>
                                {{ __('custom.about_us_paage.collaboration') }}
                            </div>
                            <div class="col-6  fs-20 fw-600 text-center ">
                                <i class="text-primary fs-30 las la-search"></i> <br>
                                {{ __('custom.about_us_paage.easy_to_find') }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 text-center mt-5">
                    <div class="img-fit">
                        <img src="{{ asset('assets/img/custom/mission.jpg') }}" class="img mg-fit img-xs-400 mx-auto"
                            width="500">
                    </div>
                </div>
            </div>
            <hr>
            <div class="row mt-5">
                <div class="col-sm-12">
                    <h2 class="fw-700  text-dark"> {{ __('custom.our_services') }}</h2>
                </div>
                <div class="col-sm-6 bg-light mb-2 border-right border-left p-5 text-center">
                    <p class="fs-24 fw-700 hov-text-primary"><i class="text-primary las la-list"></i>
                        {{ __('custom.contract_management') }}</p>
                    <p class="fw-300 fs-16 hov-text-primary">{{ __('custom.about_us_paage.contract_management') }}</p>
                </div>
                <div class="col-sm-6 bg-light mb-2 border-right border-left p-5 text-center">
                    <p class="fs-24 fw-700 hov-text-primary"><i class="text-primary las la-home"></i>
                        {{ __('custom.landscape_architecture') }}</p>
                    <p class="fw-300 fs-16 hov-text-primary">{{ __('custom.about_us_paage.landscape_architecture') }}</p>
                </div>
                <div class="col-sm-6 bg-light mb-2 border-right border-left p-5 text-center">
                    <p class="fs-24 fw-700 hov-text-primary"><i class="text-primary las la-users"></i>
                        {{ __('custom.sustainability') }}</p>
                    <p class="fw-300 fs-16 hov-text-primary">{{ __('custom.about_us_paage.sustainability') }}</p>
                </div>
                <div class="col-sm-6 bg-light mb-2 border-right border-left p-5 text-center">
                    <p class="fs-24 fw-700 hov-text-primary"><i class="text-primary las la-palette"></i>
                        {{ __('custom.architecture_design') }}</p>
                    <p class="fw-300 fs-16 hov-text-primary">{{ __('custom.about_us_paage.architecture_design') }}</p>
                </div>
                <div class="col-sm-6 bg-light mb-2 border-right border-left p-5 text-center">
                    <p class="fs-24 fw-700 hov-text-primary"><i class="text-primary las la-sitemap"></i>
                        {{ __('custom.construction_supervision') }}</p>
                    <p class="fw-300 fs-16 hov-text-primary">{{ __('custom.about_us_paage.construction_supervision') }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection
