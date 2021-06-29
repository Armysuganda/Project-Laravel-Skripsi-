@extends('layouts.auth')

@section('content')

<div class="page-content page-auth mt-5" id="register">
      <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4">
              <h2>
                Memulai untuk Sewa Alat Pesta <br />
                dengan cara terbaru
              </h2>
              <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input id="nama" 
                        v-model="nama" 
                        type="text" 
                        class="form-control @error('nama') is-invalid @enderror" 
                        name="nama" 
                        value="{{ old('nama') }}" 
                        required 
                        autocomplete="nama" 
                        autofocus>
                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input id="email"  
                      v-model="email"
                      @change="checkForEmailAvailability()" 
                      type="email" 
                      class="form-control @error('email') is-invalid @enderror" 
                      :class="{ 'is-invalid' : this.email_unavailable }"
                      name="email" 
                      value="{{ old('email') }}" 
                      required 
                      autocomplete="email">
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label>Kata Sandi</label>
                  <input id="password" 
                        type="password" 
                        class="form-control @error('password') is-invalid @enderror" 
                        name="password" 
                        required autocomplete="new-password">
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label>Konfirmasi Kata Sandi</label>
                  <input id="password-confirmation" 
                        type="password" 
                        class="form-control @error('password_confirmation') is-invalid @enderror" 
                        name="password_confirmation" 
                        required autocomplete="new-password">
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label>Toko</label>
                  <p class="text-muted">Apakah anda juga ingin membuka toko?</p>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input
                      class="custom-control-input"
                      type="radio"
                      name="is_store_open"
                      id="openStoreTrue"
                      v-model="is_store_open"
                      :value="true"
                    />
                    <label for="openStoreTrue" class="custom-control-label">
                      Iya, boleh 
                    </label>
                  </div>
                  <div
                    class="custom-control custom-radio custom-control-inline">
                    <input
                      class="custom-control-input"
                      type="radio"
                      name="is_store_open"
                      id="openStoreFalse"
                      v-model="is_store_open"
                      :value="false"
                    />
                    <label for="openStoreFalse" class="custom-control-label">
                        Enggak, makasih
                    </label>
                  </div>
                </div>

                <div class="form-group" v-if="is_store_open">
                  <label>Nama Toko</label>
                  <input type="text"
                        v-model="nama_toko" 
                        id="nama_toko"
                        class="form-control @error('password_confirmation') is-invalid @enderror" 
                        name="nama_toko" 
                        required 
                        autocomplete 
                        autofocus> 
                    @error('nama_toko')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span> 
                    @enderror
                </div>
                 
                <div class="form-group" v-if="is_store_open">
                  <label>Kategori</label>
                  <select name="categories_id" class="form-control">
                      <option value="" disabled>Select Category</option>
                      @foreach ($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->nama }}</option>
                      @endforeach
                  </select>
                </div>
                <button type="submit" 
                        class="btn btn-success btn-block mt-4" 
                        :disabled="this.email_unavailable">
                  Daftar Sekarang
                </button>
                <a href="{{ route('login') }}" class="btn btn-signup btn-block mt-2">
                  Kembali ke Sign In
                </a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
      Vue.use(Toasted);

      var register = new Vue({
        el: "#register",
        mounted() {
          AOS.init();
          
        },
        methods: {
          checkForEmailAvailability: function() {
            var self = this;
            axios.get('{{ route('api-register-check') }}', {
              params: {
                email: this.email
              }
            })
            .then(function (response) {

              if(response.data == 'Available'){
                self.$toasted.show(
                    "Email anda tersedia! Silahkan lanjutkan daftar!",
                     {
                      position: "top-center",
                      className: "rounded",
                      duration: 1000,
                     }
                );
                self.email_unavailable = false;

              } else{
                self.$toasted.error(
                    "Maaf, tampaknya email sudah terdaftar pada sistem kami.",
                     {
                      position: "top-center",
                      className: "rounded",
                      duration: 1000,
                     }
                );
                self.email_unavailable = true;
              }
              // handle success
              console.log(response);
            });

          }

        },
        data() {
          return{
              nama: "",
              email: "",
              is_store_open: true,
              nama_toko: "",
              email_unavailable: false,
          }        
        },
      });
    </script>
    
@endpush