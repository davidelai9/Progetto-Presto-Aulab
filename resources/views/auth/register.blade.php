<x-layout>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <section class="h-100 gradient-form d-flex justify-content-center align-items-center flex-column">
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
                      <h4 class="mt-1 mb-5 pb-1">{{__('ui.Benvenuto')}}</h4>
                    </div>
    
                    <form method="POST" action="{{route('register')}}">
                      @csrf
                      <div class="form-outline mb-4">
                        <input type="text" id="form2Example11" class="form-control" name="name"
                          placeholder="{{__('ui.NomeUtente')}}" />
                      </div>

                      <div class="form-outline mb-4">
                        <input type="email" id="form2Example11" class="form-control" name="email"
                          placeholder="{{__('ui.IndirizzoEmail')}}" />
                      </div>
    
                      <div class="form-outline mb-4">
                        <input type="password" id="form2Example22" class="form-control" placeholder="{{__('ui.Password')}}" name="password"/>
                      </div>

                      <div class="form-outline mb-4">
                        <input type="password" class="form-control" placeholder="{{__('ui.Conferma')}}" name="password_confirmation"/>
                      </div>
    
                      <div class="text-center pt-1 mb-5 pb-1">
                        <button type="submit" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="button">{{__('ui.Registrati')}}</button>
                      </div>
    
                      <div class="d-flex align-items-center justify-content-center pb-4">
                        <p class="mb-0 me-2">{{__('ui.HaiGia')}}</p>
                        <button type="button" class="btn btn-outline-danger"><a href="{{route('login')}}">{{__('ui.Login')}}</a></button>
                      </div>
    
                    </form>
    
                  </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                  <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                    <h4 class="mb-4">{{__('ui.test1')}}</h4>
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