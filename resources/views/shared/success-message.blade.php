@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <h3 class="">{{session('success')}}</h3>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif