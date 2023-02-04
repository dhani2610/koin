<div>
    {{-- copas dari contact-create.blade --}}
   <form wire:submit.prevent="update">
    {{-- memberikan input Hidden utk mendapatkan ID yg dugunakan utk mengupdate--}}
    <input type="hidden" name="" wire:model="contactId"> 
       <div class="form-group">
           <div class="form-row">
               <div class="col">
                   {{-- jk sprt ini tdk realtime no.2 --}}
                   {{-- <input type="text" name="" id="" class="form-control" placeholder="Name" value="{{ $name }}"> --}}
                   <input wire:model="name" 
                   type="text" name="" id="" 
                   class="form-control @error('name') is-invalid @enderror"                         
                   placeholder="Name">
                   @error('name')
                       <strong>{{ $message }}</strong>
                   @enderror
               </div>
               <div class="col">
                   <input wire:model="phone" 
                   type="text" name="" id="" 
                   class="form-control @error('phone') is-invalid @enderror" 
                   placeholder="Phone">
                   @error('phone')
                       <strong>{{ $message }}</strong>
                   @enderror
               </div>
               <button type="submit" class="btn btn-sm btn-primary">Update</button>
           </div>
           {{-- utk mengetes value update --}}
           {{-- {{ $name }} --}}
       </div>
   </form>
</div>
