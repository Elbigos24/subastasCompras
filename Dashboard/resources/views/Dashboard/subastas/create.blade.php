@extends('Dashboard.main')
@section('contenido')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold m-0">Nueva Subasta</h2>
    <a href="{{ route('subastas.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-1"></i> Volver
    </a>
</div>

<div class="table-card p-4">
    <form action="{{ route('subastas.store') }}" method="POST">
        @csrf

        <div class="row g-3">
            <div class="col-md-12">
                <label class="form-label fw-semibold">Producto <span class="text-danger">*</span></label>
                <select name="product_id" class="form-select @error('product_id') is-invalid @enderror">
                    <option value="">-- Seleccionar producto --</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                            {{ $product->name }} — ${{ number_format($product->price, 2) }}
                        </option>
                    @endforeach
                </select>
                @error('product_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold">Fecha y hora de inicio <span class="text-danger">*</span></label>
                <input type="datetime-local" name="start_time" value="{{ old('start_time') }}"
                    class="form-control @error('start_time') is-invalid @enderror">
                @error('start_time')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold">Fecha y hora de fin <span class="text-danger">*</span></label>
                <input type="datetime-local" name="end_time" value="{{ old('end_time') }}"
                    class="form-control @error('end_time') is-invalid @enderror">
                @error('end_time')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold">Estado <span class="text-danger">*</span></label>
                <select name="status" class="form-select @error('status') is-invalid @enderror">
                    <option value="">-- Seleccionar estado --</option>
                    <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>Pendiente</option>
                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Activa</option>
                    <option value="2" {{ old('status') == '2' ? 'selected' : '' }}>Finalizada</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mt-4 d-flex gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-1"></i> Guardar Subasta
            </button>
            <a href="{{ route('subastas.index') }}" class="btn btn-outline-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
