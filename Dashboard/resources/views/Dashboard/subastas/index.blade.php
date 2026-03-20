@extends('Dashboard.main')
@section('contenido')

@include('Dashboard.partials.alerts')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold m-0">Subastas</h2>
    <a href="{{ route('subastas.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Nueva Subasta
    </a>
</div>

<div class="table-card">
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Producto</th>
                    <th>Inicio</th>
                    <th>Fin</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $estados = [0 => ['label'=>'Pendiente','class'=>'bg-warning text-dark'],
                                1 => ['label'=>'Activa','class'=>'bg-success'],
                                2 => ['label'=>'Finalizada','class'=>'bg-secondary']];
                @endphp
                @forelse($subastas as $subasta)
                <tr>
                    <td>{{ $subasta->id }}</td>
                    <td><strong>{{ $subasta->product->name ?? 'N/A' }}</strong></td>
                    <td>{{ \Carbon\Carbon::parse($subasta->start_time)->format('d/m/Y H:i') }}</td>
                    <td>{{ \Carbon\Carbon::parse($subasta->end_time)->format('d/m/Y H:i') }}</td>
                    <td>
                        <span class="badge {{ $estados[$subasta->status]['class'] }}">
                            {{ $estados[$subasta->status]['label'] }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('subastas.show', $subasta) }}" class="btn btn-sm btn-info text-white">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('subastas.edit', $subasta) }}" class="btn btn-sm btn-warning text-white">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('subastas.destroy', $subasta) }}" method="POST" class="d-inline form-delete">
                            @csrf @method('DELETE')
                            <button type="button" class="btn btn-sm btn-danger btn-eliminar">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted py-4">No hay subastas registradas.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-3">{{ $subastas->links() }}</div>
</div>

<script>
document.querySelectorAll('.btn-eliminar').forEach(btn => {
    btn.addEventListener('click', function () {
        const form = this.closest('.form-delete');
        Swal.fire({
            title: '¿Eliminar subasta?',
            text: 'Se eliminarán también las pujas asociadas.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar',
        }).then(result => { if (result.isConfirmed) form.submit(); });
    });
});
</script>
@endsection
