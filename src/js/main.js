window.addEventListener('load', function() {

	let url = window.location.href;
	let about = document.querySelector('.about');
	let main = document.querySelector('.main');

	if (url == "http://ownhtmlphp/")
	{
		about.classList.remove("current");
		main.classList.add("current")
	}
	else 
	{
		main.classList.remove("current");
		about.classList.add("current");
	}

});