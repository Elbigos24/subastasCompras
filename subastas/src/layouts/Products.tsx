interface Props{
    item:any
}

export default function Products({ item }: Props) {
    const url_assets = import.meta.env.VITE_API_ASSETS;
    return (
        <>
            <div className="col-md-4">
                {/* Enlace envolvente para redirigir a la nueva ventana */}
                <a href={"/Detalles/"+item.slug} style={{ textDecoration: 'none', color: 'inherit' }}>
                    <div className="card border-0 bg-transparent h-100">
                        <div className="ratio ratio-4x3 bg-light overflow-hidden" style={{ borderRadius: '4px' }}>
                            <img src={`${url_assets}/images/${item.Img}`}
                                alt={item.name}
                                className="img-fluid object-fit-cover"
                                style={{ mixBlendMode: 'multiply' }}>
                            </img>
                        </div>
                        <div className="pt-3">
                            <div className="d-flex justify-content-between align-items-baseline">
                                <h3 className="h6 mb-1 fw-bold text-dark" style={{ fontSize: '1rem' }}>{item.name}</h3>
                                <span className="badge bg-dark rounded-0 fw-normal" style={{ fontSize: '0.75rem' }}>Activa</span>
                            </div>
                            <p className="text-muted small mb-2" style={{ fontSize: '0.85rem', color: '#707070' }}>{item.description}</p>
                            <div className="d-flex justify-content-between align-items-center border-top pt-2 mt-1">
                                <span className="small text-uppercase tracking-wider text-muted" style={{ fontSize: '0.75rem', letterSpacing: '0.05em' }}>Subasta Actual</span>
                                <span className="fw-bold text-dark" style={{ fontSize: '1.1rem' }}>${item.price}  MEX</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </>
    )
}