function deleteAutor(e){
    const id = e.target.dataset.id;

    if(!id){
        return;
    }

    window.axios.delete(`/autores/${id}`)
    .then(res =>{
        if(!res.data.error){
            window.location.href = '/autores';
        }
        else{
            alert('No se pudo eliminar');
        }
    })
    .catch(err => console.log(err));
}

const btnsEliminar = document.querySelectorAll(".btn-eliminar-autor");

btnsEliminar.forEach(btn => {
    btn.addEventListener("click", deleteAutor);
})