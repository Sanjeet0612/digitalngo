@foreach($userlist as $userlistVal)
                        <div class="col-xxl-3 col-md-6 user-grid-card   ">
                            <div class="position-relative border radius-16 overflow-hidden">
                                <?php
                                if(empty($userlistVal->bg_img)){
                                    ?> <img src="{{asset('assets/images/user-grid/NGOBanner.png') }}" alt="" class="w-100 object-fit-cover"> <?php
                                }else{
                                    ?> <img src="{{asset('storage/'.$userlistVal->bg_img)}}" alt="" class="w-100 object-fit-cover" style="height:89px;"> <?php
                                }
                                ?>
                                @php $userId = auth()->id(); @endphp
                                @if($userId==$userlistVal->id)
                                <div class="dropdown position-absolute top-0 end-0 me-16 mt-16">
                                    <button type="button" data-bs-toggle="dropdown" aria-expanded="false" class="bg-white-gradient-light w-32-px h-32-px radius-8 border border-light-white d-flex justify-content-center align-items-center text-white">
                                        <iconify-icon icon="entypo:dots-three-vertical" class="icon "></iconify-icon>
                                    </button>
                                        <ul class="dropdown-menu p-12 border bg-base shadow">
                                        <li>
                                            <a class="dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-10"  href="{{url('/')}}/users/my-profile">
                                                Edit
                                            </a>
                                        </li>
                                        </ul>
                                        <!--<li>
                                            <button type="button" class="delete-btn dropdown-item px-16 py-8 rounded text-secondary-light bg-hover-danger-100 text-hover-danger-600 d-flex align-items-center gap-10">
                                                Delete
                                            </button>
                                        </li>-->
                                </div>
                                 @endif
                                <div class="ps-16 pb-16 pe-16 text-center mt--50">
                                    <?php
                                    if(empty($userlistVal->profile_img)){
                                        ?> <img src="{{url('/')}}/assets/images/user-list/user.png" alt="" class="border br-white border-width-2-px w-100-px h-100-px rounded-circle object-fit-cover"><?php
                                    }else{
                                        ?> <img src="{{asset('storage/'.$userlistVal->profile_img)}}" alt="" class="border br-white border-width-2-px w-100-px h-100-px rounded-circle object-fit-cover" ><?php
                                    }
                                    ?>
                                    <h6 class="text-lg mb-0 mt-4">{{$userlistVal->name}}</h6>
                                    <span class="text-secondary-light mb-16" style="font-size:13px;">{{$userlistVal->email}}</span>

                                    <div class="center-border position-relative bg-danger-gradient-light radius-8 p-12 d-flex align-items-center gap-4">
                                        <div class="text-center w-50">
                                            <h6 class="text-md mb-0">Phone</h6>
                                            <span class="text-secondary-light text-sm mb-0">{{$userlistVal->phone}}</span>
                                        </div>
                                        <div class="text-center w-50">
                                            <h6 class="text-md mb-0">Refrer Code</h6>
                                            <span class="text-secondary-light text-sm mb-0">{{$userlistVal->refer_code}}</span>
                                        </div>
                                    </div>
                                    <form  action="{{url('/')}}/users/view-profile" method="post" class="bg-primary-50 text-primary-600 bg-hover-primary-600 hover-text-white p-10 text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center justify-content-center mt-16 fw-medium gap-2 w-100">
                                        @csrf
                                        <input type="hidden" name="uid" value="{{base64_encode($userlistVal->id)}}">
                                        <button type="submit">View Profile</button>
                                        <iconify-icon icon="solar:alt-arrow-right-linear" class="icon text-xl line-height-1"></iconify-icon>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach


                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mt-24">
                        <span>
                            Showing {{ $userlist->firstItem() }} to {{ $userlist->lastItem() }} of {{ $userlist->total() }} entries
                        </span>

                        <ul class="pagination d-flex flex-wrap align-items-center gap-2 justify-content-center">

                            {{-- Previous --}}
                            <li class="page-item {{ $userlist->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                                href="{{ $userlist->previousPageUrl() }}">
                                    <iconify-icon icon="ep:d-arrow-left"></iconify-icon>
                                </a>
                            </li>

                            {{-- Page numbers --}}
                            @for ($i = 1; $i <= $userlist->lastPage(); $i++)
                                <li class="page-item">
                                    <a class="page-link {{ $userlist->currentPage() == $i ? 'bg-primary-600 text-white' : 'bg-neutral-200 text-secondary-light' }} fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                                    href="{{ $userlist->url($i) }}">
                                        {{ $i }}
                                    </a>
                                </li>
                            @endfor

                            {{-- Next --}}
                            <li class="page-item {{ $userlist->hasMorePages() ? '' : 'disabled' }}">
                                <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                                href="{{ $userlist->nextPageUrl() }}">
                                    <iconify-icon icon="ep:d-arrow-right"></iconify-icon>
                                </a>
                            </li>

                        </ul>
                    </div>