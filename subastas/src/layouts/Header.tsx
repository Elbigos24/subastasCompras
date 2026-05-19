import { Link } from "react-router-dom"

export default function Header(){

    return(
        <>  
            <header className="py-4">
        <div className="container d-flex justify-content-between align-items-center">
            <Link to="/" className="navbar-brand text-dark text-decoration-none">ESSENCE.</Link>
            <nav className="nav">
                <Link to="/" className="nav-link active" id="nav-inicio">Inicio</Link>
                <Link to="/contacto" className="nav-link" id="nav-contacto">Contacto</Link>
                <Link to="/carrito" className="nav-link" id="nav-carrito">Carrito</Link>
            </nav>
        </div>
    </header>
        </>
    )
}