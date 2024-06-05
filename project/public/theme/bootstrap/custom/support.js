/**
 * Ajax Support
 *
 */

async function jsonGet(bundle) {
    const getRequest = await fetch(bundle.url, {
        method  : 'GET',
        headers : {
            Accept          : "application/json",
            dataType        : "json",
            contentType     : 'application/json',
        }
    })

    const getRespond = await getRequest.json()

    return getRespond
}

async function jsonPost(bundle) {
    const postRequest = await fetch(bundle.url, {
        method  : 'POST',
        headers : {
            Accept          : "application/json",
            dataType        : "json",
            contentType     : 'application/json',
        },
        body : JSON.stringify(bundle.data)
    })

    const postRespond = await postRequest.json()

    return postRespond
}

async function formPost(bundle) {
    formData = new FormData()

    if (bundle.files) {
        files = bundle.files
        for (let i = 0; i < files.length; i++) {
            formData.append([i], files[i])
        }
    }

    /* if (data.function) formData.append('function', data.function);
    if (data.action) formData.append('action', data.action); */
    if (bundle.data) formData.append('data', JSON.stringify(bundle.data));

    formData.append('enctype', 'multipart/form-data');

    const postRequest = await fetch(bundle.url, {
        //mode: 'no-cors',
        method: 'POST',
        body: formData,
        /* headers: {
            "Access-Control-Allow-Origin": "*"//,
            //"Content-type": "application/x-www-form-urlencoded; charset=UTF-8"
        }, */
    })

    const postRespond = await postRequest.json()

    return postRespond
}

async function jsonDelete(bundle) {
    const deleteRequest = await fetch(bundle.url, {
        method  : 'DELETE',
        /* headers : {
            Accept          : "application/json",
            dataType        : "json",
            contentType     : 'application/json',
        },
        body : JSON.stringify(bundle.data) */
    })

    const deleteRespond = await deleteRequest.json()

    return deleteRespond
}