@extends('Dashboard.main')
@section('contenido')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold m-0">Editar Compra</h2>
    <a href="{{ route('compras.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-1"></i> Volver
    </a>
</div>

<div class="table-card p-4">
    <form action="{{ route('compras.update', $compra) }}" method="POST">
        @csrf @method('PUT')

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label fw-semibold">Usuario <span class="text-danger">*</span></label>
                <select name="user_id" class="form-select @error('user_id') is-invalid @enderror">
                    <option value="">-- Seleccionar usuario --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}"
                            {{ old('user_id', $compra->user_id) == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label fw-semibold">Monto total <span class="text-danger">*</span></label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" name="amount" value="{{ old('amount', $compra->amount) }}" min="1"
                        class="form-control @error('amount') is-invalid @enderror">
                </div>
                @error('amount')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mt-4 d-flex gap-2">
            <button type="submit" class="btn btn-warning text-white">
                <i class="fas fa-save me-1"></i> Actualizar Compra
            </button>
            <a href="{{ route('compras.index') }}" class="btn btn-outline-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
