function sendAddressAjax(url, id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    return $.ajax({
        url: url,
        data: {'id' : id},
        method: 'POST',
        async: false,
        typeData: 'json'
    });
}

function getDistrict(url, id, elementDistrictId){
    var element = $('#' + elementDistrictId).html("");
    if(id != 0){
        var resultAjax = sendAddressAjax(url, id);
        var districts =  resultAjax.responseJSON;
        districts.forEach(item => {
            var str = ` <option value="${item.id}" class = 'elementDistrict'>
                        ${item.name} 
                    </option>`;
            element.append(str);
        });
    }else{
        var strDistrict = ` <option value="0">
                        --Quận/Huyện--
                    </option>`;
        element.append(strDistrict);
    } 
}

function getWard(url, id, elementWardId){
    var element = $('#' + elementWardId).html("");
    if(id != 0){
        var resultAjax = sendAddressAjax(url, id);
        var districts =  resultAjax.responseJSON;
        districts.forEach(item => {
            var str = ` <option value="${item.id}" class = 'elementWardId'>
                            ${item.name} 
                        </option>`;
            element.append(str);
        });
    }else{
        var elementRemove = document.querySelectorAll('.elementWardId');
        var strWard= ` <option value="0">
                        --Xã/Phường--
                    </option>`;
        elementRemove.forEach(item => {
            item.remove();
        });
        element.append(strWard);
    }
}