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
	/* width: 500px; */
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
	padding: 2px 4px;
	margin: 0 5px 10px 0;
}

.tag.highlight {
	background-color: #273c75;
}

.tag.won{
    background-color: rebeccapurple
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
      <div id="winners"></div>
	<h3>
		Enter all names. New person's name on the new line. <br>
		Press to roll
	</h3>
	<textarea id="textarea" placeholder="Enter choices here..."></textarea>	
	<div id="tags"></div>
</div>



  
<script id="rendered-js">
const tagsEl = document.getElementById('tags');
const textarea = document.getElementById('textarea');
const winnersArea = document.getElementById('winners');
var  winners   =  [];

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
  const tags = input.split('\n').filter(tag => tag.trim() !== '').map(tag => tag.trim());

  // clean up the tags first
//   tagsEl.innerHTML = '';

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
    }, 50);
  }, 50);

  // allow times * 100 ms for the tags to randomly "highlight" themselves
  // then pick another tag
  setTimeout(() => {
    clearInterval(interval);

    setTimeout(() => {
      const randomTag = pickRandomTag();
    
        winnersArea.innerText = winnersArea.innerText + '<Br/>' +randomTag.innerText;
        winners.push(randomTag.innerText);
        highlightTheWinner(randomTag);
    }, 100);
  }, times * 100);
}

function pickRandomTag() {
  const tags = document.querySelectorAll('.tag');
  return tags[Math.floor(Math.random() * tags.length)];
}

function highlightTheWinner(tag){
     tag.classList.add('won');
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