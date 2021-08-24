let result = ''
fetch('../views/liste-patients.php',{
    method:'POST',
    })
    .then(function(response){
        return response.json()
    })
    .then(res => res.text()) // on récupère le corps au format text. 
    .then(text => {
        result = `Web page: ${text}`
    })

function searchBar(){
    const searchInput = document.querySelector("[type=search]").value
    if(searchInput.length > 0){
        result = `Search: ${searchInput}`
    }
}

//ajax post search input for php


