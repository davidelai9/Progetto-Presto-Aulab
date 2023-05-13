<x-layout>
  <div class="container-fluid mt-3">    
    <div class="row">
      <div class="col-12 d-flex justify-content-center align-items-center flex-column">
        <h1 class="text-center animate__animated animate__backInLeft">{{$product_to_check ? __('ui.Ecco') :  __('ui.NonAnnunci')}}</h1>
        <div class="d-flex justify-content-center">
          @if(Session::has('last_product_id'))
          <a href="{{route('revisor_undo')}}" class="btn btn-dark text-light shadow my-3">{{__('ui.Annulla')}}</a>
          @endif
        </div>
      </div>
    </div>
  </div>
  
  @if($product_to_check)
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="container-accordion">
          <div class="accordion">
            <dl>
              <dt>
                <a href="#accordion1" aria-expanded="false" aria-controls="accordion1" class="accordion-title accordionTitle js-accordionTrigger">{{$product_to_check->getTitleSubstring()}}</a>
              </dt>
              <dd class="accordion-content accordionItem is-collapsed" id="accordion1" aria-hidden="true">
                <main>
                  <div class="container detail-body">
                    <div class="grid product">
                      <div class="column-xs-12 column-md-7">
                        <div class="product-gallery">
                          <div class="product-image">
                            @foreach ($product_to_check->images as $index => $image)
                            <img id="zoom" class="img-detail pop @if ($index === 0) active @endif " src="{{!$product_to_check->images()->get()->isEmpty() ? $image->getUrl(1500,1500) : 'https://picsum.photos/200'}}">
                            @endforeach
                          </div>
                          <ul class="image-list detail-ul me-0">
                            @foreach($product_to_check->images as $image)
                            <li class="image-item detail-li">
                              <img class="img-detail mb-3" src="{{!$product_to_check->images()->get()->isEmpty() ? $image->getUrl(1500,1500) : 'https://picsum.photos/200'}}">
                            </li>
                            @endforeach
                          </ul>
                        </div>
                      </div>
                      <div class="column-xs-12 column-md-5">
                        <h1 class="h1-detail">{{$product_to_check->title}}</h1>
                        <h2 class="h2-detail">{{__('ui.Prezzo')}}: {{$product_to_check->price}}</h2>
                        <p class="p-0">{{__('ui.Pubblica')}}: {{$product_to_check->created_at->format('d/m/y')}}</p>
                        <p class="p-0">{{$product_to_check->author}}</p>
                        <div class="description-detail">
                          <p class="p-0">{{$product_to_check->description}}</p>
                        </div>
                
                        <div class="mt-5">
                          <div>
                            <h5>Revisione Immagini</h5>
                            <p class="p-0">Adulti: <span class="{{$image->adult}}"></span></p>
                            <p class="p-0">Satira: <span class="{{$image->spoof}}"></span></p>
                            <p class="p-0">Medicina: <span class="{{$image->medical}}"></span></p>
                            <p class="p-0">Violenza: <span class="{{$image->violence}}"></span></p>
                            <p class="p-0">Contenuto Ammiccante: <span class="{{$image->racy}}"></span></p>
                          </div>
                        </div>
                        <div class="mt-5">
                          <h5>Tags</h5>
                          <div>
                            @if($image->labels)
                            @foreach($image->labels as $label)
                            <p class="d-inline p-0">{{$label}}</p>
                            @endforeach
                            @endif
                          </div>
                        </div>

                        <div class="mt-5">
                          <a href="{{route('products.index')}}">
                            <div>
                              <form method="POST" class="d-inline" action="{{route('revisor.accept_product', ['product' => $product_to_check])}}">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success shadow">{{__('ui.Accetta')}}</button>
                              </form>
                              <form method="POST" class="d-inline ms-3" action="{{route('revisor.reject_product', ['product' => $product_to_check])}}">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-danger shadow">{{__('ui.Rifiuta')}}</button>
                              </form>
                            </div>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </main>
              </dd>
            </dl>
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>
  
</x-layout>