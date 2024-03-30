<div class="sidebar-user">
    {{-- <img
        src="assets/images/users/{{ Auth::user()->avatar }}"
        alt="{{ Auth::user()->name }}"
        class="rounded-circle img-thumbnail mb-1"
    /> --}}
    <h6 class="">
        @if(isset(Auth::user()->name))
            {{ Auth::user()->name }}
        @else
            Nama Pengguna Tidak Tersedia
        @endif
    </h6>
    
    <p class="online-icon text-dark">
        <i class="mdi mdi-record text-success"></i>online
    </p>
    <ul class="list-unstyled list-inline mb-0 mt-2">
   
 
        <li class="list-inline-item">
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-link text-danger" data-toggle="tooltip" data-placement="top" title="Logout" style="border: none">
                    <i class="dripicons-power" style="cursor: pointer"></i>
                </button>
            </form>
        </li>
        
    </ul>
</div>
