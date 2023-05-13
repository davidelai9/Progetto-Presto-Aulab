 <x-layout>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <main>
          <div class="container detail-body">
            <div class="grid product">
              <div class="column-xs-12 column-md-7">
                <div class="product-gallery">
                  <div class="product-image">
                    @foreach ($product->images as $index => $image)
                      <img id="zoom" class="img-detail pop @if ($index === 0) active @endif " src="{{!$product->images()->get()->isEmpty() ? $image->getUrl(1500,1500) : 'https://picsum.photos/200'}}">
                    @endforeach
                  </div>
                  <ul class="image-list detail-ul me-0">
                    @foreach($product->images as $image)
                    <li class="image-item detail-li">
                      <img class="img-detail mb-3" src="{{!$product->images()->get()->isEmpty() ? $image->getUrl(1500,1500) : 'https://picsum.photos/200'}}">
                    </li>
                    @endforeach
                  </ul>
                </div>
              </div>
              <div class="column-xs-12 column-md-5">
                <a href="{{route('categoryShow' , ['category'=>$product->category])}}" class=""></a>
                <h1 class="h1-detail">{{$product->title}}</h1>
                <h2 class="h2-detail">{{__('ui.Prezzo')}}: {{$product->price}}€</h2>
                <div class="description-detail">
                  <p>{{$product->description}}</p>
                </div>
                <div class="description-detail">
                  <p>Autore: {{$product->author}}</p>
                </div>
                <div class="description-detail">
                  <p>Pubblicato il: {{$product->created_at}}</p>
                </div>
                
                <a href="{{route('products.index')}}">
                <button class="add-to-cart">{{__('ui.TornaArt')}}</button>
                </a>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
  </div>
</x-layout>
