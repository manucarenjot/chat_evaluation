
const sendArticle = document.querySelector('#add-message');
if(sendArticle) {
    sendArticle.addEventListener('click', () => {
        const xhr = new XMLHttpRequest();
        xhr.responseType = 'json';

        const body = {
            message: document.querySelector('#send-message').value
        };

        xhr.open('post', '?c=api&a=add-message');

        xhr.onload = function() {
            if(xhr.status === 404) {
                alert('Aucun enpoint trouvé !');
                return;
            }
            else if(xhr.status === 400) {
                alert('Un paramètre est manquant');
                return;
            }

            const response = xhr.response;
            console.log(response.id);
            console.log(response.message);
            console.log(response.user);
        }

        xhr.send(JSON.stringify(body));

    });
}




