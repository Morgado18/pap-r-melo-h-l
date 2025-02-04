@extends('layouts.visit.main')

@section('pageTitle', 'Produtos')

@section('location1', 'Produtos')

@section('content')

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Produtos</h1>
              <p class="mb-0">
                Descubra uma ampla variedade de produtos disponíveis para compra! Navegue pelas categorias, encontre itens que atendem
                às suas necessidades, e conecte-se diretamente com produtores confiáveis.
              </p>
            </div>
          </div>
        </div>
      </div>

      {{-- <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Blog</li>
          </ol>
        </div>
      </nav> --}}

      @include('layouts.visit.naviagtion')

    </div><!-- End Page Title -->

    <!-- Blog Posts Section -->
    <section id="blog-posts" class="blog-posts section">

      <div class="container">
        <div class="row gy-4">

            <style>
                .post-img{
                    width: 200px; height: 250px; overflow: hidden;
                }
                .productImg{
                    width: 100%; height: 100%; object-fit: contain; transition: 0.5s;
                }
                .productImg:hover{
                    transform: scale(0.9)
                }
                #info_min_text{
                    font-size: 12px;
                }
                .product_name{
                    font-size: 15px;
                    margin-top: 0.3rem;
                    margin-bottom: 0.3rem;
                    color: #000;
                    font-weight: 500;
                }
                .product_price{
                    font-size: 14px;
                    color: gray;
                    font-weight: 100;
                }
                .product{
                    width: 250px;
                    overflow: hidden;
                }
                #inline{
                    display: flex;
                }
                .lado{
                    flex: 50%;
                    display: flex;
                    justify-content: center;
                    flex-direction: column;
                }
                .right{
                    display: flex;
                    justify-content: center;
                    align-items: flex-end;
                }
            </style>

          @foreach ($data['products'] as $product)

            <div class="col-lg-2 h-100 product">

                <a href="">
                    <div class="row">
                        <div class="col-12">
                            <div class="product_img">
                                <img src="{{ asset('storage/products/cenoura.jpeg') }}" alt="" class="productImg"> {{-- img-fluid --}}
                            </div>
                        </div>
                    </div>
                </a>

                <div class="border p-2 mt-2" id="inline">
                    <div class="lado">
                        <span class="product_name">
                            <span>{{ $product->name }}</span>
                        </span>
                        <p class="product_price">
                            <strong>{{ number_format($product->price, '2', ',', '.') }}Kzs</strong>
                        </p>
                    </div>
                    <div class="lado right">
                        {{-- <a href="#" class="text-muted">
                            <button class="btn border">
                                <i class="fa-solid fa-cart-plus text-success"></i>
                            </button>
                        </a> --}}
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="{{ $product->name }}">
                        <input type="hidden" name="price" value="{{ $product->price }}">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="btn border">
                            <i class="fa-solid fa-cart-plus text-success"></i>
                        </button>
                    </form>
                    </div>
                </div>


            </div>

          @endforeach


        </div>
      </div>

    </section><!-- /Blog Posts Section -->

    <!-- Blog Pagination Section -->
    <section id="blog-pagination" class="blog-pagination section">

      <div class="container">
        <div class="d-flex justify-content-center">
          <ul>
            <li><a href="#"><i class="bi bi-chevron-left"></i></a></li>
            <li><a href="#">1</a></li>
            <li><a href="#" class="active">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li>...</li>
            <li><a href="#">10</a></li>
            <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>

    </section><!-- /Blog Pagination Section -->

  </main>

    @session("success")

        <script>
            Swal.fire({
                title: '{{ session('success') }}',
                icon: 'success',
                width: 400,
                heightAuto: false,
                showConfirmButton: false,
                timer: 5000,
            });
        </script>

    @endsession

@endsection
