function deleteLibro(e){
    const id = e.target.dataset.id;

    if(!id){
        return;
    }

    window.axios.delete(`/Libros/${id}`)
    .then(res =>{
        if(!res.data.error){
            window.location.href = '/Libros';
        }
        else{
            alert('No se pudo eliminar');
        }
    })
    .catch(err => console.log(err));
}

const btnsEliminar = document.querySelectorAll(".btn-eliminar-libro");

btnsEliminar.forEach(btn => {
    btn.addEventListener("click", deleteLibro);
})