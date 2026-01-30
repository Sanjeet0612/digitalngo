@extends('layout.layout')
@php
    $title='New Users';
    $subTitle = 'New Users';
    $script = '<script>
                        $(".delete-btn").on("click", function() {
                            $(this).closest(".user-grid-card").addClass("d-none")
                        });
                </script>';
@endphp

@section('content')

            <div class="card h-100 p-0 radius-12">
                <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
                    <div class="d-flex align-items-center flex-wrap gap-3">
                        <form class="navbar-search">
                            <input type="text" onkeyup="return searchUser(this.value);" class="bg-base h-40-px w-auto" name="search" placeholder="Search">
                            <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                        </form>
                    </div>
                    
                </div>
                <div class="card-body p-24">
                    <div class="row gy-4" id="userGrid">
                        @include('users.partials.user_grid', ['userlist' => $userlist])
                    </div>

                    

                    
                </div>
            </div>

@endsection

<script>
function searchUser(query) {
    // encode special characters
    query = encodeURIComponent(query);

    fetch("{{ route('users.list') }}?search=" + query, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.text())
    .then(html => {
        document.getElementById('userGrid').innerHTML = html;
    })
    .catch(error => console.error('Error:', error));
}
</script>
