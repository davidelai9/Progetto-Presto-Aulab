<x-layout>
    <section class="h-100 gradient-form">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">
                                    
                                    <div class="text-center">
                                        <img src="./storage/img/Logo.png"
                                        style="width: 185px;" alt="logo">
                                        <h4 class="mt-1 mb-5 pb-1">{{__('ui.Lavora')}}</h4>
                                    </div>
                                    
                                    <form method="GET" action="{{route('become.revisor')}}">
                                        @csrf
                                        
                                        <div class="form-outline mb-4">
                                            <input type="text" id="form2Example11" class="form-control" name="name"
                                            placeholder="Nome Utente" value="{{Auth::user()->name}}" readonly/>
                                        </div>
                                        
                                        <div class="form-outline mb-4">
                                            <input type="email" id="form2Example11" class="form-control" name="email"
                                            placeholder="Indirizzo Email" value="{{Auth::user()->email}}" readonly/>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label">{{__('ui.Perche')}}</label>
                                           <textarea name="message" id="" cols="30" rows="10" class="form-control"></textarea>
                                        </div>
                                                                                
                                        <div class="text-center pt-1 my-3 pb-1">
                                            <button type="submit" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="button">Invia</button>
                                        </div>
                                        
                                    </form>
                                    
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">{{__('ui.test1')}}!</h4>
                                    <p class="small mb-0">{{__('ui.test2')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>