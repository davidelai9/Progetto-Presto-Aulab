<x-layout>
    
    <section class="text-container vh-100 background-custom">
        <div class="animate__animated animate__backInUp">
            <h1 class="homepage-h1">Presto</h1>
        </div>    
        <div class="animate__animated animate__backInDown">
            <h2 class="homepage-h2" id="slogan"></h2>
        </div>
    </section>
    
    <div class="container-fluid break-homepage">
        <div class="row h-100">
            <div class="col-12 h-100">
                <logo-slider class="d-flex justify-content-center align-items-center h-100">
  
                    <div>
                        <img src="https://img.icons8.com/ios-filled/100/null/nike.png"/>
                        <img src="https://img.icons8.com/ios-filled/100/null/adidas-trefoil.png"/>
                        <img src="https://img.icons8.com/sf-black/100/null/mac-os.png"/>
                        <img src="https://img.icons8.com/ios-filled/100/null/microsoft.png"/>
                        <img src="https://img.icons8.com/ios-filled/100/null/ikea.png"/>
                        <img src="https://img.icons8.com/ios-filled/100/null/h-and-m.png"/>
                        <img src="https://img.icons8.com/ios-filled/100/null/lego.png"/>
                        <img src="https://img.icons8.com/dotty/100/null/samsung.png"/>
                     </div>
                     <div>
                        <img src="https://img.icons8.com/ios-filled/100/null/nike.png"/>
                        <img src="https://img.icons8.com/ios-filled/100/null/adidas-trefoil.png"/>
                        <img src="https://img.icons8.com/sf-black/100/null/mac-os.png"/>
                        <img src="https://img.icons8.com/ios-filled/100/null/microsoft.png"/>
                        <img src="https://img.icons8.com/ios-filled/100/null/ikea.png"/>
                        <img src="https://img.icons8.com/ios-filled/100/null/h-and-m.png"/>
                        <img src="https://img.icons8.com/ios-filled/100/null/lego.png"/>
                        <img src="https://img.icons8.com/dotty/100/null/samsung.png"/>
                     </div>   
                     <div>
                        <img src="https://img.icons8.com/ios-filled/100/null/nike.png"/>
                        <img src="https://img.icons8.com/ios-filled/100/null/adidas-trefoil.png"/>
                        <img src="https://img.icons8.com/sf-black/100/null/mac-os.png"/>
                        <img src="https://img.icons8.com/ios-filled/100/null/microsoft.png"/>
                        <img src="https://img.icons8.com/ios-filled/100/null/ikea.png"/>
                        <img src="https://img.icons8.com/ios-filled/100/null/h-and-m.png"/>
                        <img src="https://img.icons8.com/ios-filled/100/null/lego.png"/>
                        <img src="https://img.icons8.com/dotty/100/null/samsung.png"/>
                     </div>                        
                  </logo-slider>
            </div>
        </div>
    </div>

        
    <x-header title="{{__('ui.ultimiArticoli')}}"/>
    
    <div class="container header-title mb-5" data-aos="fade-down" data-aos-delay="50"  data-aos-duration="800">
        <div class="row justify-content-center">
            @foreach ($homepageProducts as $product)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="nft">
                    <div class='main'>
                        <div class="mb-3">
                            <img class='tokenImage' src="{{!$product->images()->get()->isEmpty() ? $product->images()->first()->getUrl(1500,1500) : 'https://picsum.photos/200'}}" alt="NFT" />
                        </div>
                        <a href="{{route('categoryShow' , ['category'=>$product->category])}}" class="">{{$product->category->name}}</a>
                        <h4>{{$product->getTitleSubstring()}}</h4>
                        <p class='description'>{{$product->getDescriptionSubstring()}}</p>
                        <div class='tokenInfo'>
                            <div class="price">
                                <p class="m-0">{{$product->price}}€</p>
                            </div>
                            <div class="duration">
                                <a href="{{route('products.show' , $product)}}">{{__('ui.Dettaglio')}}</a>
                            </div>
                        </div>
                        <hr />
                        <div class='creator'>
                            <p>{{$product->author}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <section id="best-selling" class="container-fluid latest-product-home mt-5">
        <div class="corner-pattern-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12 d-flex align-items-center mb-5" data-aos="fade-left" data-aos-duration="800">
                    <figure class="products-thumb">
                        <img src="{{!$latestProduct->images()->get()->isEmpty() ? $latestProduct->images()->first()->getUrl(1500,1500) : 'https://picsum.photos/200'}}" alt="book" class="img-fluid">
                    </figure>	
                </div>
                <div class="col-md-6 col-12" data-aos="fade-right" data-aos-duration="800">
                        <h2 class="section-title divider">{{__('ui.ultimoArticolo')}}</h2>
                    <div class="product-entry">
                        <div class="products-content">
                            <a href="{{route('categoryShow' , ['category'=>$latestProduct->category])}}" class="">{{$latestProduct->category->name}}</a>
                            <h3 class="item-title">{{$latestProduct->title}}</h3>
                            <p>{{$latestProduct->description}}</p>
                            <div class="item-price d-flex align-items-center">
                                $ {{$latestProduct->price}}
                                <a class="ms-auto" href="{{route('products.show' , $product->where('is_accepted', true)->orderBy('created_at', 'desc')->first())}}">
                                    <button class="add-to-cart">{{__('ui.Dettaglio')}}</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
</x-layout>