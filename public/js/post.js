const btn = document.querySelector(".save-btn");

function createAndUpdateButton() {
    btn.disabled = true;
    btn.innerHTML = 'Kaydediliyor...';

    const formData = document.forms.namedItem('form-data');
    if (formData.ck_editor) {
        CKEDITOR.instances['ckeditor'].updateElement();
    }
    const form = new FormData(formData);
    axios.post(actionUrl, form).then(res => {
        if (res.data.status === true) {
            toastr.success(res.data.message, res.data.title);
            btn.disabled = false;
            btn.innerHTML = 'Kaydet';
            setTimeout(() => {
                window.location.href = backUrl;
            }, 3500)
        } else {
            toastr.error(res.data.message, res.data.title);
            btn.disabled = false;
            btn.innerHTML = 'Kaydet';
        }
    }).catch(err => {
        let error = err.response.data.errors;
        console.log(error);
        for (const [key, value] of Object.entries(error)) {
            toastr.error(value, 'Başarısız');
        }
        btn.disabled = false;
        btn.innerHTML = 'Kaydet';
    })
}


function deleteButton(r, actionUrl) {
    console.log("test");
    if (confirm('Silmek istediğinize emin misiniz ?') === true) {
        axios.delete(actionUrl.replace('$', ''), {
            _method: 'DELETE',
        }).then(res => {
            if (res.data.status === true) {
                console.log("11111");
                toastr.success(res.data.message, res.data.title);
                setTimeout(() => {
                    window.location.reload();
                }, 1500)
            } else {
                toastr.error(res.data.message, res.data.title);
            }
        })
    }
}

