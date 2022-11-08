if(window.location.href.split('?').includes('ok=true')) {
    Swal.fire({
        icon: 'success',
        title: 'Ok',
        text: 'Operación Exitosa',
    })
} else if(window.location.href.split('?').includes('ok=false')) {
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: "Error al procesar la solicitud",
    });
}