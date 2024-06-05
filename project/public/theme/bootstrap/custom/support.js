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

    if (bundle.data) formData.append('data', JSON.stringify(bundle.data));

    formData.append('enctype', 'multipart/form-data');

    const postRequest = await fetch(bundle.url, {
        method: 'POST',
        body: formData
    })

    const postRespond = await postRequest.json()

    return postRespond
}

async function jsonPut(bundle) {
    const putRequest = await fetch(bundle.url, {
        method  : 'PUT',
        headers : {
            Accept          : "application/json",
            dataType        : "json",
            contentType     : 'application/json',
        },
        body : JSON.stringify(bundle.data)
    })

    const putRespond = await putRequest.json()

    return putRespond
}

async function jsonDelete(bundle) {
    const deleteRequest = await fetch(bundle.url, {
        method  : 'DELETE'
    })

    const deleteRespond = await deleteRequest.json()

    return deleteRespond
}