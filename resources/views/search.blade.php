<form action="{{ route('search') }}" method="GET" class="search-form position-relative me-2">
    <div class="input-group">
        <input 
            type="text" 
            class="form-control form-control-sm rounded-pill pe-4" 
            name="query" 
            placeholder="Search products..." 
            value="{{ request('query') }}"
            aria-label="Search"
            style="min-width: 200px;">
        <button 
            type="submit" 
            class="btn btn-sm position-absolute end-0 top-0 bottom-0 text-primary bg-transparent border-0"
            style="z-index: 5;">
            <i class="fas fa-search"></i>
        </button>
    </div>
</form>