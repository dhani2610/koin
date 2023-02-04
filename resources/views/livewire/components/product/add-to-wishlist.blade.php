<div class="mr-30">
    @if ($isExists == 1)
    <span wire:click="remove({{ $product_id }})" style="background: #fff url('http://127.0.0.1:8000/frontend/assets/imgs/template/icons/wishlist-hover.svg') no-repeat center;" wire:click="add({{ $product_id }})" class="btn btn-wishlist mr-5 opacity-100 transform-none"></span>
    @else
    <span  wire:click="add({{ $product_id }})" class="btn btn-wishlist mr-5 opacity-100 transform-none"></span>
    @endif
    <span class="font-md color-gray-900">Add to Wish list</span>
</div> 