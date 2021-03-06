@extends('frontend.master')
    @section('content')
        <div class = "container">
                    <section class="ps-section--featured">
                        <h3 class="ps-section__title">Personal Care Products</h3>
                        <div class="ps-section__content">
                            <div class="row m-0">
                                @foreach($cosmetic_health_medicines as $cosmetic_health_medicine)
                                <div class="col-6 col-md-4 col-lg-2dot4 p-0">
                                    <div class="ps-section__product">
                                        <div class="ps-product ps-product--standard">
                                            <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                    href="{{route('frontend.product',['slug' => $cosmetic_health_medicine->slug])}}">
                                                    @if($cosmetic_health_medicine->img == null && $cosmetic_health_medicine->image_url == null)
                                                    <img src = "https://images.onlineaushadhi.com/img/no-med.png">
                                                @else    
                                                    <img src="{{$cosmetic_health_medicine->img ?? $cosmetic_health_medicine->image_url}}" alt="Image unavailable" />
                                                @endif
                                                </a>
                                                <div class="ps-product__actions">
                                                    <div class="ps-product__item" title="Wishlist"><a href="{{route('wishlist.add',['product_id' => $cosmetic_health_medicine->id])}}"><i
                                                                class="fa fa-heart-o"></i></a></div>
                                                    <div class="ps-product__item" data-toggle="tooltip"
                                                        data-placement="left" title="Add to cart"><a href="javascript:add_to_cart({{$cosmetic_health_medicine->id}})" id="{{$cosmetic_health_medicine->id}}" route="{{route('frontend.add_to_cart')}}"><i
                                                                class="fa fa-shopping-basket"></i></a></div>
                                                </div>
                                                
                                            </div>
                                            <div class="ps-product__content">
                                                <h5 class="ps-product__title"><a href="{{route('frontend.product',['slug' => $cosmetic_health_medicine->slug])}}">{{$cosmetic_health_medicine->medicine_name}}</a></h5>
                                                <div class="ps-product__meta"><span class="ps-product__price">Rs
                                                {{App\Models\Stock::where('medicine_id',$cosmetic_health_medicine->id)->orderBy('id','desc')->first()->sp_per_tab ?? $cosmetic_health_medicine->sp_per_piece}}</span>
                                                </div>
                                                
                                                
                                                <div class="ps-product__actions ps-product__group-mobile">
                                                    
                                                    <div class="ps-product__cart"> <a class="ps-btn ps-btn--lblue"
                                                    href="javascript:add_to_cart({{$cosmetic_health_medicine->id}})" id="{{$cosmetic_health_medicine->id}}" route="{{route('frontend.add_to_cart')}}">Add
                                                            to cart</a></div>
                                                    <div class="ps-product__item cart" title="Add to cart"><a href="javascript:add_to_cart({{$cosmetic_health_medicine->id}})" id="{{$cosmetic_health_medicine->id}}" route="{{route('frontend.add_to_cart')}}"><i
                                                                class="fa fa-shopping-basket"></i></a></div>
                                                    <div class="ps-product__item" title="Wishlist"><a
                                                        href="{{route('wishlist.add',['product_id' => $cosmetic_health_medicine->id])}}"><i class="fa fa-heart-o"></i></a>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- Pagination -->
                
                            </div>
                            @if ($cosmetic_health_medicines->lastPage() > 1)
                    <div class="ps-pagination mb-50">
                        <ul class="pagination">
                            <li class="{{ ($cosmetic_health_medicines->currentPage() == 1) ? 'disabled' : '' }}">
                                <a href="{{ $cosmetic_health_medicines->url(1) }}"><i class="fa fa-angle-double-left"></i></a>
                            </li>
                            @for ($i = 1; $i <= $cosmetic_health_medicines->lastPage(); $i++)
                                <li class="{{ ($cosmetic_health_medicines->currentPage() == $i) ? ' active' : '' }}">
                                    <a href="{{ $cosmetic_health_medicines->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="{{ ($cosmetic_health_medicines->currentPage() == $cosmetic_health_medicines->lastPage()) ? 'disabled' : '' }}" >
                                <a href="{{ $cosmetic_health_medicines->url($cosmetic_health_medicines->currentPage()+1) }}"><i class="fa fa-angle-double-right"></i></a>
                            </li>
                        </ul>
                    </div>    
                @endif 
                            
                        </div>
                    </section>
    @endsection

                    @section('scripts')
                        <script type="text/javascript" src="{{asset('js/add_to_cart.js')}}"></script>
                    @endsection