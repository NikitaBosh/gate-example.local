@if($errors->any())
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                @foreach($errors->all() as $errorText)
                    {{ $errorText }}
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif
@if(session('success'))
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session()->get('success') }}
            </div>
        </div>
    </div>
</div>
@endif
