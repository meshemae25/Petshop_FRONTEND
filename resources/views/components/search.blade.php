<form action="{{ route('search') }}" method="GET" class="d-flex align-items-center position-relative">
    <input 
        type="text" 
        name="query" 
        placeholder="Search products..." 
        value="{{ request('query') }}" 
        class="form-control border-0 bg-light rounded-pill ps-4 pe-5" 
        style="height: 40px; width: 450px;"
    >
    <button type="submit" class="btn position-absolute end-0 bg-transparent border-0" style="top: 50%; transform: translateY(-50%);">
        <i class="fas fa-search text-secondary"></i>
    </button>
</form>
