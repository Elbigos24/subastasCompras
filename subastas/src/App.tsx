

import './App.css'
import { BrowserRouter, Route, Routes } from 'react-router-dom'
import Layout from './layouts/Layout'
import Contacto from './views/contacto'
import Home from './views/Home'
import Carrito from './views/Carrito'

function App() {
  

  return (
    <>
      <BrowserRouter>
        <Routes>
          <Route element={<Layout />}>
            <Route path='/' element={<Home />} />
            <Route path='/contacto' element={<Contacto />} />
            <Route path='/carrito' element={<Carrito />} />
          </Route>
        </Routes>
      </BrowserRouter>
    </>
  )
}

export default App
