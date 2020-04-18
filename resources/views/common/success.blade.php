@if (session('success'))

    <div aria-live="polite" aria-atomic="true">
        <div class="toast success-toast">
            <div class="alert alert-success m-0">
                {{ session('success') }}
            </div>
        </div>
    </div>
    
@endif


