function preview(e, idPreviewTag) {
    const preview = document.getElementById(idPreviewTag);
    const imageOld = document.getElementById('preview-image')
    const files = e.target.files;
    const file = files[0];
    const fileReader = new FileReader();
    if (imageOld) {
        $('#preview-image').remove();
        fileReader.readAsDataURL(file);
        fileReader.onload = function () {
            const src = fileReader.result;
            const tagImage = `<img src="${src}" alt="${file.name}" class="img-thumbnail preview-img" id = 'preview-image' />`
            preview.insertAdjacentHTML('beforeend', tagImage)
        }
    } else {
        fileReader.readAsDataURL(file);
        fileReader.onload = function () {
            const src = fileReader.result;
            const tagImage = `<img src="${src}" alt="${file.name}" class="img-thumbnail preview-img" id = 'preview-image' />`
            preview.insertAdjacentHTML('beforeend', tagImage)
        }
    }

}