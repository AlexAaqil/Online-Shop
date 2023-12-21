<div class="products">
    <div class="products_wrapper">
        @foreach($products as $product)
        <div class="product searchable">
            <div class="image">
                <img src="{{ $product->getFirstImage() }}" alt="{{ $product->title }}">
            </div>
            <div class="details">
                <div class="text">
                    <p>{{ $product->title }}</p>
                    <p class="price">{{ $product->price }}</p>
                </div>

                <div class="cart">
                    <i class="fas fa-shopping-cart"></i>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
