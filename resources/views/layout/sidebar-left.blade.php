<div class="card overflow-hidden" style="position: sticky; top:10px;">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="{{ (Route::is('index'))? 'text-white bg-primary rounded': '' }} nav-link" href="{{route('index')}}">
                    <span>Home</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span>Explore</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span>Feed</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-modal="exampleModal" data-bs-target="#termsModal">
                    <span>Terms</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span>Support</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{(Route::is('terms'))?'text-white bg-primary rounded': ''}}" href="{{route('terms')}}">
                    <span>Terms</span></a>
            </li>
        </ul>
    </div>
    <div class="card-footer text-center py-2">
        <a class="btn btn-link btn-sm" href="{{route('users.profile')}}">View Profile </a>
    </div>
</div>

<div class="modal fade"  id="termsModal" role="dialog" aria-hidden="true">
   <div class=" modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content p-3">
            <h1 class="text-xl">Terms</h1>
            <hr>
            <div class="modal-body">
                <p>
                    If you do not have a consistent goal in life , you can not live it in a consistent way. - Marcus Aurelius 
                </p>
                <button class="btn btn-primary mt-3" data-bs-dismiss="modal">cancel</button>
            </div>
        </div>
   </div>
</div>