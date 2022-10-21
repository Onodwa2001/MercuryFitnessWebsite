const options = {
	method: 'GET',
	headers: {
		'X-RapidAPI-Key': 'c4fb6325c5msh57abebb046fdd31p1bd7aajsne398b29cc250',
		'X-RapidAPI-Host': 'edamam-recipe-search.p.rapidapi.com'
	}
};

fetch('https://edamam-recipe-search.p.rapidapi.com/search?q=chicken', options)
	.then(response => response.json())
	.then(response => console.log(response))
	.catch(err => console.error(err));