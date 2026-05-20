async function obtener () {
    const datos = await fetch('http://localhost:8000/api/compras')
    console.log(await datos.json())
}

obtener()