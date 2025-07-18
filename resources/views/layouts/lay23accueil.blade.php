@extends('layouts.layout23')
@section('title', 'Accueil2')

@section('header')
 @include('front.header23')
@endsection 

@section('footer')
 @include('front.footer23')
@endsection

@section('content')
<!-- ***************** main content ***************** -->
    <section id="intro">
        <div style="width: 50%;">
            <h1>Best Clothing Quality</h1>   
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Debitis porro quam fugiat accusantium ab velit tenetur perspiciatis autem, ipsa obcaecati at blanditiis? Unde, consectetur itaque nemo modi consequuntur obcaecati accusantium?</p>
            <a onclick="hideNav()">Become a member</a>
        </div>

        <video controls>
            <source src="{{asset('Dsite/video/intro-video.mp4')}}">
        </video>
    </section>
    

    <!-- ***************** Category ***************** 
    <nav id="nav-cat">
        <a>Suit</a>
        <a>Shirt</a>
        <a>Dress</a>
        <a>Shoes</a>
    </nav>
    -->
    
    <!-- ***************** Product card ***************** -->
    <div class="product-nav">
        <h3>Suits</h3>
        <a href="suits.html">View all suits</a>
    </div>
    <main id="products-intro">
        <div class="product-card">
            <div class="review-con"><p>Reviews 4.8⭐</p></div>
            <img src="{{asset('Dsite/image/suit-1.png')}}" class="product-img">
            <div style="padding:20px 25px">
                <h3>Product 1</h3>
                <p>This is just a simple description for our product.</p>
                <a href="">View Product</a>
            </div>
        </div>
    
        <div class="product-card">
            <img src="{{asset('Dsite/image/suit-2.png')}}" class="product-img">
            <div style="padding:20px 25px">
                <h3>Product 2</h3>
                <p>This is just a simple description for our product.</p>
                <a href="">View Product</a>
            </div>
        </div>
    
        <div class="product-card">
            <img src="{{asset('Dsite/image/suit-3.png')}}" class="product-img">
            <div style="padding:20px 25px">
                <h3>Product 3</h3>
                <p>This is just a simple description for our product.</p>
                <a href="">View Product</a>
            </div>
        </div>
    
        <div class="product-card">
            <img src="{{asset('Dsite/image/suit-4.png')}}" class="product-img">
            <div style="padding:20px 25px">
                <h3>Product 4</h3>
                <p>This is just a simple description for our product.</p>
                <a href="">View Product</a>
            </div>
        </div>
    </main>



@endsection