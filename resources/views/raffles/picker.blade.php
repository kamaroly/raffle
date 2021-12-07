<html lang="en"><head>

  <meta charset="UTF-8">
  
<link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png">
<meta name="apple-mobile-web-app-title" content="CodePen">

<link rel="shortcut icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico">

<link rel="mask-icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css">
  <title>Kasha - Random Picker</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  
  
<style>
@import url('https://fonts.googleapis.com/css?family=Muli:300&display=swap');

* {
	box-sizing: border-box;
}

body {
	min-height: 100vh;
	font-family: 'Muli', sans-serif;
	margin: 0;
	padding: 10px;
	text-align: center;
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

<body translate="no" class="bg-gray-100">
  <img src="https://kasha.co.ke/wp-content/themes/caring/images/kasha-logo.png" class="w-32" alt="Kasha">
<div class="grid grid-cols-3 gap-4 ">
   <div class="border-separate border border-grey-500 p-8">

      <p class="mt-1 text-lg text-gray-800 font-semibold">Enter all names. One name per line.</p>
      <textarea id="textarea" class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter choices here..."></textarea>
   </div>
   <div class="border-separate border border-yellow-500  p-8">
      <button class="w-full sm:w-auto mb-4 flex-none bg-gray-900 hover:bg-gray-700 text-white text-lg leading-6 font-semibold py-3 px-6 border border-transparent rounded-sm 
      focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-gray-900 focus:outline-none transition-colors duration-200" onclick="randomSelect()">Press to roll</button>
      <div id="tags"></div>
   </div>
   <div class="border-separate border border-green-500 p-8 bg-white">
   
     <img src="  https://i.pinimg.com/originals/80/71/03/807103c2fcadca24fc708ed662ef506e.jpg" class="float-left w-32"> 
     <p class="text-3xl sm:text-5xl lg:text-6xl leading-none font-extrabold text-gray-900 tracking-tight mb-8"> 
      
      Winners.</p>
      <div id="winners"></div>
   </div>
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
  e.target.value = '';
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
  const times = 20;

  const interval = setInterval(() => {
    const randomTag = pickRandomTag();


    highlightTag(randomTag);

    // remove the highlight after a while
    setTimeout(() => {
      unhighlightTag(randomTag);
    }, 10);
  }, 10);

  // allow times * 100 ms for the tags to randomly "highlight" themselves
  // then pick another tag
  setTimeout(() => {
    clearInterval(interval);

    setTimeout(() => {
      const randomTag = pickRandomTag();
      
      winnersArea.innerHTML  = winnersArea.innerHTML + "<div class='bg-yellow-500 p-1 m-2'>"
          +'<img src="https://cdn.iconscout.com/icon/free/png-256/winner-trophy-cup-prize-award-best-first-achievement-29309.png" class="float-left w-8">'
          + randomTag.innerHTML + "</div>";
        
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