@extends('layouts.panel-profile')

@section('content')
  <div class="row">
    <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
      <div class="card card-profile shadow">
        <div class="row justify-content-center">
          <div class="col-lg-3 order-lg-2">
            <div class="card-profile-image" id="preview">
              <a href="#">
                @if(Auth::user()->avatar == 'default.jpg')
                    <img src="{{asset('img/theme/default.jpg')}}" class="rounded-circle">
                @else
                    <img src="{{asset('/storage/images/'.Auth::user()->avatar)}}" class="rounded-circle">
                @endif
              </a>
            </div>
          </div>
        </div>
        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
        </div>
      
        <div class="card-body pt-0 pt-md-4">
          <div class="row">
            <div class="col">
              <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                <form enctype="multipart/form-data" action="/profile/image" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group text-center" >
                        <label for="image">Actualizar Imagen</label>
                        <input type="file" id="file" name="image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                    
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-8 order-xl-1">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">Mi cuenta</h3>
            </div>
          </div>
        </div>
        <div class="card-body">
          @if ($errors -> any())
          <div class="alert alert-danger" role="alert">
              <ul>
                  @foreach ($errors->all() as $error) 
                  <li>{{$error}}</li>
                  @endforeach
              </ul>
          </div>
      @endif
  
      @if(session('notification'))
      <div class="alert alert-success" role="alert">
        {{ session('notification') }}
      </div>
      @endif
          <form action=" {{ url('profile/update') }}" method="POST">
            @csrf
            @method('PUT')
            <h6 class="heading-small text-muted mb-4">Información del usuario</h6>
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="name">Nombre de Usuario</label>
                    <input 
                      type="text" 
                      name="name" 
                      id="name"
                      class="form-control form-control-alternative" 
                      placeholder="Ingrese su Nombre"
                      value="{{ old('name',$user->name) }}"
                      >
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="email">Correo Electronico</label>
                    <input 
                      type="email" 
                      name="email"
                      id="email" 
                      class="form-control form-control-alternative" 
                      placeholder="Ingrese su correo electronico"
                      value="{{ old('email',$user->email) }}"
                      >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="phone">Telefono</label>
                    <input 
                      type="text" 
                      name="phone"
                      id="phone" 
                      class="form-control form-control-alternative" 
                      placeholder="Ingrese su numero de telefono"
                      value="{{ old('phone',$user->phone) }}"
                      >
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="addres">Dirección</label>
                    <input 
                      type="text" 
                      name="addres"
                      id="addres" 
                      class="form-control form-control-alternative" 
                      placeholder="Ingrese su dirección" 
                      value="{{ old('addres',$user->addres) }}"
                      >
                  </div>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
 

@endsection

@section('scripts')

  
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
      

    <script>

      const fileInput = document.querySelector('#file');

      fileInput.addEventListener("change", (e) => {
        // Creamos el objeto de la clase FileReader
        let reader = new FileReader();
      
        // Leemos el archivo subido y se lo pasamos a nuestro fileReader
        fileSelected = e.target.files[0];
        reader.readAsDataURL(fileSelected);
      
        // Validamos que sea una imagen
        if (!/\.(jpg|png|jpeg)$/i.test(fileSelected.name)) {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "Debe seleccionar una imagen",
          });
          fileInput.value = "";
          return;
        }
      
        // Le decimos que cuando este listo ejecute el código interno
        reader.onload = function () {
          let preview = document.querySelector("#preview"),
            imagePre = document.createElement("img");
      
          imagePre.src = reader.result;
          //imagePre.style.borderRadius = "50%";
          imagePre.classList.add("rounded-circle");
          preview.innerHTML = "";
          preview.append(imagePre);
        };
      });
      

    </script>
@endsection




  
  
 
  
  
  
  
  
