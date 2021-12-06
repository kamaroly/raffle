<html lang="en"><head>

  <meta charset="UTF-8">
  
<link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png">
<meta name="apple-mobile-web-app-title" content="CodePen">

<link rel="shortcut icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico">

<link rel="mask-icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111">


  <title>CodePen - Random Picker Visualizer - #082 of #100Days100Projects</title>
  
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css">
  
<style>
@import url('https://fonts.googleapis.com/css?family=Muli:300&display=swap');

* {
	box-sizing: border-box;
}

body {
	background-color: #2B88F0;
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
	min-height: 100vh;
	font-family: 'Muli', sans-serif;
	margin: 0;
	padding: 10px;
	text-align: center;
}

h3 {
	color: #fff;
	margin: 10px 0 20px;
}

.container {
	width: 500px;
	max-width: 100%;
}

textarea {
	border: none;
	display: block;
	font-family: inherit;
	font-size: 16px;
	padding: 10px;
	margin: 0 0 20px;
	height: 100px;
	width: 100%;
}

.tag {
	background-color: #f0932b;
	border-radius: 50px;
	color: #fff;
	display: inline-block;
	font-size: 14px;
	padding: 10px 20px;
	margin: 0 5px 10px 0;
}

.tag.highlight {
	background-color: #273c75;
}










/* SOCIAL PANEL CSS */
.social-panel-container {
	position: fixed;
	right: 0;
	bottom: 80px;
	transform: translateX(100%);
	transition: transform 0.4s ease-in-out;
}

.social-panel-container.visible {
	transform: translateX(-10px);
}

.social-panel {	
	background-color: #fff;
	border-radius: 16px;
	box-shadow: 0 16px 31px -17px rgba(0,31,97,0.6);
	border: 5px solid #001F61;
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
	font-family: 'Muli';
	position: relative;
	height: 169px;	
	width: 370px;
	max-width: calc(100% - 10px);
}

.social-panel button.close-btn {
	border: 0;
	color: #97A5CE;
	cursor: pointer;
	font-size: 20px;
	position: absolute;
	top: 5px;
	right: 5px;
}

.social-panel button.close-btn:focus {
	outline: none;
}

.social-panel p {
	background-color: #001F61;
	border-radius: 0 0 10px 10px;
	color: #fff;
	font-size: 14px;
	line-height: 18px;
	padding: 2px 17px 6px;
	position: absolute;
	top: 0;
	left: 50%;
	margin: 0;
	transform: translateX(-50%);
	text-align: center;
	width: 235px;
}

.social-panel p i {
	margin: 0 5px;
}

.social-panel p a {
	color: #FF7500;
	text-decoration: none;
}

.social-panel h4 {
	margin: 20px 0;
	color: #97A5CE;	
	font-family: 'Muli';	
	font-size: 14px;	
	line-height: 18px;
	text-transform: uppercase;
}

.social-panel ul {
	display: flex;
	list-style-type: none;
	padding: 0;
	margin: 0;
}

.social-panel ul li {
	margin: 0 10px;
}

.social-panel ul li a {
	border: 1px solid #DCE1F2;
	border-radius: 50%;
	color: #001F61;
	font-size: 20px;
	display: flex;
	justify-content: center;
	align-items: center;
	height: 50px;
	width: 50px;
	text-decoration: none;
}

.social-panel ul li a:hover {
	border-color: #FF6A00;
	box-shadow: 0 9px 12px -9px #FF6A00;
}

.floating-btn {
	border-radius: 26.5px;
	background-color: #001F61;
	border: 1px solid #001F61;
	box-shadow: 0 16px 22px -17px #03153B;
	color: #fff;
	cursor: pointer;
	font-size: 16px;
	line-height: 20px;
	padding: 12px 20px;
	position: fixed;
	bottom: 20px;
	right: 20px;
	z-index: 999;
}

.floating-btn:hover {
	background-color: #ffffff;
	color: #001F61;
}

.floating-btn:focus {
	outline: none;
}

.floating-text {
	background-color: #001F61;
	border-radius: 10px 10px 0 0;
	color: #fff;
	font-family: 'Muli';
	padding: 7px 15px;
	position: fixed;
	bottom: 0;
	left: 50%;
	transform: translateX(-50%);
	text-align: center;
	z-index: 998;
}

.floating-text a {
	color: #FF7500;
	text-decoration: none;
}

@media screen and (max-width: 480px) {

	.social-panel-container.visible {
		transform: translateX(0px);
	}
	
	.floating-btn {
		right: 10px;
	}
}
</style>

  <script>
  window.console = window.console || function(t) {};
</script>

  
  
  <script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>


</head>

<body translate="no">
  <div class="container">
	<h3>
		Enter all of the choices divided by a comma (','). <br>
		Press enter when you're done.
	</h3>
	<textarea id="textarea" placeholder="Enter choices here..."></textarea>	
	<div id="tags"></div>
</div>



  
      <script id="rendered-js">
const tagsEl = document.getElementById('tags');
const textarea = document.getElementById('textarea');

// focus by default
textarea.focus();

textarea.addEventListener('keyup', e => {
  // create a tag for all the inputs separated by a comma
  createTags(e.target.value);

  // check if the enter key is pressed
  if (e.key === 'Enter') {
    // empty textarea
    // used setTimeout to add a little delay in order to clean the input
    setTimeout(() => {
      e.target.value = '';
    }, 10);

    // start randomizer
    randomSelect();
  }
});

function createTags(input) {
  const tags = input.split(',').filter(tag => tag.trim() !== '').map(tag => tag.trim());

  // clean up the tags first
  tagsEl.innerHTML = '';

  // map over the tags and add them to the tagsEl container
  tags.forEach(tag => {
    const tagEl = document.createElement('span');
    tagEl.classList.add('tag');
    tagEl.innerText = tag;
    tagsEl.appendChild(tagEl);
  });
}

function randomSelect() {
  const times = 90;

  const interval = setInterval(() => {
    const randomTag = pickRandomTag();

    highlightTag(randomTag);

    // remove the highlight after a while
    setTimeout(() => {
      unhighlightTag(randomTag);
    }, 100);
  }, 100);

  // allow times * 100 ms for the tags to randomly "highlight" themselves
  // then pick another tag
  setTimeout(() => {
    clearInterval(interval);

    setTimeout(() => {
      const randomTag = pickRandomTag();

      highlightTag(randomTag);
    }, 100);
  }, times * 100);
}

function pickRandomTag() {
  const tags = document.querySelectorAll('.tag');
  return tags[Math.floor(Math.random() * tags.length)];
}

function highlightTag(tag) {
  tag.classList.add('highlight');
}

function unhighlightTag(tag) {
  tag.classList.remove('highlight');
}

// SOCIAL PANEL JS
const floating_btn = document.querySelector('.floating-btn');
const close_btn = document.querySelector('.close-btn');
const social_panel_container = document.querySelector('.social-panel-container');

floating_btn.addEventListener('click', () => {
  social_panel_container.classList.toggle('visible');
});

close_btn.addEventListener('click', () => {
  social_panel_container.classList.remove('visible');
});
//# sourceURL=pen.js
    </script>

  




 
</body></html>