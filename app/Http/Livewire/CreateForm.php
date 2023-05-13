<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use illuminate\support\Facades\Validator;

class CreateForm extends Component
{
    use WithFileUploads;

    public $title;
    public $author;
    public $price;
    public $description;
    public $category;
    public $images = [];
    public $temporary_images;
    public $product;
    public $validated;


    protected $rules = [
        'title' => 'required|min:4',
        'author' => 'required|min:4',
        'description' => 'required|min:10',
        'price' => 'required|numeric|digits_between:0,6',
        'category' => 'required',
        'images.*' => 'required|image|mimes:jpeg,png,gif|max:2048',
        'temporary_images.*' => 'image|mimes:jpeg,png,gif|max:2048',
        'temporary_images' => 'required',

    ];

    protected $messages = [
        'required' => "Il campo :attribute e' richiesto",
        'author.min' => "il campo :attribute e' troppo corto , deve essere almeno di 4 caratteri",
        'title.min' => "il campo :attribute e' troppo corto , deve essere almeno di 4 caratteri",
        'description.min' => "il campo :attribute e' troppo corto , deve essere almeno di 10 caratteri",
        'digits_between' => "il campo :attribute puo contenere massimo 6 cifre",
        'numeric' => "il campo :attribute deve essere un numero",
        'min' => 'Il campo : attribute é troppo corto',

        'temporary_images.required' => 'L\'immagine é richiesta',

        'temporary_images.*.image' => 'I file devono essere immagini',

        'temporary_images.*.max' => 'L\'immagine dev\'essere massimo di 1mb',

        'images.*.image' => 'L\'immagine dev\'essere un\'immagine',
        'images.*.max' => 'L\'immagine dev\'essere massimo di 1mb',
        'images.*.required' => 'Devi inserire almeno una foto'
    ];

    public function updatedTemporaryImages()
    {
        if ($this->validate([
            'temporary_images.*' => 'image|max:2048',
            'temporary_images' => 'required',
        ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }


    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }


    public function createProduct()
    {
        $this->validate();

        $this->product = Category::find($this->category)->products()->create($this->validate());
        if (count($this->images)) {
            foreach ($this->images as $image) {
                // $this->product->images()->create(['path' => $image->store('images', 'public')]);
                $newFileName = "products/{$this->product->id}";
                $newImage = $this->product->images()->create(['path' => $image->store($newFileName, 'public')]);

                RemoveFaces::withChain([
                    new ResizeImage($newImage->path, 1500, 1500),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id)
                ])->dispatch($newImage->id);
            }

            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }
        $this->product->user()->associate(Auth::user());
        $this->product->save();

        $this->cleanForm();

        return redirect(route('homepage'))->with('message', 'Annuncio inserito con successo, in attesa di approvazione da parte di un revisore');
    }



    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function render()
    {

        return view('livewire.create-form');
    }


    public function cleanForm()
    {
        $this->title = '';
        $this->description = '';
        $this->author = '';
        $this->category = '';
        $this->price = '';
        $this->images = [];
        $this->temporary_images = [];
    }
}
