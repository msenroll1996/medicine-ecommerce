@extends('frontend.master')

@section('content')
<div class="ps-categogy">
            <div class="container">
                <ul class="ps-breadcrumb">
                    <li class="ps-breadcrumb__item"><a href="index.html">Home</a></li>
                    <li class="ps-breadcrumb__item"><a href="index.html">Shop</a></li>
                    <li class="ps-breadcrumb__item active" aria-current="page">Diagnosis</li>
                </ul>
                <div class="ps-categogy__content">
                    <div class="row row-reverse">
                        <div class="col-12 col-md-9">

                            <!-- Title if category selcected from navbar -->
                            <h1 class="ps-categogy__name">Equipment</h1>
                            <!-- End title -->

                            <div class="ps-categogy__wrapper">
                                <div class="ps-categogy__sort">
                                    <form id = "sortProductForm"><span>Sort by</span>
                                        <select onchange = "onchangeEvent()" class="form-select">
                                            <option selected>Latest</option>
                                            <option value="Popularity">Popularity</option>
                                            <option value="Average rating">Average rating</option>
                                            <option value="Price: low to high">Price: low to high</option>
                                            <option value="Price: high to low">Price: high to low</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <div class="ps-categogy--list">
                                @foreach($latest_medicines as $latest_medicine)
                                <div class="ps-product ps-product--list">
                                    <div class="ps-product__content">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                                                <figure><img src="{{$latest_medicine->img ?? $latest_medicine->image_url}}" alt="Image unavailable" />
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Quick view"><a href="#"
                                                        data-toggle="modal" data-target="#popupQuickview"><i
                                                            class="fa fa-search"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                            </div>
                                        </div>
                                        <div class="ps-product__info"><a class="ps-product__branch" href="#">MyMedi</a>
                                            <h5 class="ps-product__title"><a href="product.html">{{$latest_medicine->medicine_name}}</a></h5>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5" selected="selected">5</option>
                                                </select><span class="ps-product__review">(7 Reviews)</span>
                                            </div>
                                            <div class="ps-product__desc">
                                                <ul class="ps-product__list">
                                                    <li>Study history up to 30 days</li>
                                                    <li>Up to 5 users simultaneously</li>
                                                    <li>Has HEALTH certificate</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-product__footer">
                                        <div class="ps-product__meta"><span class="ps-product__price sale">Rs
                                                {{$latest_medicine->sp_per_piece}}</span><span class="ps-product__del">Rs 53.99</span>
                                        </div>
                                        <div class="ps-product__quantity">
                                            <h6>Quantity</h6>
                                            <div class="def-number-input number-input safari_only">
                                                <button class="minus"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                        class="icon-minus"></i></button>
                                                <input id = "qtyValue{{$latest_medicine->id}}" class="quantity" min="0" name="quantity" value="1"
                                                    type="number" />
                                                <button class="plus"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                        class="icon-plus"></i></button>
                                            </div>
                                            <a class="ps-btn ps-btn--lblue" href="javascript:add_to_cart({{$latest_medicine->id}})" id="{{$latest_medicine->id}}" route="{{route('frontend.add_to_cart')}}"
                                                 >Add to cart</a>
                                        </div>
                                        <div class="ps-product__variations"><a class="ps-product__link"
                                                href="{{route('wishlist.add',['product_id' => $latest_medicine->id])}}">Add
                                                to wishlist</a></div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- <div class="ps-product ps-product--list">
                                    <div class="ps-product__content">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                                                <figure><img src="img/products/054.jpg" alt="alt" /><img
                                                        src="img/products/057.jpg" alt="alt" />
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Quick view"><a href="#"
                                                        data-toggle="modal" data-target="#popupQuickview"><i
                                                            class="fa fa-search"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                                <div class="ps-badge ps-badge--hot">Hot</div>
                                            </div>
                                        </div>
                                        <div class="ps-product__info"><a class="ps-product__branch" href="#">MyMedi</a>
                                            <h5 class="ps-product__title"><a href="product.html">Somersung Sonic X2000
                                                    Pro Black</a></h5>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4" selected="selected">4</option>
                                                    <option value="5">5</option>
                                                </select><span class="ps-product__review">(8 Reviews)</span>
                                            </div>
                                            <div class="ps-product__desc">
                                                <ul class="ps-product__list">
                                                    <li>Study history up to 30 days</li>
                                                    <li>Up to 5 users simultaneously</li>
                                                    <li>Has HEALTH certificate</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-product__footer">
                                        <div class="ps-product__meta"><span class="ps-product__price">Rs 299.99</span>
                                        </div>
                                        <div class="ps-product__quantity">
                                            <h6>Quantity</h6>
                                            <div class="def-number-input number-input safari_only">
                                                <button class="minus"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                        class="icon-minus"></i></button>
                                                <input class="quantity" min="0" name="quantity" value="1"
                                                    type="number" />
                                                <button class="plus"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                        class="icon-plus"></i></button>
                                            </div><a class="ps-btn ps-btn--lblue" href="#" data-toggle="modal"
                                                data-target="#popupAddcart">Add to cart</a>
                                        </div>
                                        <div class="ps-product__variations"><a class="ps-product__link"
                                                href="wishlist.html">Add
                                                to wishlist</a></div>
                                    </div>
                                </div>
                                <div class="ps-product ps-product--list">
                                    <div class="ps-product__content">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                                                <figure><img src="img/products/055.jpg" alt="alt" /><img
                                                        src="img/products/056.jpg" alt="alt" />
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Quick view"><a href="#"
                                                        data-toggle="modal" data-target="#popupQuickview"><i
                                                            class="fa fa-search"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                            </div>
                                        </div>
                                        <div class="ps-product__info"><a class="ps-product__branch" href="#">MyMedi</a>
                                            <h5 class="ps-product__title"><a href="product.html">Somersung Sonic X2500
                                                    Pro White</a></h5>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5" selected="selected">5</option>
                                                </select><span class="ps-product__review">(9 Reviews)</span>
                                            </div>
                                            <div class="ps-product__desc">
                                                <ul class="ps-product__list">
                                                    <li>Study history up to 30 days</li>
                                                    <li>Up to 5 users simultaneously</li>
                                                    <li>Has HEALTH certificate</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-product__footer">
                                        <div class="ps-product__meta"><span class="ps-product__price">Rs 39.99</span>
                                        </div>
                                        <div class="ps-product__quantity">
                                            <h6>Quantity</h6>
                                            <div class="def-number-input number-input safari_only">
                                                <button class="minus"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                        class="icon-minus"></i></button>
                                                <input class="quantity" min="0" name="quantity" value="1"
                                                    type="number" />
                                                <button class="plus"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                        class="icon-plus"></i></button>
                                            </div><a class="ps-btn ps-btn--lblue" href="#" data-toggle="modal"
                                                data-target="#popupAddcart">Add to cart</a>
                                        </div>
                                        <div class="ps-product__variations"><a class="ps-product__link"
                                                href="wishlist.html">Add
                                                to wishlist</a></div>
                                    </div>
                                </div>
                                <div class="ps-product ps-product--list">
                                    <div class="ps-product__content">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                                                <figure><img src="img/products/028.jpg" alt="alt" /><img
                                                        src="img/products/045.jpg" alt="alt" />
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Quick view"><a href="#"
                                                        data-toggle="modal" data-target="#popupQuickview"><i
                                                            class="fa fa-search"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                            </div>
                                        </div>
                                        <div class="ps-product__info"><a class="ps-product__branch"
                                                href="#">Medicstore</a>
                                            <h5 class="ps-product__title"><a href="product.html">Digital Thermometer
                                                    X30-Pro</a></h5>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4" selected="selected">4</option>
                                                    <option value="5">5</option>
                                                </select><span class="ps-product__review">(4 Reviews)</span>
                                            </div>
                                            <div class="ps-product__desc">
                                                <ul class="ps-product__list">
                                                    <li>Study history up to 30 days</li>
                                                    <li>Up to 5 users simultaneously</li>
                                                    <li>Has HEALTH certificate</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-product__footer">
                                        <div class="ps-product__meta"><span class="ps-product__price sale">Rs
                                                60.39</span><span class="ps-product__del">Rs 89.99</span>
                                        </div>
                                        <div class="ps-product__quantity">
                                            <h6>Quantity</h6>
                                            <div class="def-number-input number-input safari_only">
                                                <button class="minus"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                        class="icon-minus"></i></button>
                                                <input class="quantity" min="0" name="quantity" value="1"
                                                    type="number" />
                                                <button class="plus"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                        class="icon-plus"></i></button>
                                            </div><a class="ps-btn ps-btn--lblue" href="#" data-toggle="modal"
                                                data-target="#popupAddcart">Add to cart</a>
                                        </div>
                                        <div class="ps-product__variations"><a class="ps-product__link"
                                                href="wishlist.html">Add
                                                to wishlist</a></div>
                                    </div>
                                </div>
                                <div class="ps-product ps-product--list">
                                    <div class="ps-product__content">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                                                <figure><img src="img/products/042.jpg" alt="alt" />
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Quick view"><a href="#"
                                                        data-toggle="modal" data-target="#popupQuickview"><i
                                                            class="fa fa-search"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                            </div>
                                        </div>
                                        <div class="ps-product__info"><a class="ps-product__branch" href="#">iHeart</a>
                                            <h5 class="ps-product__title"><a href="product.html">Extractor used to
                                                    remove teeth</a></h5>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5" selected="selected">5</option>
                                                </select><span class="ps-product__review">(5 Reviews)</span>
                                            </div>
                                            <div class="ps-product__desc">
                                                <ul class="ps-product__list">
                                                    <li>Study history up to 30 days</li>
                                                    <li>Up to 5 users simultaneously</li>
                                                    <li>Has HEALTH certificate</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-product__footer">
                                        <div class="ps-product__meta"><span class="ps-product__price">Rs 53.64</span>
                                        </div>
                                        <div class="ps-product__quantity">
                                            <h6>Quantity</h6>
                                            <div class="def-number-input number-input safari_only">
                                                <button class="minus"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                        class="icon-minus"></i></button>
                                                <input class="quantity" min="0" name="quantity" value="1"
                                                    type="number" />
                                                <button class="plus"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                        class="icon-plus"></i></button>
                                            </div><a class="ps-btn ps-btn--lblue" href="#" data-toggle="modal"
                                                data-target="#popupAddcart">Add to cart</a>
                                        </div>
                                        <div class="ps-product__variations"><a class="ps-product__link"
                                                href="wishlist.html">Add
                                                to wishlist</a></div>
                                    </div>
                                </div>
                                <div class="ps-product ps-product--list">
                                    <div class="ps-product__content">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                                                <figure><img src="img/products/016.jpg" alt="alt" /><img
                                                        src="img/products/021.jpg" alt="alt" />
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Quick view"><a href="#"
                                                        data-toggle="modal" data-target="#popupQuickview"><i
                                                            class="fa fa-search"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                            </div>
                                        </div>
                                        <div class="ps-product__info"><a class="ps-product__branch"
                                                href="#">WeTakeCare</a>
                                            <h5 class="ps-product__title"><a href="product.html">Oxygen concentrator
                                                    model KTS-5000</a></h5>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3" selected="selected">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select><span class="ps-product__review">(2 Reviews)</span>
                                            </div>
                                            <div class="ps-product__desc">
                                                <ul class="ps-product__list">
                                                    <li>Study history up to 30 days</li>
                                                    <li>Up to 5 users simultaneously</li>
                                                    <li>Has HEALTH certificate</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-product__footer">
                                        <div class="ps-product__meta"><span class="ps-product__price">Rs 53.99</span>
                                        </div>
                                        <div class="ps-product__quantity">
                                            <h6>Quantity</h6>
                                            <div class="def-number-input number-input safari_only">
                                                <button class="minus"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                        class="icon-minus"></i></button>
                                                <input class="quantity" min="0" name="quantity" value="1"
                                                    type="number" />
                                                <button class="plus"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                        class="icon-plus"></i></button>
                                            </div><a class="ps-btn ps-btn--lblue" href="#" data-toggle="modal"
                                                data-target="#popupAddcart">Add to cart</a>
                                        </div>
                                        <div class="ps-product__variations"><a class="ps-product__link"
                                                href="wishlist.html">Add
                                                to wishlist</a></div>
                                    </div>
                                </div>
                                <div class="ps-product ps-product--list">
                                    <div class="ps-product__content">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                                                <figure><img src="img/products/001.jpg" alt="alt" /><img
                                                        src="img/products/009.jpg" alt="alt" />
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Quick view"><a href="#"
                                                        data-toggle="modal" data-target="#popupQuickview"><i
                                                            class="fa fa-search"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                                <div class="ps-badge ps-badge--sold">Sold Out</div>
                                            </div>
                                        </div>
                                        <div class="ps-product__info"><a class="ps-product__branch"
                                                href="#">iLovehealth</a>
                                            <h5 class="ps-product__title"><a href="product.html">Digital Thermometer
                                                    X30-Pro</a></h5>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5" selected="selected">5</option>
                                                </select><span class="ps-product__review">(1 Reviews)</span>
                                            </div>
                                            <div class="ps-product__desc">
                                                <ul class="ps-product__list">
                                                    <li>Study history up to 30 days</li>
                                                    <li>Up to 5 users simultaneously</li>
                                                    <li>Has HEALTH certificate</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-product__footer">
                                        <div class="ps-product__meta"><span class="ps-product__price sale">Rs
                                                77.65</span><span class="ps-product__del">Rs 80.65</span>
                                        </div>
                                        <div class="ps-product__quantity">
                                            <h6>Quantity</h6>
                                            <div class="def-number-input number-input safari_only">
                                                <button class="minus"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                        class="icon-minus"></i></button>
                                                <input class="quantity" min="0" name="quantity" value="1"
                                                    type="number" />
                                                <button class="plus"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                        class="icon-plus"></i></button>
                                            </div><a class="ps-btn ps-btn--lblue" href="#" data-toggle="modal"
                                                data-target="#popupAddcart">Add to cart</a>
                                        </div>
                                        <div class="ps-product__variations"><a class="ps-product__link"
                                                href="wishlist.html">Add
                                                to wishlist</a></div>
                                    </div>
                                </div>
                                <div class="ps-product ps-product--list">
                                    <div class="ps-product__content">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                                                <figure><img src="img/products/003.jpg" alt="alt" /><img
                                                        src="img/products/008.jpg" alt="alt" />
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Quick view"><a href="#"
                                                        data-toggle="modal" data-target="#popupQuickview"><i
                                                            class="fa fa-search"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                                <div class="ps-badge ps-badge--sale">Sale</div>
                                                <div class="ps-badge ps-badge--hot">Hot</div>
                                            </div>
                                        </div>
                                        <div class="ps-product__info"><a class="ps-product__branch"
                                                href="#">BestPharm</a>
                                            <h5 class="ps-product__title"><a href="product.html">Automatic blood
                                                    pressure monitor</a></h5>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5" selected="selected">5</option>
                                                </select><span class="ps-product__review">(3 Reviews)</span>
                                            </div>
                                            <div class="ps-product__desc">
                                                <ul class="ps-product__list">
                                                    <li>Study history up to 30 days</li>
                                                    <li>Up to 5 users simultaneously</li>
                                                    <li>Has HEALTH certificate</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-product__footer">
                                        <div class="ps-product__meta"><span class="ps-product__price sale">Rs
                                                90.65</span><span class="ps-product__del">Rs 60.65</span>
                                        </div>
                                        <div class="ps-product__quantity">
                                            <h6>Quantity</h6>
                                            <div class="def-number-input number-input safari_only">
                                                <button class="minus"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                        class="icon-minus"></i></button>
                                                <input class="quantity" min="0" name="quantity" value="1"
                                                    type="number" />
                                                <button class="plus"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                        class="icon-plus"></i></button>
                                            </div><a class="ps-btn ps-btn--lblue" href="#" data-toggle="modal"
                                                data-target="#popupAddcart">Add to cart</a>
                                        </div>
                                        <div class="ps-product__variations"><a class="ps-product__link"
                                                href="wishlist.html">Add
                                                to wishlist</a></div>
                                    </div>
                                </div>
                                <div class="ps-product ps-product--list">
                                    <div class="ps-product__content">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                                                <figure><img src="img/products/001.jpg" alt="alt" /><img
                                                        src="img/products/009.jpg" alt="alt" />
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Quick view"><a href="#"
                                                        data-toggle="modal" data-target="#popupQuickview"><i
                                                            class="fa fa-search"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                                <div class="ps-badge ps-badge--sold">Sold Out</div>
                                            </div>
                                        </div>
                                        <div class="ps-product__info"><a class="ps-product__branch"
                                                href="#">Medicstore</a>
                                            <h5 class="ps-product__title"><a href="product.html">Digital Thermometer
                                                    X30-Pro</a></h5>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5" selected="selected">5</option>
                                                </select><span class="ps-product__review">(6 Reviews)</span>
                                            </div>
                                            <div class="ps-product__desc">
                                                <ul class="ps-product__list">
                                                    <li>Study history up to 30 days</li>
                                                    <li>Up to 5 users simultaneously</li>
                                                    <li>Has HEALTH certificate</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-product__footer">
                                        <div class="ps-product__meta"><span class="ps-product__price sale">Rs
                                                77.65</span><span class="ps-product__del">Rs 80.65</span>
                                        </div>
                                        <div class="ps-product__quantity">
                                            <h6>Quantity</h6>
                                            <div class="def-number-input number-input safari_only">
                                                <button class="minus"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                        class="icon-minus"></i></button>
                                                <input class="quantity" min="0" name="quantity" value="1"
                                                    type="number" />
                                                <button class="plus"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                        class="icon-plus"></i></button>
                                            </div><a class="ps-btn ps-btn--lblue" href="#" data-toggle="modal"
                                                data-target="#popupAddcart">Add to cart</a>
                                        </div>
                                        <div class="ps-product__variations"><a class="ps-product__link"
                                                href="wishlist.html">Add
                                                to wishlist</a></div>
                                    </div>
                                </div>
                                <div class="ps-product ps-product--list">
                                    <div class="ps-product__content">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                                                <figure><img src="img/products/011.jpg" alt="alt" />
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Quick view"><a href="#"
                                                        data-toggle="modal" data-target="#popupQuickview"><i
                                                            class="fa fa-search"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                            </div>
                                        </div>
                                        <div class="ps-product__info"><a class="ps-product__branch"
                                                href="#">BestPharm</a>
                                            <h5 class="ps-product__title"><a href="product.html">Hill-Rom Affinity III
                                                    Progressa iBed</a>
                                            </h5>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5" selected="selected">5</option>
                                                </select><span class="ps-product__review">(5 Reviews)</span>
                                            </div>
                                            <div class="ps-product__desc">
                                                <ul class="ps-product__list">
                                                    <li>Study history up to 30 days</li>
                                                    <li>Up to 5 users simultaneously</li>
                                                    <li>Has HEALTH certificate</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-product__footer">
                                        <div class="ps-product__meta"><span class="ps-product__price">Rs 488.23</span>
                                        </div>
                                        <div class="ps-product__quantity">
                                            <h6>Quantity</h6>
                                            <div class="def-number-input number-input safari_only">
                                                <button class="minus"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                        class="icon-minus"></i></button>
                                                <input class="quantity" min="0" name="quantity" value="1"
                                                    type="number" />
                                                <button class="plus"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                        class="icon-plus"></i></button>
                                            </div><a class="ps-btn ps-btn--lblue" href="#" data-toggle="modal"
                                                data-target="#popupAddcart">Add to cart</a>
                                        </div>
                                        <div class="ps-product__variations"><a class="ps-product__link"
                                                href="wishlist.html">Add
                                                to wishlist</a></div>
                                    </div>
                                </div>
                                <div class="ps-product ps-product--list">
                                    <div class="ps-product__content">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                                                <figure><img src="img/products/012.jpg" alt="alt" /><img
                                                        src="img/products/013.jpg" alt="alt" />
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Quick view"><a href="#"
                                                        data-toggle="modal" data-target="#popupQuickview"><i
                                                            class="fa fa-search"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                            </div>
                                        </div>
                                        <div class="ps-product__info"><a class="ps-product__branch"
                                                href="#">HeartRate</a>
                                            <h5 class="ps-product__title"><a href="product.html">Hill-Rom Affinity III
                                                    Progressa iBed</a>
                                            </h5>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4" selected="selected">4</option>
                                                    <option value="5">5</option>
                                                </select><span class="ps-product__review">(3 Reviews)</span>
                                            </div>
                                            <div class="ps-product__desc">
                                                <ul class="ps-product__list">
                                                    <li>Study history up to 30 days</li>
                                                    <li>Up to 5 users simultaneously</li>
                                                    <li>Has HEALTH certificate</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-product__footer">
                                        <div class="ps-product__meta"><span class="ps-product__price">Rs 436.87</span>
                                        </div>
                                        <div class="ps-product__quantity">
                                            <h6>Quantity</h6>
                                            <div class="def-number-input number-input safari_only">
                                                <button class="minus"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                        class="icon-minus"></i></button>
                                                <input class="quantity" min="0" name="quantity" value="1"
                                                    type="number" />
                                                <button class="plus"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                        class="icon-plus"></i></button>
                                            </div><a class="ps-btn ps-btn--lblue" href="#" data-toggle="modal"
                                                data-target="#popupAddcart">Add to cart</a>
                                        </div>
                                        <div class="ps-product__variations"><a class="ps-product__link"
                                                href="wishlist.html">Add
                                                to wishlist</a></div>
                                    </div>
                                </div>
                                <div class="ps-product ps-product--list">
                                    <div class="ps-product__content">
                                        <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                                                <figure><img src="img/products/013.jpg" alt="alt" /><img
                                                        src="img/products/012.jpg" alt="alt" />
                                                </figure>
                                            </a>
                                            <div class="ps-product__actions">
                                                <div class="ps-product__item" data-toggle="tooltip"
                                                    data-placement="left" title="Quick view"><a href="#"
                                                        data-toggle="modal" data-target="#popupQuickview"><i
                                                            class="fa fa-search"></i></a></div>
                                            </div>
                                            <div class="ps-product__badge">
                                            </div>
                                        </div>
                                        <div class="ps-product__info"><a class="ps-product__branch"
                                                href="#">BestPharm</a>
                                            <h5 class="ps-product__title"><a href="product.html">Hill-Rom VersaCare</a>
                                            </h5>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4" selected="selected">4</option>
                                                    <option value="5">5</option>
                                                </select><span class="ps-product__review">(8 Reviews)</span>
                                            </div>
                                            <div class="ps-product__desc">
                                                <ul class="ps-product__list">
                                                    <li>Study history up to 30 days</li>
                                                    <li>Up to 5 users simultaneously</li>
                                                    <li>Has HEALTH certificate</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-product__footer">
                                        <div class="ps-product__meta"><span class="ps-product__price">Rs 136.87</span>
                                        </div>
                                        <div class="ps-product__quantity">
                                            <h6>Quantity</h6>
                                            <div class="def-number-input number-input safari_only">
                                                <button class="minus"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                        class="icon-minus"></i></button>
                                                <input class="quantity" min="0" name="quantity" value="1"
                                                    type="number" />
                                                <button class="plus"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                        class="icon-plus"></i></button>
                                            </div><a class="ps-btn ps-btn--lblue" href="#" data-toggle="modal"
                                                data-target="#popupAddcart">Add to cart</a>
                                        </div>
                                        <div class="ps-product__variations"><a class="ps-product__link"
                                                href="wishlist.html">Add
                                                to wishlist</a></div>
                                    </div>
                                </div> -->
                            </div>
                            <div class="ps-pagination">
                                <ul class="pagination">
                                    <li><a href="{{$latest_medicines->previousPageUrl()}}"><i class="fa fa-angle-double-left"></i></a></li>
                                    <li class= "{{$latest_medicines->currentPage() == 1 ?  'active' : ''}}"><a href="{{$latest_medicines->path()}}?page=1">1</a></li>
                                    <li class= "{{$latest_medicines->currentPage() == 2 ?  'active' : ''}}"><a href="{{$latest_medicines->path()}}?page=2">2</a></li>
                                    <li class= "{{$latest_medicines->currentPage() == 3 ?  'active' : ''}}"><a href="{{$latest_medicines->path()}}?page=3">3</a></li>
                                    <li class= "{{$latest_medicines->currentPage() >= 4 ?  'active' : ''}}"><a href="{{$latest_medicines->nextPageUrl()}}"><i class="fa fa-angle-double-right"></i></a></li>
                                </ul>
                            </div>
                            
                            
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="ps-widget ps-widget--product">
                                <div class="ps-widget__block">
                                    <h4 class="ps-widget__title">Categories</h4><a class="ps-block-control" href="#"><i
                                            class="fa fa-angle-down"></i></a>
                                    <div class="ps-widget__content ps-widget__category">
                                        <ul class="menu--mobile">
                                            <li><a href="#">Diagnosis</a><span class="sub-toggle"><i
                                                        class="fa fa-chevron-down"></i></span>
                                                <ul class="sub-menu">
                                                    <li><a href="#">Biopsy tools</a></li>
                                                    <li><a href="#">Endoscopes</a></li>
                                                    <li><a href="#">Monitoring</a></li>
                                                    <li><a href="#">Otoscopes</a></li>
                                                    <li><a href="#">Oxygen concentrators</a></li>
                                                    <li><a href="#">Tables and assistants</a></li>
                                                    <li><a href="#">Thermometer</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Equipment</a><span class="sub-toggle"><i
                                                        class="fa fa-chevron-down"></i></span>
                                                <ul class="sub-menu">
                                                    <li><a href="#">Blades</a></li>
                                                    <li><a href="#">Education</a></li>
                                                    <li><a href="#">Germicidal lamps</a></li>
                                                    <li><a href="#">Heart Health</a></li>
                                                    <li><a href="#">Infusion stands</a></li>
                                                    <li><a href="#">Lighting</a></li>
                                                    <li><a href="#">Machines</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Higiene</a><span class="sub-toggle"><i
                                                        class="fa fa-chevron-down"></i></span>
                                                <ul class="sub-menu">
                                                    <li><a href="#">Disposable products</a></li>
                                                    <li><a href="#">Face masks</a></li>
                                                    <li><a href="#">Gloves</a></li>
                                                    <li><a href="#">Protective covers</a></li>
                                                    <li><a href="#">Sterilization</a></li>
                                                    <li><a href="#">Surgical foils</a></li>
                                                    <li><a href="#">Uniforms</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Laboratory</a><span class="sub-toggle"><i
                                                        class="fa fa-chevron-down"></i></span>
                                                <ul class="sub-menu">
                                                    <li><a href="#">Devices</a></li>
                                                    <li><a href="#">Diagnostic tests</a></li>
                                                    <li><a href="#">Disinfectants</a></li>
                                                    <li><a href="#">Dyes</a></li>
                                                    <li><a href="#">Pipettes</a></li>
                                                    <li><a href="#">Test-tubes</a></li>
                                                    <li><a href="#">Tubes</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Tools</a><span class="sub-toggle"><i
                                                        class="fa fa-chevron-down"></i></span>
                                                <ul class="sub-menu">
                                                    <li><a href="#">Accessories Tools</a></li>
                                                    <li><a href="#">Blood pressure</a></li>
                                                    <li><a href="#">Capsules</a></li>
                                                    <li><a href="#">Dental</a></li>
                                                    <li><a href="#">Micrscope</a></li>
                                                    <li><a href="#">Pressure</a></li>
                                                    <li><a href="#">Sugar level</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Wound Care</a><span class="sub-toggle"><i
                                                        class="fa fa-chevron-down"></i></span>
                                                <ul class="sub-menu">
                                                    <li><a href="#">Bandages</a></li>
                                                    <li><a href="#">Gypsum foundations</a></li>
                                                    <li><a href="#">Patches and tapes</a></li>
                                                    <li><a href="#">Stomatology</a></li>
                                                    <li><a href="#">Surgical sutures</a></li>
                                                    <li><a href="#">Uniforms</a></li>
                                                    <li><a href="#">Wound healing</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="ps-widget__block">
                                    <h4 class="ps-widget__title">By price</h4><a class="ps-block-control" href="#"><i
                                            class="fa fa-angle-down"></i></a>
                                    <div class="ps-widget__content">
                                        <div class="ps-widget__price">
                                            <div id="slide-price"></div>
                                        </div>
                                        <div class="ps-widget__input"><span class="ps-price" id="slide-price-min">Rs
                                                0</span><span class="bridge">-</span><span class="ps-price"
                                                id="slide-price-max">Rs 820</span>
                                        </div>
                                        <button class="ps-widget__filter">Filter</button>
                                    </div>
                                </div>
                                <div class="ps-widget__block">
                                    <h4 class="ps-widget__title">Color</h4><a class="ps-block-control" href="#"><i
                                            class="fa fa-angle-down"></i></a>
                                    <div class="ps-widget__content">
                                        <div class="ps-widget__color">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="colorGray">
                                                <label class="custom-control-label" for="colorGray"
                                                    style="--bg-color: #5b6c8f"></label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="colorGreen">
                                                <label class="custom-control-label" for="colorGreen"
                                                    style="--bg-color: #12a05c"></label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="colorRed">
                                                <label class="custom-control-label" for="colorRed"
                                                    style="--bg-color: #f00000"></label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="colorYellow">
                                                <label class="custom-control-label" for="colorYellow"
                                                    style="--bg-color: #ff9923"></label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="colorBlack">
                                                <label class="custom-control-label" for="colorBlack"
                                                    style="--bg-color: #313330"></label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="colorBlue">
                                                <label class="custom-control-label" for="colorBlue"
                                                    style="--bg-color: #58c8ec"></label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="colorNavy">
                                                <label class="custom-control-label" for="colorNavy"
                                                    style="--bg-color: #103178"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-widget__block">
                                    <h4 class="ps-widget__title">Brands</h4><a class="ps-block-control" href="#"><i
                                            class="fa fa-angle-down"></i></a>
                                    <div class="ps-widget__content">
                                        <div class="ps-widget__item">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="BestPharm">
                                                <label class="custom-control-label" for="BestPharm">BestPharm</label>
                                            </div>
                                        </div>
                                        <div class="ps-widget__item">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="HeartRate">
                                                <label class="custom-control-label" for="HeartRate">HeartRate</label>
                                            </div>
                                        </div>
                                        <div class="ps-widget__item">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="HeartShield">
                                                <label class="custom-control-label"
                                                    for="HeartShield">HeartShield</label>
                                            </div>
                                        </div>
                                        <div class="ps-widget__item">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="iHeart">
                                                <label class="custom-control-label" for="iHeart">iHeart</label>
                                            </div>
                                        </div>
                                        <div class="ps-widget__item">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="iLovehealth">
                                                <label class="custom-control-label"
                                                    for="iLovehealth">iLovehealth</label>
                                            </div>
                                        </div>
                                        <div class="ps-widget__item">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="Medialarm">
                                                <label class="custom-control-label" for="Medialarm">Medialarm</label>
                                            </div>
                                        </div>
                                        <div class="ps-widget__item">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="Medicstore">
                                                <label class="custom-control-label" for="Medicstore">Medicstore</label>
                                            </div>
                                        </div>
                                        <div class="ps-widget__item">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="MyMedi">
                                                <label class="custom-control-label" for="MyMedi">MyMedi</label>
                                            </div>
                                        </div>
                                        <div class="ps-widget__item">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="Pharmy">
                                                <label class="custom-control-label" for="Pharmy">Pharmy</label>
                                            </div>
                                        </div>
                                        <div class="ps-widget__item">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="WeTakeCare">
                                                <label class="custom-control-label" for="WeTakeCare">WeTakeCare</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-widget__block">
                                    <h4 class="ps-widget__title">Ratings</h4><a class="ps-block-control" href="#"><i
                                            class="fa fa-angle-down"></i></a>
                                    <div class="ps-widget__content">
                                        <div class="ps-widget__item">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="rating5">
                                                <label class="custom-control-label" for="rating5"> </label>
                                                <div class="custom-label">
                                                    <select class="ps-rating" data-read-only="true">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5" selected="selected">5</option>
                                                    </select><span>(6)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ps-widget__item">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="rating4">
                                                <label class="custom-control-label" for="rating4"> </label>
                                                <div class="custom-label">
                                                    <select class="ps-rating" data-read-only="true">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4" selected="selected">4</option>
                                                        <option value="5">5</option>
                                                    </select><span>(9)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-widget__promo"><img src="img/banner-sidebar1.jpg" alt></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('js/add_to_cart.js')}}"></script>
@endsection