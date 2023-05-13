<div class="wrapper-create">
    <form wire:submit.prevent="createProduct">
        <div class="title-create">{{__('ui.InserisciAnnuncio')}}
        </div>
        <div class="form-custom">
            <div class="inputfield-create">
                <label class="label-dark">{{__('ui.NomeP')}}</label>
                <input type="text" class="input-create" wire:model.lazy="title" >
            </div>
            @error('title')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
            @enderror
            <div class="inputfield-create">
                <label class="label-dark">{{__('ui.Autore')}}</label>
                <input type="text" class="input-create" wire:model.lazy="author">
            </div>
            @error('author')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
            @enderror
            <div class="inputfield-create">
                <label class="label-dark">{{__('ui.Descrizione')}}</label>
                <textarea
                name=""
                class="form-control"
                id=""
                cols="30"
                rows="10"
                wire:model.lazy="description"></textarea>
            </div>
            @error('description')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
            @enderror

            <div class="inputfield-create mb-3">
                <label class="label-dark">{{__('ui.AggiungiIm')}}:</label>
                <input wire:model="temporary_images" type="file" name="images" multiple class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img"/>
            </div>
            @error('temporary_images')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
            @enderror

            @if (!empty($images))
                <div class="row mb-3">
                    <div class="col-12">
                        <p>{{__('ui.Anteprima')}}:</p>
                        <div class="row border border-4 rounded shadow py-4">
                            @foreach ($images as $key => $image)
                            <div class="col-12 my-3">
                                <div class="img-preview mx-auto img-fluid" style="background-image: url({{$image->temporaryUrl()}});"></div>
                                <button type="button" class="btn btn-danger shadow d-block text-center mt-2 mx-auto" wire:click="removeImage({{$key}})">X</button>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
             @endif


            <div class="inputfield-create mt-2">
                <label class="label-dark">{{__('ui.Categoria')}}: </label>
                <div class="custom_select">
                    <select name="category_id" wire:model.lazy="category">
                        <option value="">{{__('ui.Seleziona')}}</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="inputfield-create">
                <label class="label-dark">{{__('ui.Prezzo')}}</label>
                <input type="number" class="input-create" wire:model.lazy="price">
            </div>
            @error('price')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
            @enderror
            <div class="inputfield-create">
                <input type="submit" value="{{__('ui.Pubblica')}}" class="btn-create" />
            </div>
        </div>
    </form>   
</div>