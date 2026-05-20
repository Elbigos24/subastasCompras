import { useEffect, useState } from "react";
import Products from "../layouts/Products"
import axios from "axios";


export default function Home() {
    const [data, setData] = useState([]);
    const API_URL = import.meta.env.VITE_API_URL;
    useEffect(() => {
        getData();
    }, [])
    const getData =async () => {
        await axios.get(API_URL+'/products').then((res:any) => {
            console.log(res.data);
            setData(res.data.data);
        }).catch((err:any) => {
            console.log(err);
        })

    }
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

                           {
                                data.map((item:any) =><Products item={item} key={item.id}/>) 
                           }
                            
                        



                    </div >
                </div >
            </main >
        </>
    )
}