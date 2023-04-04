<!-- 1st tab start -->
<div class="tab-pane fade show active" id="tab-product--all">
    <div class="row">
        @foreach ($products as $product)
            @include('parts.product_thumb')
        @endforeach
    </div>
</div>
<!-- 1st tab end -->
<!-- 2nd tab start -->
@foreach ($categories as $category)
<div class="tab-pane fade" id="tab-product--{{ $category->id }}">
    @php
        $cat_wise_pro = App\Models\Product::where('category_id', $category->id)->get();
    @endphp
    <div class="row">
        @forelse ($cat_wise_pro as $product)
            @include('parts.product_thumb')
        @empty
            <div class="alert alert-dark">No Product</div>
        @endforelse
    </div>
</div>
@endforeach
<!-- 2nd tab end -->

