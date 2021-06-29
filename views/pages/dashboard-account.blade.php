        @extends('layouts.dashboard')

        @section('title')
        Store Account     
        @endsection

        @section('content')

        <!-- Page Content -->
       <div
                        class="section-content section-dashboard-home"
                        data-aos="fade-up"
                    >
                        <div class="container-fluid">
                            <div class="dashboard-heading">
                                <h2 class="dashboard-title">Akun Saya</h2>
                                <p class="dashboard-subtitle">
                                    Perbarui profil Anda saat ini
                                </p>
                            </div>
                            <div class="dashboard-content">
                                <div class="row">
                                    <div class="col-12">
                                        <form action="{{ route('dashboard-settings-redirect', 'dashboard-settings-account') }}" method="POST" enctype="multipart/form-data" id="locations">
                                            @csrf 
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row mb-2">
                                                        <div class="col-md-6">
                                                            <div
                                                                class="form-group"
                                                            >
                                                                <label
                                                                    for="name"
                                                                    >Nama
                                                                    Anda</label
                                                                >
                                                                <input
                                                                    type="text"
                                                                    class="form-control"
                                                                    id="name"
                                                                    aria-describedby="emailHelp"
                                                                    name="namaalamat_dua"
                                                                    value="{{ $user->nama }}"
                                                                />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div
                                                                class="form-group"
                                                            >
                                                                <label
                                                                    for="email"
                                                                    >Email
                                                                    Anda</label
                                                                >
                                                                <input
                                                                    type="email"
                                                                    class="form-control"
                                                                    id="email"
                                                                    aria-describedby="emailHelp"
                                                                    name="email"
                                                                    value="{{ $user->email }}"
                                                                />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div
                                                                class="form-group"
                                                            >
                                                                <label
                                                                    for="alamat_satu"
                                                                    >Alamat
                                                                    1</label
                                                                >
                                                                <input
                                                                    type="text"
                                                                    class="form-control"
                                                                    id="alamat_satu"
                                                                    aria-describedby="emailHelp"
                                                                    name="alamat_satu"
                                                                    value="{{ $user->alamat_satu }}"
                                                                />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div
                                                                class="form-group"
                                                            >
                                                                <label
                                                                    for="alamat_dua"
                                                                    >Alamat
                                                                    2</label
                                                                >
                                                                <input
                                                                    type="text"
                                                                    class="form-control"
                                                                    id="alamat_dua"
                                                                    aria-describedby="emailHelp"
                                                                    name="alamat_dua"
                                                                    value="{{ $user->alamat_dua }}"
                                                                />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                          <div class="form-group">
                                                            <label for="province">Provinsi</label>
                                                            <select name="provinces_id" id="provinces_id" class="form-control" v-if="provinces" v-model="provinces_id">
                                                              <option v-for="province in provinces" :value="province.id">@{{ province.name }}</option>
                                                            </select>
                                                            <select v-else class="form-control"></select>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                          <div class="form-group">
                                                            <label for="regencies_id">Kota</label>
                                                            <select name="regencies_id" id="regencies_id" class="form-control" v-if="regencies" v-model="regencies_id">
                                                              <option v-for="regencie in regencies" :value="regencie.id">@{{ regencie.name }}</option>
                                                            </select>
                                                            <select v-else class="form-control"></select>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div
                                                                class="form-group"
                                                            >
                                                                <label
                                                                    for="zip_code"
                                                                    >Kode
                                                                    Pos</label
                                                                >
                                                                <input
                                                                    type="text"
                                                                    class="form-control"
                                                                    id="zip_code"
                                                                    name="zip_code"
                                                                    value="{{ $user->zip_code }}"
                                                                />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div
                                                                class="form-group"
                                                            >
                                                                <label
                                                                    for="country"
                                                                    >Negara</label
                                                                >
                                                                <input
                                                                    type="text"
                                                                    class="form-control"
                                                                    id="country"
                                                                    name="country"
                                                                    value="{{ $user->country }}"
                                                                />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div
                                                                class="form-group"
                                                            >
                                                                <label
                                                                    for="no_handphone"
                                                                    >No
                                                                    Handphone</label
                                                                >
                                                                <input
                                                                    type="text"
                                                                    class="form-control"
                                                                    id="no_handphone"
                                                                    name="no_handphone"
                                                                    value="{{ $user->no_handphone }}"
                                                                />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div
                                                            class="col text-right"
                                                        >
                                                            <button
                                                                type="submit"
                                                                class="btn btn-success px-5"
                                                            >
                                                                Simpan
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
      var locations = new Vue({
        el: "#locations",
        mounted() {
          AOS.init();
          this.getProvincesData()
        },
        data: {
          provinces:null,
          regencies:null,
          provinces_id:null,
          regencies_id:null,
        },
        methods: {
          getProvincesData() {
            var self = this;
            axios.get('{{ route('api-provinces') }}')
              .then(function(response){
                self.provinces = response.data;
              });
          },

          getRegenciesData(){
            var self = this;
            axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
              .then(function(response){
                self.regencies = response.data;
              });
          }
        },
        watch: {
          provinces_id: function(val, oldVal){
            this.regencies_id=null;
            this.getRegenciesData();
          }
        },
      });
    </script>     
  @endpush