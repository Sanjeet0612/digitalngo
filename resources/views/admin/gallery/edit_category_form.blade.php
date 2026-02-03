@extends('admin.layout.layout')
@php
    $title='Edit Update Category';
    $subTitle = 'Edit Update Picture/Video Category';

@endphp

@section('content')

            <div class="card h-100 p-0 radius-12 overflow-hidden">
                <div class="card-body p-40">
                    <form action="{{route('admin.add_category')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-sm-6">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                                    Type<span class="text-danger-600">*</span>
                                </label>
                                <select name="gtype" class="form-control">
                                    <option value="">Select Type</option>
                                    <option value="picture">Picture</option>
                                    <option value="video">Video</option>
                                </select>
                                
                            </div>


                            <div id="category-wrapper">
                                <div class="row category-row align-items-end mb-3">
                                    <div class="col-sm-6">
                                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                                            Category Name <span class="text-danger-600">*</span>
                                        </label>
                                        <input type="text" name="cat_name[]" class="form-control radius-8" required>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                                            Status <span class="text-danger-600">*</span>
                                        </label>
                                        <select class="form-control radius-8 form-select" name="status[]">
                                            <option value="1">Active</option>
                                            <option value="0">Deactive</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-2 text-end">
                                        <button type="button" class="btn btn-success add-row">+</button>
                                    </div>
                                </div>

                            </div>

                            <div class="d-flex align-items-center justify-content-center gap-3 mt-24">
                                <button type="reset" class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-40 py-11 radius-8">
                                    Reset
                                </button>
                                <button type="submit" class="btn btn-primary border border-primary-600 text-md px-24 py-12 radius-8">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

@endsection

<script>
document.addEventListener('click', function (e) {
    // ➕ Add row
    if(e.target.classList.contains('add-row')) {
        let wrapper = document.getElementById('category-wrapper');
        let newRow = e.target.closest('.category-row').cloneNode(true);
        
        newRow.querySelector('input').value = '';
        newRow.querySelector('.add-row').classList.remove('btn-success', 'add-row');
        newRow.querySelector('button').classList.add('btn-danger', 'remove-row');
        newRow.querySelector('button').innerText = '−';

        wrapper.appendChild(newRow);
    }
    // ➖ Remove row
    if(e.target.classList.contains('remove-row')) {
        e.target.closest('.category-row').remove();
    }
});
</script>