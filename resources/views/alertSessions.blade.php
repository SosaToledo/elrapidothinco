@if ($message = Session::get('success'))
        <div id="success-alert" class="alert alert-success alert-dimissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div id="success-alert" class="alert alert-danger alert-dimissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <p>{{ $message }}</p>
        </div>
    @endif