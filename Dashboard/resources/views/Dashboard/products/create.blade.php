@extends('Dashboard.main')
@section('contenido')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold m-0">Nuevo Producto</h2>
    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-1"></i> Volver
    </a>
</div>

<div class="table-card p-4">
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label fw-semibold">Nombre <span class="text-danger">*</span></label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="form-control @error('name') is-invalid @enderror"
                    placeholder="Nombre del producto">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-3">
                <label class="form-label fw-semibold">Precio <span class="text-danger">*</span></label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" name="price" value="{{ old('price') }}" step="0.01" min="0.01"
                        class="form-control @error('price') is-invalid @enderror"
                        placeholder="0.00">
                </div>
                @error('price')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-3">
                <label class="form-label fw-semibold">Stock <span class="text-danger">*</span></label>
                <input type="number" name="stock" value="{{ old('stock') }}" min="0"
                    class="form-control @error('stock') is-invalid @enderror"
                    placeholder="0">
                @error('stock')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold">Usuario / Vendedor <span class="text-danger">*</span></label>
                <select name="user_id" class="form-select @error('user_id') is-invalid @enderror">
                    <option value="">-- Seleccionar usuario --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold">Imagen</label>
                <input type="file" name="Img" accept="image/*"
                    class="form-control @error('Img') is-invalid @enderror">
                @error('Img')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <label class="form-label fw-semibold">Descripción <span class="text-danger">*</span></label>
                <textarea name="description" rows="4"
                    class="form-control @error('description') is-invalid @enderror"
                    placeholder="Descripción del producto...">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mt-4 d-flex gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-1"></i> Guardar Producto
            </button>
            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
