import './bootstrap';

document.addEventListener('DOMContentLoaded', function() {
    let page = 1;
    let currentTag = 'AllTags';

    const loadMoreButton = document.querySelector('#load-more');
    const tagElements = document.querySelectorAll('.tag');

    loadMoreButton.addEventListener('click', function() {
        page++;
        loadPosts(currentTag, page);
    });

    tagElements.forEach(tagElement => {
        tagElement.addEventListener('click', function() {
            page = 1;
            currentTag = tagElement.textContent.trim().replace(/\s+/g, '');
            loadPosts(currentTag, page);

            tagElements.forEach(el => el.classList.remove('selectedTag'));
            tagElement.classList.add('selectedTag');
        });
    });

    function loadPosts(tag, page) {
        axios.get('/getPostsByTag', {
            params: {
                tag: tag,
                page: page
            }
        })
            .then(function (response) {
                const postContainer = document.querySelector('#post-container');
                if (page === 1) {
                    postContainer.innerHTML = '';
                }

                postContainer.insertAdjacentHTML('beforeend', response.data.html);

                if (page >= response.data.last_page) {
                    loadMoreButton.style.display = 'none';
                } else {
                    loadMoreButton.style.display = 'block';
                }
            })
            .catch(function (error) {
                console.log(error);
            });
    }
});
