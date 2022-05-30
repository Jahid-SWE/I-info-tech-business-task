@if(session()->has('successMessage'))
    <div class="row">
        <div class="alert alert-success alert-dismissible" role="alert">
            <h5>{{ session('successMessage')}}</h5>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
@endif
@if(session()->has('warning'))
    <div class="row">
        <div class="alert alert-warning alert-dismissible" role="alert">
            <strong>{{ session('warning')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>

@endif
{{-- fade show--}}
