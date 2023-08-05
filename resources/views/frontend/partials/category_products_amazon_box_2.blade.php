@php
    $producs = get_cached_products($category->id);
    $first_box_products = $producs->slice(0, 4);
    $second_box_products = $producs->slice(4, 2);
    $third_box_products = $producs->slice(6)->take(4);
@endphp
<div class="row">
    {{--  <!--Start Box products num => 1 -->  --}}
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-12 p-2 text-center">
        <div class="row">
            @foreach ($first_box_products as $product)
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-6 text-center mb-2 item_box">
                    <div class="div_img_with_cart">
                        <a href="{{ route('product', $product->slug) }}">

                            <img class="lazyload   has-transition" src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                data-src="{{ uploaded_asset($product->thumbnail_img) }}"
                                alt="{{ $product->getTranslation('name') }}"
                                title="{{ $product->getTranslation('name') }}" width="100%">
                        </a>
                        <span class="text-primary">{{ translate('Starts from') }}</span>
                        @if (home_base_price($product) != home_discounted_base_price($product))
                            <span>
                                <del class="fw-400 text-secondary mr-1">{{ home_base_price($product) }}</del>
                            </span>
                        @endif
                        <!-- price -->
                        <span class="fw-700 text-primary">{{ home_discounted_base_price($product) }}</span>
                        <a href="{{ route('product', $product->slug) }}">
                            <h6 class="my-2">{{ $product->getShowName() }}</h6>
                        </a>
                        {{--  <!-- add to cart -->  --}}
                        <a class="cart-btn   h-35px aiz-p-hov-icon text-white fs-13 fw-700 d-flex flex-column   justify-content-center align-items-center  @if (in_array($product->id, $cart_added)) active @endif"
                            href="javascript:void(0)" onclick="showAddToCartModal({{ $product->id }})">
                            <span class="cart-btn-text">
                                {{ translate('Add to Cart') }}
                            </span>
                            <br>
                            <span><i class="las la-2x la-shopping-cart"></i></span>
                        </a>
                    </div>
                    <!-- wishlisht & compare icons -->
                    <div class="absolute-top-right aiz-p-hov-icon"
                        style="margin-left:17% !important;z-index:99 !important;">
                        <a href="javascript:void(0)" class="hov-svg-white" data-placement="left"
                            style="" onclick="addToWishList({{ $product->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="14.4" viewBox="0 0 16 14.4"
                                class="w-sm-10">
                                <g id="_51a3dbe0e593ba390ac13cba118295e4" data-name="51a3dbe0e593ba390ac13cba118295e4"
                                    transform="translate(-3.05 -4.178)">
                                    <path id="Path_32649" data-name="Path 32649"
                                        d="M11.3,5.507l-.247.246L10.8,5.506A4.538,4.538,0,1,0,4.38,11.919l.247.247,6.422,6.412,6.422-6.412.247-.247A4.538,4.538,0,1,0,11.3,5.507Z"
                                        transform="translate(0 0)" fill="#919199" />
                                    <path id="Path_32650" data-name="Path 32650"
                                        d="M11.3,5.507l-.247.246L10.8,5.506A4.538,4.538,0,1,0,4.38,11.919l.247.247,6.422,6.412,6.422-6.412.247-.247A4.538,4.538,0,1,0,11.3,5.507Z"
                                        transform="translate(0 0)" fill="#919199" />
                                </g>
                            </svg>
                        </a>
                        <a href="javascript:void(0)" class="hov-svg-white" data-placement="left"
                            onclick="addToCompare({{ $product->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                <path id="_9f8e765afedd47ec9e49cea83c37dfea"
                                    data-name="9f8e765afedd47ec9e49cea83c37dfea"
                                    d="M18.037,5.547v.8a.8.8,0,0,1-.8.8H7.221a.4.4,0,0,0-.4.4V9.216a.642.642,0,0,1-1.1.454L2.456,6.4a.643.643,0,0,1,0-.909L5.723,2.227a.642.642,0,0,1,1.1.454V4.342a.4.4,0,0,0,.4.4H17.234a.8.8,0,0,1,.8.8Zm-3.685,4.86a.642.642,0,0,0-1.1.454v1.661a.4.4,0,0,1-.4.4H2.84a.8.8,0,0,0-.8.8v.8a.8.8,0,0,0,.8.8H12.854a.4.4,0,0,1,.4.4V17.4a.642.642,0,0,0,1.1.454l3.267-3.268a.643.643,0,0,0,0-.909Z"
                                    transform="translate(-2.037 -2.038)" fill="#919199" />
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{--  <!--End Box products num => 1 -->  --}}

    {{--  <!--Start Box products num => 2 -->  --}}
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-12 p-2 text-center item_box">
        @foreach ($second_box_products as $product)
            @if ($loop->index == 0)
                <div class="div_img_with_cart">
                    <a href="{{ route('product', $product->slug) }}">
                        <img class="lazyload   has-transition" src="{{ static_asset('assets/img/placeholder.jpg') }}"
                            data-src="{{ uploaded_asset($product->thumbnail_img) }}"
                            alt="{{ $product->getTranslation('name') }}"
                            title="{{ $product->getTranslation('name') }}" width="100%">
                    </a>
                    <span class="text-primary">{{ translate('Starts from') }}</span>
                    @if (home_base_price($product) != home_discounted_base_price($product))
                        <span>
                            <del class="fw-400 text-secondary mr-1">{{ home_base_price($product) }}</del>
                        </span>
                    @endif
                    <!-- price -->
                    <span class="fw-700 text-primary">{{ home_discounted_base_price($product) }}</span>
                    <a href="{{ route('product', $product->slug) }}">
                        <h6 class="my-2">{{ $product->getTranslation('name') }} </h6>
                    </a>
                    {{--  <!-- add to cart -->  --}}
                    <a class="cart-btn   h-35px aiz-p-hov-icon text-white fs-13 fw-700 d-flex flex-column   justify-content-center align-items-center  @if (in_array($product->id, $cart_added)) active @endif"
                        href="javascript:void(0)" onclick="showAddToCartModal({{ $product->id }})">
                        <span class="cart-btn-text">
                            {{ translate('Add to Cart') }}
                        </span>
                        <br>
                        <span><i class="las la-2x la-shopping-cart"></i></span>
                    </a>
                </div>
                <!-- wishlisht & compare icons -->
                <div class="absolute-top-right aiz-p-hov-icon"
                    style="margin-left:17% !important;z-index:99 !important;">
                    <a href="javascript:void(0)" class="hov-svg-white" data-placement="left"
                        style="" onclick="addToWishList({{ $product->id }})">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="14.4" viewBox="0 0 16 14.4"
                            class="w-sm-10">
                            <g id="_51a3dbe0e593ba390ac13cba118295e4" data-name="51a3dbe0e593ba390ac13cba118295e4"
                                transform="translate(-3.05 -4.178)">
                                <path id="Path_32649" data-name="Path 32649"
                                    d="M11.3,5.507l-.247.246L10.8,5.506A4.538,4.538,0,1,0,4.38,11.919l.247.247,6.422,6.412,6.422-6.412.247-.247A4.538,4.538,0,1,0,11.3,5.507Z"
                                    transform="translate(0 0)" fill="#919199" />
                                <path id="Path_32650" data-name="Path 32650"
                                    d="M11.3,5.507l-.247.246L10.8,5.506A4.538,4.538,0,1,0,4.38,11.919l.247.247,6.422,6.412,6.422-6.412.247-.247A4.538,4.538,0,1,0,11.3,5.507Z"
                                    transform="translate(0 0)" fill="#919199" />
                            </g>
                        </svg>
                    </a>
                    <a href="javascript:void(0)" class="hov-svg-white" data-placement="left"
                        onclick="addToCompare({{ $product->id }})">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                            <path id="_9f8e765afedd47ec9e49cea83c37dfea" data-name="9f8e765afedd47ec9e49cea83c37dfea"
                                d="M18.037,5.547v.8a.8.8,0,0,1-.8.8H7.221a.4.4,0,0,0-.4.4V9.216a.642.642,0,0,1-1.1.454L2.456,6.4a.643.643,0,0,1,0-.909L5.723,2.227a.642.642,0,0,1,1.1.454V4.342a.4.4,0,0,0,.4.4H17.234a.8.8,0,0,1,.8.8Zm-3.685,4.86a.642.642,0,0,0-1.1.454v1.661a.4.4,0,0,1-.4.4H2.84a.8.8,0,0,0-.8.8v.8a.8.8,0,0,0,.8.8H12.854a.4.4,0,0,1,.4.4V17.4a.642.642,0,0,0,1.1.454l3.267-3.268a.643.643,0,0,0,0-.909Z"
                                transform="translate(-2.037 -2.038)" fill="#919199" />
                        </svg>
                    </a>
                </div>
            @endif
        @endforeach

    </div>
    {{--  <!--End Box products num => 2 -->  --}}



    {{--  <!--Start Box products num => 4 -->  --}}
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-12 p-2">
        <div class="row">
            @foreach ($third_box_products as $product)
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-6 text-center mb-2 item_box">
                    <div class="div_img_with_cart">

                        <a href="{{ route('product', $product->slug) }}">

                            <img class="lazyload   has-transition"
                                src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                data-src="{{ uploaded_asset($product->thumbnail_img) }}"
                                alt="{{ $product->getTranslation('name') }}"
                                title="{{ $product->getTranslation('name') }}" width="100%">
                        </a>
                        <span class="text-primary">{{ translate('Starts from') }}</span>
                        @if (home_base_price($product) != home_discounted_base_price($product))
                            <span>
                                <del class="fw-400 text-secondary mr-1">{{ home_base_price($product) }}</del>
                            </span>
                        @endif
                        <!-- price -->
                        <span class="fw-700 text-primary">{{ home_discounted_base_price($product) }}</span>
                        <a href="{{ route('product', $product->slug) }}">

                            <h6 class="my-2">{{ $product->getShowName() }}</h6>
                        </a>
                        {{--  <!-- add to cart -->  --}}
                        <a class="cart-btn   h-35px aiz-p-hov-icon text-white fs-13 fw-700 d-flex flex-column   justify-content-center align-items-center  @if (in_array($product->id, $cart_added)) active @endif"
                            href="javascript:void(0)" onclick="showAddToCartModal({{ $product->id }})">
                            <span class="cart-btn-text">
                                {{ translate('Add to Cart') }}
                            </span>
                            <br>
                            <span><i class="las la-2x la-shopping-cart"></i></span>
                        </a>
                    </div>
                    <!-- wishlisht & compare icons -->
                    <div class="absolute-top-right aiz-p-hov-icon"
                        style="margin-left:17% !important;z-index:99 !important;">
                        <a href="javascript:void(0)" class="hov-svg-white" data-placement="left"
                            style="" onclick="addToWishList({{ $product->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="14.4"
                                viewBox="0 0 16 14.4" class="w-sm-10">
                                <g id="_51a3dbe0e593ba390ac13cba118295e4" data-name="51a3dbe0e593ba390ac13cba118295e4"
                                    transform="translate(-3.05 -4.178)">
                                    <path id="Path_32649" data-name="Path 32649"
                                        d="M11.3,5.507l-.247.246L10.8,5.506A4.538,4.538,0,1,0,4.38,11.919l.247.247,6.422,6.412,6.422-6.412.247-.247A4.538,4.538,0,1,0,11.3,5.507Z"
                                        transform="translate(0 0)" fill="#919199" />
                                    <path id="Path_32650" data-name="Path 32650"
                                        d="M11.3,5.507l-.247.246L10.8,5.506A4.538,4.538,0,1,0,4.38,11.919l.247.247,6.422,6.412,6.422-6.412.247-.247A4.538,4.538,0,1,0,11.3,5.507Z"
                                        transform="translate(0 0)" fill="#919199" />
                                </g>
                            </svg>
                        </a>
                        <a href="javascript:void(0)" class="hov-svg-white" data-placement="left"
                            onclick="addToCompare({{ $product->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 16 16">
                                <path id="_9f8e765afedd47ec9e49cea83c37dfea"
                                    data-name="9f8e765afedd47ec9e49cea83c37dfea"
                                    d="M18.037,5.547v.8a.8.8,0,0,1-.8.8H7.221a.4.4,0,0,0-.4.4V9.216a.642.642,0,0,1-1.1.454L2.456,6.4a.643.643,0,0,1,0-.909L5.723,2.227a.642.642,0,0,1,1.1.454V4.342a.4.4,0,0,0,.4.4H17.234a.8.8,0,0,1,.8.8Zm-3.685,4.86a.642.642,0,0,0-1.1.454v1.661a.4.4,0,0,1-.4.4H2.84a.8.8,0,0,0-.8.8v.8a.8.8,0,0,0,.8.8H12.854a.4.4,0,0,1,.4.4V17.4a.642.642,0,0,0,1.1.454l3.267-3.268a.643.643,0,0,0,0-.909Z"
                                    transform="translate(-2.037 -2.038)" fill="#919199" />
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-12 p-2 text-center item_box">
        @foreach ($second_box_products as $product)
            @if ($loop->index == 1)
                <div class="div_img_with_cart">
                    <a href="{{ route('product', $product->slug) }}">
                        <img class="lazyload   has-transition" src="{{ static_asset('assets/img/placeholder.jpg') }}"
                            data-src="{{ uploaded_asset($product->thumbnail_img) }}"
                            alt="{{ $product->getTranslation('name') }}"
                            title="{{ $product->getTranslation('name') }}" width="100%">
                    </a>
                    <span class="text-primary">{{ translate('Starts from') }}</span>
                    @if (home_base_price($product) != home_discounted_base_price($product))
                        <span>
                            <del class="fw-400 text-secondary mr-1">{{ home_base_price($product) }}</del>
                        </span>
                    @endif
                    <!-- price -->
                    <span class="fw-700 text-primary">{{ home_discounted_base_price($product) }}</span>
                    <a href="{{ route('product', $product->slug) }}">
                        <h6 class="my-2">{{ $product->getTranslation('name') }} </h6>
                    </a>
                    {{--  <!-- add to cart -->  --}}
                    <a class="cart-btn   h-35px aiz-p-hov-icon text-white fs-13 fw-700 d-flex flex-column   justify-content-center align-items-center  @if (in_array($product->id, $cart_added)) active @endif"
                        href="javascript:void(0)" onclick="showAddToCartModal({{ $product->id }})">
                        <span class="cart-btn-text">
                            {{ translate('Add to Cart') }}
                        </span>
                        <br>
                        <span><i class="las la-2x la-shopping-cart"></i></span>
                    </a>
                </div>
                <!-- wishlisht & compare icons -->
                <div class="absolute-top-right aiz-p-hov-icon"
                    style="margin-left:17% !important;z-index:99 !important;">
                    <a href="javascript:void(0)" class="hov-svg-white" data-placement="left"
                        style="" onclick="addToWishList({{ $product->id }})">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="14.4" viewBox="0 0 16 14.4"
                            class="w-sm-10">
                            <g id="_51a3dbe0e593ba390ac13cba118295e4" data-name="51a3dbe0e593ba390ac13cba118295e4"
                                transform="translate(-3.05 -4.178)">
                                <path id="Path_32649" data-name="Path 32649"
                                    d="M11.3,5.507l-.247.246L10.8,5.506A4.538,4.538,0,1,0,4.38,11.919l.247.247,6.422,6.412,6.422-6.412.247-.247A4.538,4.538,0,1,0,11.3,5.507Z"
                                    transform="translate(0 0)" fill="#919199" />
                                <path id="Path_32650" data-name="Path 32650"
                                    d="M11.3,5.507l-.247.246L10.8,5.506A4.538,4.538,0,1,0,4.38,11.919l.247.247,6.422,6.412,6.422-6.412.247-.247A4.538,4.538,0,1,0,11.3,5.507Z"
                                    transform="translate(0 0)" fill="#919199" />
                            </g>
                        </svg>
                    </a>
                    <a href="javascript:void(0)" class="hov-svg-white" data-placement="left"
                        onclick="addToCompare({{ $product->id }})">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                            <path id="_9f8e765afedd47ec9e49cea83c37dfea" data-name="9f8e765afedd47ec9e49cea83c37dfea"
                                d="M18.037,5.547v.8a.8.8,0,0,1-.8.8H7.221a.4.4,0,0,0-.4.4V9.216a.642.642,0,0,1-1.1.454L2.456,6.4a.643.643,0,0,1,0-.909L5.723,2.227a.642.642,0,0,1,1.1.454V4.342a.4.4,0,0,0,.4.4H17.234a.8.8,0,0,1,.8.8Zm-3.685,4.86a.642.642,0,0,0-1.1.454v1.661a.4.4,0,0,1-.4.4H2.84a.8.8,0,0,0-.8.8v.8a.8.8,0,0,0,.8.8H12.854a.4.4,0,0,1,.4.4V17.4a.642.642,0,0,0,1.1.454l3.267-3.268a.643.643,0,0,0,0-.909Z"
                                transform="translate(-2.037 -2.038)" fill="#919199" />
                        </svg>
                    </a>
                </div>
            @endif
        @endforeach

    </div>
    {{--  <!--End Box products num => 5 -->  --}}

</div>
