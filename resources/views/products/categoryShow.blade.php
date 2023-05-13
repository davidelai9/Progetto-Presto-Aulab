<x-layout>
    <x-header title="{{__('category.' . strtolower($category->name))}}"/>
    <div class="container">
        <div class="row justify-content-center">
            @forelse ($category->products()->where('is_accepted', true)->get() as $product)
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
            @empty
            <div class="col-12 d-flex justify-content-center align-items-center flex-column">
                <p>{{__('ui.NonCiSono')}}</p>
                <p>{{__('ui.Pubblica')}}: <a href="{{route('products.create')}}" class="add-to-cart">{{__('ui.NuovoAnnuncio')}}</a></p>
            </div>
            @endforelse
        </div>
    </div>
</x-layout>