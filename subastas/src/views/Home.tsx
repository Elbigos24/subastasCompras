export default function Home() {

    return (
        <>
            {/*<!-- Contenido Principal: Sección de Subastas Minimalista -->*/}
            <main className="py-5">
                <div className="container">
                    <div className="row justify-content-center text-center mb-5">
                        <div className="col-lg-8">
                            <h1 className="display-4 fw-extrabold mb-3" style={{ fontWeight: 800, letterSpacing: '-0.03em', color: '#1a1a1a' }}>
                                Subastas exclusivas sin ruido.
                            </h1>
                            <p className="lead text-muted mx-auto" style={{ maxWidth: '600px', fontSize: '1.15rem', color: '#707070' }}>
                                Piezas icónicas y objetos de colección seleccionados bajo una estética esencial. Pujas transparentes, diseño puro.
                            </p>
                        </div>
                    </div>

                    {/*<!-- Cuadrícula de Productos en Subasta -->*/}
                    <div className="row g-4 justify-content-center">

                            {/*<!-- Producto 1 -->*/}
                            <div className="col-md-4">
                                <div className="card border-0 bg-transparent h-100">
                                    <div className="ratio ratio-4x3 bg-light overflow-hidden" style={{ borderRadius: '4px' }}>
                                        <img src="https://images.unsplash.com/photo-1516035069371-29a1b244cc32?auto=format&fit=crop&w=600&q=80"
                                            alt="Leica M6"
                                            className="img-fluid object-fit-cover"
                                            style={{ mixBlendMode: 'multiply' }}>
                                        </img>
                                    </div>
                                    <div className="pt-3">
                                        <div className="d-flex justify-content-between align-items-baseline">
                                            <h3 className="h6 mb-1 fw-bold text-dark" style={{ fontSize: '1rem' }}>001. Leica M6 Cámara</h3>
                                            <span className="badge bg-dark rounded-0 fw-normal" style={{ fontSize: '0.75rem' }}>Activa</span>
                                        </div>
                                        <p className="text-muted small mb-2" style={{ fontSize: '0.85rem', color: '#707070' }}>Edición clásica / Conservación 9.5/10</p>
                                        <div className="d-flex justify-content-between align-items-center border-top pt-2 mt-1">
                                            <span className="small text-uppercase tracking-wider text-muted" style={{ fontSize: '0.75rem', letterSpacing: '0.05em' }}>Subasta Actual</span>
                                            <span className="fw-bold text-dark" style={{ fontSize: '1.1rem' }}>$2,100 USD</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        

                                {/*<!-- Producto 2 -->*/}
                                <div className="col-md-4">
                                    <div className="card border-0 bg-transparent h-100">
                                        <div className="ratio ratio-4x3 bg-light overflow-hidden" style={{ borderRadius: '4px' }}>
                                            <img src="https://images.unsplash.com/photo-1612196808214-b8e1d6145a8c?auto=format&fit=crop&w=600&q=80"
                                                alt="Set de Jarrones"
                                                className="img-fluid object-fit-cover"
                                                style={{ mixBlendMode: 'multiply' }}>
                                            </img>
                                        </div>
                                        <div className="pt-3">
                                            <div className="d-flex justify-content-between align-items-baseline">
                                                <h3 className="h6 mb-1 fw-bold text-dark" style={{ fontSize: '1rem' }}>002. Set de Jarrones 'Aria'</h3>
                                                <span className="badge bg-dark rounded-0 fw-normal" style={{ fontSize: '0.75rem' }}>Activa</span>
                                            </div>
                                            <p className="text-muted small mb-2" style={{ fontSize: '0.85rem', color: '#707070' }}>Cerámica artesanal / Acabado mate</p>
                                            <div className="d-flex justify-content-between align-items-center border-top pt-2 mt-1">
                                                <span className="small text-uppercase tracking-wider text-muted" style={{ fontSize: '0.75rem', letterSpacing: '0.05em' }}>Subasta Actual</span>
                                            <span className="fw-bold text-dark" style={{ fontSize: '1.1rem' }}>$850 USD</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {/*<!-- Producto 3 -->*/}
                            <div className="col-md-4">
                                <div className="card border-0 bg-transparent h-100">
                                    <div className="ratio ratio-4x3 bg-light overflow-hidden" style={{ borderRadius: '4px' }}>
                                        <img src="https://images.unsplash.com/photo-1524592094714-0f0654e20314?auto=format&fit=crop&w=600&q=80"
                                            alt="Reloj Minimalista"
                                            className="img-fluid object-fit-cover"
                                            style={{ mixBlendMode: 'multiply' }}>
                                        </img>
                                    </div>
                                    <div className="pt-3">
                                        <div className="d-flex justify-content-between align-items-baseline">
                                            <h3 className="h6 mb-1 fw-bold text-dark" style={{ fontSize: '1rem' }}>003. Reloj de Mano 'Luna'</h3>
                                            <span className="badge bg-dark rounded-0 fw-normal" style={{ fontSize: '0.75rem' }}>Últimos minutos</span>
                                        </div>
                                        <p className="text-muted small mb-2" style={{ fontSize: '0.85rem', color: '#707070' }}>Mecanismo automático / Correa de piel</p>
                                        <div className="d-flex justify-content-between align-items-center border-top pt-2 mt-1">
                                            <span className="small text-uppercase tracking-wider text-muted" style={{ fontSize: '0.75rem', letterSpacing: '0.05em' }}>Subasta Actual</span>
                                        <span className="fw-bold text-dark" style={{ fontSize: '1.1rem', color: '#d9534f' }}>$1,400 USD</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div >
                </div >
            </main >
        </>
    )
}