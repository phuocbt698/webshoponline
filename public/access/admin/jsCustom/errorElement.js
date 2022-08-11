function setError(nameTag = [], errors = [] ){
    nameTag.forEach(element => {
        if(errors[element]){         
            if(document.getElementById(element)){
                document.getElementById(element).classList.add('is-invalid');
            }
            document.getElementById('error'+element[0].toUpperCase() + element.substring(1)).innerHTML = errors[element];
        }
    });
}

function removeError(nameTag = []){
    nameTag.forEach(element => {
        document.getElementById(element).classList.remove('is-invalid');
        console.log($('#' + element).val);
        document.getElementById('error'+element[0].toUpperCase() + element.substring(1)).innerHTML = '';
    });
}