// Defining a baseURL and key to as part of the request URL

const baseURL = 'https://api.nytimes.com/svc/search/v2/articlesearch.json';
const key = 'hqBPJWA9rKbXGVDwGHgrV4pWa13D3JdP';
let url;

// Grab references to all the DOM elements you'll need to manipulate

const searchTerm = document.querySelector('.search');
const startDate = document.querySelector('.start-date');
const endDate = document.querySelector('.end-date');
const searchForm = document.querySelector('form');

const nextBtn = document.querySelector('.next');
const previousBtn = document.querySelector('.prev');

const section = document.querySelector('section');
const nav = document.querySelector('nav');

// Hide the "Previous"/"Next" navigation to begin with, as we don't need it immediately
$('.js_hide').css({'display': 'none'});

// define the initial page number and status of the navigation being displayed
let pageNumber = 0;


// Event listeners to control the functionality

searchForm.addEventListener('submit', submitSearch);
nextBtn.addEventListener('click', nextPage);
previousBtn.addEventListener('click', previousPage);

function submitSearch(e) {
    pageNumber = 0;
    fetchResults(e);
}

function fetchResults(e) {
    // Use preventDefault() to stop the form submitting
    e.preventDefault();

    // Assemble the full URL
    url = baseURL + '?api-key=' + key + '&page=' + pageNumber + '&q=' + searchTerm.value + '&fq=document_type:("article")';

    if(startDate.value !== '') {
        url += '&begin_date=' + startDate.value;
    };

    if(endDate.value !== '') {
        url += '&end_date=' + endDate.value;
    };

    fetch(url).then(function(result) {
        return result.json();
    }).then(function(json) {
        displayResults(json);
    });
}

function displayResults(json) {
    $('.results').html('');
    let temp = $('.results').val();
    console.log(temp);

    const articles = json.response.docs;

    if(articles.length === 10) {
        $('.js_hide').css({'display': 'block'});
    } else {
        $('.js_hide').css({'display': 'none'});
    }

    if(articles.length === 0) {
        const para = document.createElement('p');
        para.textContent = 'No results returned.'
        section.appendChild(para);
    } else {
        for(var i = 0; i < articles.length; i++) {
            const article = document.createElement('article');
            const heading = document.createElement('h2');
            const link = document.createElement('a');
            const img = document.createElement('img');
            const para1 = document.createElement('p');
            const para2 = document.createElement('p');
            const clearfix = document.createElement('div');

            let current = articles[i];

            link.href = current.web_url;
            link.textContent = current.headline.main;
            para1.textContent = current.snippet;
            para2.textContent = 'Keywords: ';
            for(let j = 0; j < current.keywords.length; j++) {
                const span = document.createElement('span');
                span.textContent += current.keywords[j].value + ' ';
                para2.appendChild(span);
            }

            if(current.multimedia.length > 0) {
                img.src = 'https://www.nytimes.com/' + current.multimedia[0].url;
                img.alt = current.headline.main;
                img.classList.add('img-fluid');
            }

            clearfix.setAttribute('class','clearfix');

            article.appendChild(heading);
            heading.appendChild(link);
            article.appendChild(img);
            article.appendChild(para1);
            article.appendChild(para2);
            article.appendChild(clearfix);
            section.appendChild(article);
        }
    }
};

function nextPage(e) {
      pageNumber++;
      fetchResults(e);
};

function previousPage(e) {
    if(pageNumber > 0) {
        pageNumber--;
    } else {
        return;
    }
    fetchResults(e);
};
