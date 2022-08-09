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
            var str = ` <option class='option-district' value="${item.id}" class = 'elementDistrict'>
                        ${item.name} 
                    </option>`;
            element.append(str);
        });
    }else{
        var strDistrict = ` <option class='option-district' value="0">
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
            var str = ` <option class='option-ward' value="${item.id}" class = 'elementWardId'>
                            ${item.name} 
                        </option>`;
            element.append(str);
        });
    }else{
        var elementRemove = document.querySelectorAll('.elementWardId');
        var strWard= ` <option class='option-ward' value="0">
                        --Xã/Phường--
                    </option>`;
        elementRemove.forEach(item => {
            item.remove();
        });
        element.append(strWard);
    }
}

function getFullAddress(route_District, id_District, route_Ward, id_Ward){
    if ($('<option class="option-city" selected></option>')) {
        var id_city = $('#city').val();
        getDistrict(route_District, id_city, 'district');
        var districtArr = document.getElementsByClassName("option-district");
        for (var key in districtArr) {
            var id_district = districtArr[key].value;
            if (id_district == id_District) {
                $(districtArr[key]).attr('selected', true);
                getWard(route_Ward, id_district, 'ward');
                var wardArr = document.getElementsByClassName("option-ward");
                for (var key in wardArr) {
                    var id_ward = wardArr[key].value;
                    if (id_ward == id_Ward) {
                        $(wardArr[key]).attr('selected', true);
                    }
                }
            }
        }
    }
}