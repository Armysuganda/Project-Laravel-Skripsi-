        @extends('layouts.app')

        @section('title')
        Store Cart Page
            
        @endsection

        @section('content')

            <!-- Page Content -->
    <div class="page-content page-cart">
      <section
        class="store-breadcrumbs"
        data-aos="fade-down"
        data-aos-delay="100"
      >
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Keranjang
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <section class="store-cart">
        <div class="container">
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-12 table-responsive">
              <table
                class="table table-borderless table-cart"
                aria-describedby="Cart"
              >
                <thead>
                  <tr>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama &amp; Toko</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Menu</th>
                  </tr>
                </thead>
                <tbody>
                  @php $totalPrice = 0 @endphp
                  @forelse ($carts as $cart)
                    <tr>
                    <td style="width: 25%">
                      @if ($cart->product->galleries)
                        <img
                        src="{{ Storage::url($cart->product->galleries->first()->photo) }}"
                        alt=""
                        class="cart-image"
                      />
                      @endif
                    </td>
                    <td style="width: 35%">
                      <div class="product-title">{{ $cart->product->nama }}</div>
                      <div class="product-subtitle">
                        by {{ $cart->product->user->nama_toko }}
                      </div>
                    </td>
                    <td style="width: 35%">
                      <div class="product-title">Rp{{ number_format($cart->product->harga) }}</div>
                      <div class="product-subtitle">IDR</div>
                    </td>
                    <td style="width: 20%">
                      <form action="{{ route('cart-delete', $cart->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                         
                        <button type="submit" class="btn btn-remove-cart"> Hapus </button>
                      </form>
                    </td>
                  </tr>
                  @php $totalPrice += $cart->product->harga @endphp 
                  @empty
                     <tr class="text-center">
                       <td colspan="4">Tidak ada cart</td>
                     </tr>   
                  @endforelse

                </tbody>
              </table>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="150">
            <div class="col-12">
              <hr />
            </div>
            <div class="col-12">
              <h2 class="mb-4">Detail Pengiriman</h2>
            </div>
          </div>
          <form action="{{ route('checkout') }}" id="locations" enctype="multipart/form-data" method="POST">
            @csrf 
            <input type="hidden" name="total_harga" value="{{ $totalPrice }}">
            <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
            <div class="col-md-6">
              <div class="form-group">
                <label for="alamat_satu">Alamat 1</label>
                <input
                  type="text"
                  class="form-control"
                  id="alamat_satu"
                  aria-describedby="emailHelp"
                  name="alamat_satu"
                  value=""
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="alamat_dua">Alamat 2</label>
                <input
                  type="text"
                  class="form-control"
                  id="alamat_dua"
                  aria-describedby="emailHelp"
                  name="alamat_dua"
                  value=""
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
              <div class="form-group">
                <label for="zip_code">Kode Pos</label>
                <input
                  type="text"
                  class="form-control"
                  id="zip_code"
                  name="zip_code"
                  value=""
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="country">Negara</label>
                <input
                  type="text"
                  class="form-control"
                  id="country"
                  name="country"
                  value=""
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="no_handphone">No Handphone</label>
                <input
                  type="text"
                  class="form-control"
                  id="no_handphone"
                  name="no_handphone"
                  value=""
                />
              </div>
            </div>
            
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-12">
              <hr />
            </div>
            <div class="col-12 mb-3">
              <h2>Informasi Penyewaan</h2>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="tgl-sewa">Tanggal Sewa</label>
                <input type="date" class="form-control" id="">
              </div>
            </div>
            
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="150">
            <div class="col-12">
              <hr />
            </div>
            <div class="col-12">
              <h2>Informasi Pembayaran</h2>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="200">
            
            <div class="col-4 col-md-2">
              <div class="product-title text-success">{{ number_format($totalPrice ?? 0) }}</div>
              <div class="product-subtitle">Total</div>
            </div>
            <div class="col-8 col-md-3">
              <button
                type="submit"
                class="btn btn-success mt-4 px-4 btn-block"
              >
                Sewa Sekarang
              </button>
            </div>
          </form>
          </div>
        </div>
      </section>
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
