<header>
    <div class="topbar d-flex align-items-center">
        <nav class="gap-3 navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>

            <div class="position-relative search-bar d-lg-block d-none" data-bs-toggle="modal"
                data-bs-target="#SearchModal">
                <input class="px-5 form-control" disabled type="search" placeholder="Search">
                <span class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 fs-5"><i
                        class='bx bx-search'></i></span>
            </div>


            <div class="top-menu ms-auto">
                <ul class="gap-1 navbar-nav align-items-center">
                    <li class="nav-item mobile-search-icon d-flex d-lg-none" data-bs-toggle="modal"
                        data-bs-target="#SearchModal">
                        <a class="nav-link" href="avascript:;"><i class='bx bx-search'></i>
                        </a>
                    </li>
             


                    
                    <li class="nav-item dark-mode d-none d-sm-flex">
                        <a class="nav-link dark-mode-icon" href="javascript:;"><i class='bx bx-moon'></i>
                        </a>
                    </li>

                   
                    
                </ul>
            </div>




            @php
                $id = Auth::user()->id;
                $profileData = App\Models\User::find($id);
            @endphp

            <div class="px-3 user-box dropdown">
                <a class="gap-3 d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret"
                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    
                    <img src="{{ asset('upload/noimage.jpg') }}"
                        class="user-img" alt="user avatar">
                    <div class="user-info">
                        {{--  --}}
                        <p class="mb-0 user-name">{{ $profileData->name }}</p>
                        <p class="mb-0 designattion">{{ $profileData->email }}</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  
                    <li><a class="dropdown-item d-flex align-items-center" href="{{ route('merchant.logout') }}"><i
                                class="bx bx-log-out-circle"></i><span>Logout</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>



<script>
    function markNotificationReadAdmin(id) {
        fetch('/mark-notification-as-read/' + id, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({})
        })
        .then(response => response.text())  // Change to text to log the response
        .then(data => {
            
            try {
                const jsonData = JSON.parse(data);
                document.getElementById('notification-count').textContent = jsonData.count;
            } catch (error) {
                console.error('Error parsing JSON:', error);
            }
        })
        .catch(err => {
            console.log(err);
        });
    }
</script>

